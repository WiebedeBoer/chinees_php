<!DOCTYPE HTML>
<HTML>
<HEAD>
<?php
include("includes/inc_head.php");
?>
</HEAD>
<BODY>
<div class="body">
<div id="main">
<?php
include("connect.php");
if ($connected ==1){
	
	echo '<p><a href="hoofdmenu.php">hoofdmenu</a></p>';
if (isset($_GET["id"])){
	if (filter_var($_GET["id"], FILTER_VALIDATE_INT)){
	$num = $_GET["id"];
//update
if(isset($_POST["actie"]) && isset($_POST["acupunctuurpunten"]) && isset($_POST["opmerkingen"])) {
	//$new_syndroom = $_POST["syndroom"];
	$new_actie = $_POST["actie"];
	$new_acupunctuurpunten = $_POST["acupunctuurpunten"];
	$new_opmerkingen = $_POST["opmerkingen"];
	$upquery = "UPDATE Syndromenacties SET Actie =?, Acupunctuurpunten =?, Opmerkingen =? WHERE ID =?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('sssi', $new_actie, $new_acupunctuurpunten, $new_opmerkingen, $num);
	$upid->execute();
	$upid->close();
	
	echo '<p><a href="syndroomacties.php?id='.$num.'">aangepast</a></p>';
}
//fetch
else {
	$wquery = "SELECT Syndroom, Actie, Acupunctuurpunten, Opmerkingen FROM Syndromenacties WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($syndroom, $actie, $acupunctuurpunten, $opmerkingen);
	$wid->fetch();
	$wid->close();
	
	
	$squery = "SELECT Syndroom FROM Syndromen WHERE ID = ?";
	$syid = $conn->prepare($squery);
	$syid->bind_param('i', $syndroom);
	$syid->execute();
	$syid->bind_result($syndroomnaam);
	$syid->fetch();
	$syid->close();
	
	echo '<h2>'.$syndroomnaam.' aanpassen</h2>';
	
	//<div class="inl">Syndroom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="syndroom">'.$syndroom.'</TEXTAREA></WRAP></div>
	echo '<form method="POST" action="syndroomacties.php?id='.$num.'"><div class="invul">
	
	<div class="inl">Actie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="actie">'.$actie.'</TEXTAREA></WRAP></div>
	<div class="inl">Acupunctuurpunten: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="acupunctuurpunten">'.$acupunctuurpunten.'</TEXTAREA></WRAP></div>
	<div class="inl">Opmerkingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="opmerkingen">'.$opmerkingen.'</TEXTAREA></WRAP></div>';
	if ($usertype =="admin"){
	echo '<div class="inp"><input type="submit" value="update" name="but" class="but"></div>';}
	echo '</div></form>';
	
}
	}		
}
else {
//insert
if(isset($_POST["syndroom"]) && isset($_POST["actie"]) && isset($_POST["acupunctuurpunten"]) && isset($_POST["opmerkingen"])) {
		$new_syndroom = $_POST["syndroom"];
	$new_actie = $_POST["actie"];
	$new_acupunctuurpunten = $_POST["acupunctuurpunten"];
	$new_opmerkingen = $_POST["opmerkingen"];
	    $iquery = "INSERT INTO Syndromenacties (Syndroom, Actie, Acupunctuurpunten, Opmerkingen) VALUES (?, ?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('ssss', $new_syndroom, $new_actie, $new_acupunctuurpunten, $new_opmerkingen);
        $iid->execute();
        $iid->close();
		
			$mwquery = "SELECT MAX(ID) AS Maxid FROM Syndromenacties";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
	
		
		echo '<p><a href="syndroomacties.php?id='.$maxid.'">ingevoerd</a></p>';
}
//form
else {
	echo '<form method="POST" action="syndroomacties.php">
<div class="invul">';
	//<div class="inl">Syndroom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="syndroom"></TEXTAREA></WRAP></div>
	
	
	echo '<select name="syndroom">';
	$syfquery = "SELECT ID, Syndroom FROM Syndromen";	
	$syfresult = mysqli_query($conn, $syfquery);
    while($rownw = mysqli_fetch_assoc($syfresult))
	{
		$znum = $rownw["ID"];
		$zengels = $rownw["Syndroom"];
		echo '<option value="'.$znum.'">'.$zengels.'</option>';
	}
	echo '</select>';
	
	echo '<div class="inl">Actie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="actie"></TEXTAREA></WRAP></div>
	<div class="inl">Acupunctuurpunten: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="acupunctuurpunten"></TEXTAREA></WRAP></div>
	<div class="inl">Opmerkingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="opmerkingen"></TEXTAREA></WRAP></div>
	<div class="inp"><input type="submit" value="invoeren" name="but" class="but"></div>
</div>
</form>';
}		
}


	
}
?>
</div>
<div id="footer">
<?php
include("includes/inc_bottom.php");
?>
</div>
</div>
</BODY>
</HTML>