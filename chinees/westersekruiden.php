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
if (isset($_POST["nederlands"]) && isset($_POST["latijn"]) && isset($_POST["familie"]) && isset($_POST["inhoudsstoffen"]) && isset($_POST["eigenschappen"]) && isset($_POST["actie"]) && isset($_POST["gebruik"]) && isset($_POST["contraindicaties"]) && isset($_POST["smaak"]) && isset($_POST["dosering"]) && isset($_POST["thermodynamisch"]) && isset($_POST["gebruiktedelen"])) {
	/*
	$new_ = $_POST[""];
	$upquery = "UPDATE  SET  =?, =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssi', $new_, $new_, $num);
	$upid->execute();
	$upid->close();
	*/
}
//fetch
else {
	/*
	$wquery = "SELECT , , , ,  FROM  WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($, $, $, $, $);
	$wid->fetch();
	$wid->close();
	*/
	echo '<form method="POST" action="westersekruiden.php">
<div class="invul">
<div class="inl">Nederlands: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="nederlands"></TEXTAREA></WRAP></div>
<div class="inl">Latijn: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="latijn"></TEXTAREA></WRAP></div>
<div class="inl">Familie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="familie"></TEXTAREA></WRAP></div>
<div class="inl">Inhoudsstoffen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="inhoudsstoffen"></TEXTAREA></WRAP></div>
<div class="inl">Toepassingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="toepassingen"></TEXTAREA></WRAP></div>
<div class="inl">Eigenschappen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="eigenschappen"></TEXTAREA></WRAP></div>
<div class="inl">Actie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="actie"></TEXTAREA></WRAP></div>
<div class="inl">Gebruik: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruik"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak"></TEXTAREA></WRAP></div>
<div class="inl">Dosering: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="dosering"></TEXTAREA></WRAP></div>
<div class="inl">Thermodynamisch: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="thermodynamisch"></TEXTAREA></WRAP></div>
<div class="inl">Gebruikte Delen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruiktedelen"></TEXTAREA></WRAP></div>
<div class="inl">Orgaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="orgaan"></TEXTAREA></WRAP></div>
<div class="inp"><input type="submit" value="invoeren" name="but"></div>
</div>
</form>';
	
}
	}		
}
else {
//insert
if (isset($_POST["nederlands"]) && isset($_POST["latijn"]) && isset($_POST["familie"]) && isset($_POST["inhoudsstoffen"]) && isset($_POST["eigenschappen"]) && isset($_POST["actie"]) && isset($_POST["gebruik"]) && isset($_POST["contraindicaties"]) && isset($_POST["smaak"]) && isset($_POST["dosering"]) && isset($_POST["thermodynamisch"]) && isset($_POST["gebruiktedelen"])) {
	/*
	    $iquery = "INSERT INTO  (, , ) VALUES (?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('sss', $rawtitle, $datum, $modtext);
        $iid->execute();
        $iid->close();
		*/
		
					$mwquery = "SELECT MAX(ID) AS Maxid FROM Kruiden";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
		
		echo '<p><a href="westersekruiden.php?id='.$maxid.'">ingevoerd</a></p>';
}
//form
else {
	echo '<form method="POST" action="westersekruiden.php">
<div class="invul">
<div class="inl">Nederlands: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="nederlands"></TEXTAREA></WRAP></div>
<div class="inl">Latijn: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="latijn"></TEXTAREA></WRAP></div>
<div class="inl">Familie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="familie"></TEXTAREA></WRAP></div>
<div class="inl">Inhoudsstoffen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="inhoudsstoffen"></TEXTAREA></WRAP></div>
<div class="inl">Toepassingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="toepassingen"></TEXTAREA></WRAP></div>
<div class="inl">Eigenschappen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="eigenschappen"></TEXTAREA></WRAP></div>
<div class="inl">Actie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="actie"></TEXTAREA></WRAP></div>
<div class="inl">Gebruik: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruik"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak"></TEXTAREA></WRAP></div>
<div class="inl">Dosering: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="dosering"></TEXTAREA></WRAP></div>
<div class="inl">Thermodynamisch: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="thermodynamisch"></TEXTAREA></WRAP></div>
<div class="inl">Gebruikte Delen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruiktedelen"></TEXTAREA></WRAP></div>
<div class="inl">Orgaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="orgaan"></TEXTAREA></WRAP></div>
<div class="inp"><input type="submit" value="invoeren" name="but"></div>
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