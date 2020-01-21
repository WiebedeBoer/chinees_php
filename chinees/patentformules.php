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
if(isset($_POST["nederlands"]) && isset($_POST["engels"]) && isset($_POST["pinjin"]) && isset($_POST["werking"]) && isset($_POST["tong"]) && isset($_POST["pols"]) && isset($_POST["contraindicaties"]) && isset($_POST["indicaties"])) {
	
	$new_nederlands = $_POST["nederlands"];
	$new_engels = $_POST["engels"];
	$new_pijin = $_POST["pinjin"];
	$new_werking = $_POST["werking"];
	$new_tong = $_POST["tong"];
	$new_pols = $_POST["pols"];
	$new_contraindicaties = $_POST["contraindicaties"];
	$new_indicaties = $_POST["indicaties"];
	$upquery = "UPDATE Patentformules SET Nederlands =?, Engels =?, Pinjin =?, Werking =?, Tong =?, Pols =?, Contraindicaties =?, Indicaties =? WHERE ID =?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssssssssi', $new_nederlands, $new_engels, $new_pijin, $new_werking, $new_tong, $new_pols, $new_contraindicaties, $new_indicaties, $num);
	$upid->execute();
	$upid->close();
	
	echo '<p><a href="patentformules.php?id='.$num.'">aangepast</a></p>';
	
}

elseif(isset($_POST["select"]) && isset($_POST["verhouding"])){
	
	$new_select = $_POST["select"];
	$new_verhouding = $_POST["verhouding"];
	
		$iquery = "INSERT INTO PatentEnKruiden (Patentformule, Chinesekruiden, Verhouding) VALUES (?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('iii', $num, $new_select, $new_verhouding);
        $iid->execute();
        $iid->close();
	
	echo '<p><a href="patentformules.php?id='.$num.'">verhouding ingevoerd</a></p>';
	
	
}



elseif(isset($_POST["del"])){
	$new_del = $_POST["del"];

	
		$iquery = "DELETE FROM PatentEnKruiden WHERE ID =?";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('i', $new_del);
        $iid->execute();
        $iid->close();
	
	echo '<p><a href="patentformules.php?id='.$num.'">verhouding verwijderd</a></p>';
	
	
}


