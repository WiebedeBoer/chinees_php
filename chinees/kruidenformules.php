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
if (isset($_POST["naam"]) && isset($_POST["indicaties"]) && isset($_POST["werking"]) && isset($_POST["klasse"]) && isset($_POST["smaak"]) && isset($_POST["meridiaan"]) && isset($_POST["qi"]) && isset($_POST["contraindicaties"])) {
	
	$new_naam = $_POST["naam"];
	$new_indicaties = $_POST["indicaties"];
	$new_werking = $_POST["werking"];
	$new_klasse = $_POST["klasse"];
	$new_smaak = $_POST["smaak"];
	$new_meridiaan = $_POST["meridiaan"];
	$new_qi = $_POST["qi"];
	$new_contraindicaties = $_POST["contraindicaties"];
	
	$upquery = "UPDATE Kruidenformules SET Naam =?, Indicaties =?, Werking =?, Klasse =?, Smaak =?, Meridiaan =?, Qi =?, Contraindicaties =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssssssssi', $new_naam, $new_indicaties, $new_werking, $new_klasse, $new_smaak, $new_meridiaan, $new_qi, $new_contraindicaties, $num);
	$upid->execute();
	$upid->close();
	
	
		echo '<p><a href="kruidenformules.php?id='.$num.'">aangepast</a></p>';
}
elseif(isset($_POST["select"]) && isset($_POST["verhouding"])){
	$new_select = $_POST["select"];
	$new_verhouding = $_POST["verhouding"];
	
		$iquery = "INSERT INTO FormulesEnKruiden (Kruidenformule, Kruiden, Verhouding) VALUES (?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('iii', $num, $new_select, $new_verhouding);
        $iid->execute();
        $iid->close();
	
echo '<p><a href="kruidenformules.php?id='.$num.'">verhouding ingevoerd</a></p>';
	
}
elseif(isset($_POST["del"])){
	$new_del = $_POST["del"];

	
		$iquery = "DELETE FROM FormulesEnKruiden WHERE ID =?";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('i', $new_del);
        $iid->execute();
        $iid->close();
	
	echo '<p><a href="kruidenformules.php?id='.$num.'">verhouding verwijderd</a></p>';
	
}
//fetch
else {
	
	$wquery = "SELECT Naam, Indicaties, Werking, Klasse, Smaak, Meridiaan, Qi, Contraindicaties FROM Kruidenformules WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($new_naam, $new_indicaties, $new_werking, $new_klasse, $new_smaak, $new_meridiaan, $new_qi, $new_contraindicaties);
	$wid->fetch();
	$wid->close();
	
	echo '<h2>Aanpassen</h2>';
	
	echo '<form method="POST" action="kruidenformules.php?id='.$num.'"><div class="invul">
<div class="inl">Naam: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="naam">'.$new_naam.'</TEXTAREA></WRAP></div>
<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties">'.$new_indicaties.'</TEXTAREA></WRAP></div>
<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking">'.$new_werking.'</TEXTAREA></WRAP></div>
<div class="inl">Klasse: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="klasse">'.$new_klasse.'</TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak">'.$new_smaak.'</TEXTAREA></WRAP></div>
<div class="inl">Meridiaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="meridiaan">'.$new_meridiaan.'</TEXTAREA></WRAP></div>
<div class="inl">Qi: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="qi">'.$new_qi.'</TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties">'.$new_contraindicaties.'</TEXTAREA></WRAP></div>';
if ($usertype =="admin"){
echo '<div class="inp"><input type="submit" value="update" name="but"></div>';}
echo '</div></form>';
	
	//verhoudingen verwijderen
	$wcfquery = "SELECT COUNT(ID) AS idc FROM FormulesEnKruiden WHERE Kruidenformule =?";	
	$wcfid = $conn->prepare($wcfquery);
	$wcfid->bind_param('i', $num);
	$wcfid->execute();
	$wcfid->bind_result($idcf);	
	$wcfid->fetch();
	$wcfid->close();
	if ($idcf >=1){
		echo '<h2>verhoudingen</h2>';
		echo '<form method="post" action="kruidenformules.php?id='.$num.'">';
	//echo '<select name="select">';
	//$wfquery = "SELECT ID, Verhouding FROM FormulesEnKruiden WHERE Kruidenformule =?";	
	//$wfid = $conn->prepare($wfquery);
	//$wfid->execute();
	//while ($rownw = $wfid->fetch())
	$syquery = "SELECT ID, Verhouding FROM FormulesEnKruiden WHERE Kruidenformule ='$num'";	
	$syresult = mysqli_query($conn, $syquery);
    while($rownwf = mysqli_fetch_assoc($syresult))
	{
		echo '<form method="post" action="kruidenformules.php?id='.$num.'">';
		$zfnum = $rownwf["id"];
		$zfverhouding = $rownwf["Verhouding"];
		echo $zfverhouding.'<br>';
		echo '<input type="hidden" value="'.$zfnum.'" name="del"><br>';
		echo '<input type="submit" value="verhouding verwijderen" name="but">';
		echo '</form>';
	}
	echo '<br> Verhouding: <input type="text" name="verhouding">';
	echo '</form>';
	}	
		
	//verhouding invoeren
	$wcoquery = "SELECT COUNT(ID) AS idco FROM Kruiden";	
	$wcoid = $conn->prepare($wcoquery);
	$wcoid->execute();
	$wcoid->bind_result($idc);
	$wcoid->fetch();
	$wcoid->close();	
	
	if ($idc >=1){
	echo '<h2>verhoudingen invoeren</h2>';
	echo '<form method="post" action="kruidenformules.php?id='.$num.'">';
	echo '<select name="select">';
	//$wquery = "SELECT ID, Nederlands FROM Kruiden";	
	//$wid = $conn->prepare($wquery);
	//$wid->execute();
	//while ($rownw = $wid->fetch())
	$syfquery = "SELECT ID, Nederlands FROM Kruiden";	
	$syfresult = mysqli_query($conn, $syfquery);
    while($rownw = mysqli_fetch_assoc($syfresult))
	{
		$znum = $rownw["id"];
		$znederlands = $rownw["Nederlands"];
		echo '<option value="'.$znum.'">'.$znederlands.'</option>';
	}
	echo '</select>';
	echo '<br> Verhouding: <input type="text" name="verhouding">';
	echo '<input type="submit" value="verhouding invoeren" name="but" class="but">';
	echo '</form>';
	}
	else {
		echo '<h2>verhoudingen invoeren</h2>';
	}
	
	
}
	}	
	
}
else {
//insert
if (isset($_POST["naam"]) && isset($_POST["indicaties"]) && isset($_POST["werking"]) && isset($_POST["klasse"]) && isset($_POST["smaak"]) && isset($_POST["meridiaan"]) && isset($_POST["qi"]) && isset($_POST["contraindicaties"])) {
	$new_naam = $_POST["naam"];
	$new_indicaties = $_POST["indicaties"];
	$new_werking = $_POST["werking"];
	$new_klasse = $_POST["klasse"];
	$new_smaak = $_POST["smaak"];
	$new_meridiaan = $_POST["meridiaan"];
	$new_qi = $_POST["qi"];
	$new_contraindicaties = $_POST["contraindicaties"];
	
	    $iquery = "INSERT INTO Kruidenformules (Naam, Indicaties, Werking, Klasse, Smaak, Meridiaan, Qi, Contraindicaties) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('ssssssss', $new_naam, $new_indicaties, $new_werking, $new_klasse, $new_smaak, $new_meridiaan, $new_qi, $new_contraindicaties);
        $iid->execute();
        $iid->close();
		
					$mwquery = "SELECT MAX(ID) AS Maxid FROM Kruidenformules";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
		
		
	echo '<p><a href="kruidenformules.php?id='.$maxid.'">ingevoerd</a></p>';
		
}
//form
else {
	echo '<form method="POST" action="kruidenformules.php">
<div class="invul">
<div class="inl">Naam: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="naam"></TEXTAREA></WRAP></div>
<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties"></TEXTAREA></WRAP></div>
<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking"></TEXTAREA></WRAP></div>
<div class="inl">Klasse: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="klasse"></TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak"></TEXTAREA></WRAP></div>
<div class="inl">Meridiaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="meridiaan"></TEXTAREA></WRAP></div>
<div class="inl">Qi: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="qi"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
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