//fetch
else {
	
	$wquery = "SELECT Nederlands, Engels, Pinjin, Werking, Tong, Pols, Contraindicaties, Indicaties FROM Patentformules WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($nederlands, $engels, $pinjin, $werking, $tong, $pols, $contraindicaties, $indicaties);
	$wid->fetch();
	$wid->close();
	
	
		echo '<p><b><a href="aantekening.php?id='.$num.'&type=patentformule">Aantekeningen</a></b></p>';
	
	echo '<form method="POST" action="patentformules.php?id='.$num.'"><div class="invul">
	<div class="inl">Nederlands: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="nederlands">'.$nederlands.'</TEXTAREA></WRAP></div>
	<div class="inl">Engels: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="engels">'.$engels.'</TEXTAREA></WRAP></div>
	<div class="inl">Pinjin: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="pinjin">'.$pinjin.'</TEXTAREA></WRAP></div>
	<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking">'.$werking.'</TEXTAREA></WRAP></div>
	<div class="inl">Tong: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="tong">'.$tong.'</TEXTAREA></WRAP></div>
	<div class="inl">Pols: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pols">'.$pols.'</TEXTAREA></WRAP></div>
	<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties">'.$contraindicaties.'</TEXTAREA></WRAP></div>
	<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties">'.$indicaties.'</TEXTAREA></WRAP></div>';
	if ($usertype =="admin"){
echo '<div class="sbm"><input type="submit" value="update" name="but" class="but"></div>';}
	echo '</div></form>';
	
	
	
	
	//verhoudingen verwijderen
	$wcfquery = "SELECT COUNT(ID) AS idc FROM PatentEnKruiden WHERE Patentformule =?";	
	$wcfid = $conn->prepare($wcfquery);
	$wcfid->bind_param('i', $num);
	$wcfid->execute();
	$wcfid->bind_result($idcf);	
	if ($idcf >=1){
	echo '<select name="select">';
	$wfquery = "SELECT ID, Verhouding FROM PatentEnKruiden WHERE Patentformule =?";	
	$wfid = $conn->prepare($wfquery);
	$wfid->execute();
	while ($rownw = $wfid->fetch())
	{
		echo '<form method="post" action="kruidenformules.php?id='.$num.'">';
		$zfnum = $rownwf["id"];
		$zfverhouding = $rownwf["Verhouding"];
		echo $zfverhouding.'<br>';
		echo '<input type="hidden" value="'.$zfnum.'" name="del"><br>';
		echo '<input type="submit" value="verhouding verwijderen" name="but" class="but">';
		echo '</form>';
	}
	echo '<br> Verhouding: <input type="text" name="verhouding">';
	}	
	
	//verhoudingen invoeren
	$wcoquery = "SELECT COUNT(ID) AS idc FROM ChineseKruiden";	
	$wcoid = $conn->prepare($wcoquery);
	$wcoid->execute();
	$wcoid->bind_result($idc);
	
	if ($idc >=1){
echo '<form method="post" action="patentformules.php?id='.$num.'">';
	echo '<select name="select">';
	$wquery = "SELECT ID, Engels FROM ChineseKruiden";	
	$wid = $conn->prepare($wquery);
	$wid->execute();
	while ($rownw = $wid->fetch())
	{
		$znum = $rownw["id"];
		$zengels = $rownw["Engels"];
		echo '<option value="'.$znum.'">'.$zengels.'</option>';
	}
	echo '</select>';
	echo '<br> Verhouding: <input type="text" name="verhouding">';
	echo '<input type="submit" value="verhouding invoeren" name="but" class="but">';
	echo '</form>';
	}
	

//else	
}
//filter check
	}
		
	
}
else {
	
//insert
if(isset($_POST["nederlands"]) && isset($_POST["engels"]) && isset($_POST["pinjin"]) && isset($_POST["werking"]) && isset($_POST["tong"]) && isset($_POST["pols"]) && isset($_POST["contraindicaties"]) && isset($_POST["indicaties"])) {
	
	$new_nederlands = $_POST["nederlands"];
	$new_engels = $_POST["engels"];
	$new_pijin = $_POST["pinjin"];
	$new_werking = $_POST["werking"];
	$new_tong = $_POST["tong"];
	$new_pols = $_POST["pols"];
	$new_contraindicaties = $_POST["contraindicaties"];
	$new_indicaties = $_POST["indicaties"];
	
	$iquery = "INSERT INTO Patentformules (Nederlands, Engels, Pinjin, Werking, Tong, Pols, Contraindicaties, Indicaties) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $iid = $conn->prepare($iquery);
    $iid->bind_param('ssssssss', $new_nederlands, $new_engels, $new_pijin, $new_werking, $new_tong, $new_pols, $new_contraindicaties, $new_indicaties);
    $iid->execute();
    $iid->close();		
	
	$mwquery = "SELECT MAX(ID) AS Maxid FROM Patentformules";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
	
		
		echo '<p><a href="patentformules.php?id='.$maxid.'">ingevoerd</a></p>';
}
//form
else {
	
	echo '<form method="POST" action="patentformules.php">
<div class="invul">
<div class="inl">Nederlands: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="nederlands"></TEXTAREA></WRAP></div>
<div class="inl">Engels: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="engels"></TEXTAREA></WRAP></div>
<div class="inl">Pinjin: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="pinjin"></TEXTAREA></WRAP></div>
<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking"></TEXTAREA></WRAP></div>
<div class="inl">Tong: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="tong"></TEXTAREA></WRAP></div>
<div class="inl">Pols: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pols"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties"></TEXTAREA></WRAP></div>
<div class="sbm"><input type="submit" value="invoeren" class="but"></div>
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