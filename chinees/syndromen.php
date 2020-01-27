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
if(isset($_POST["syndroom"]) && isset($_POST["symptoom"]) && isset($_POST["hoofdsymptoom"]) && isset($_POST["tong"]) && isset($_POST["pols"]) && isset($_POST["etiologie"]) && isset($_POST["pathologie"]) && isset($_POST["voorlopers"]) && isset($_POST["ontwikkelingen"])) {
	$new_syndroom = $_POST["syndroom"];
	$new_symptoom = $_POST["symptoom"];
	$new_hoofdsymptoom = $_POST["hoofdsymptoom"];
	$new_tong = $_POST["tong"];
	$new_pols = $_POST["pols"];
	$new_etiologie = $_POST["etiologie"];
	$new_pathologie = $_POST["pathologie"];
	$new_voorlopers = $_POST["voorlopers"];
	$new_ontwikkelingen = $_POST["ontwikkelingen"];
	$upquery = "UPDATE Syndromen SET Syndroom =?, Symptoom =?, Hoofdsymptoom =?, Tong =?, Pols =?, Etiologie =?, Pathologie =?, Voorlopers =?, Ontwikkelingen =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('sssssssssi', $new_syndroom, $new_symptoom, $new_hoofdsymptoom, $new_tong, $new_pols, $new_etiologie, $new_pathologie, $new_voorlopers, $new_ontwikkelingen, $num);
	$upid->execute();
	$upid->close();
		echo '<p><a href="syndromen.php?id='.$num.'">gewijzigd</a></p>';
		
}
elseif (isset($_POST["westers"]) && isset($_POST["oosters"]) && isset($_POST["aantekening"])){
	$new_west = $_POST["westers"];
	$new_oost = $_POST["oosters"];
	$new_in = $_POST["aantekening"];
	
	if ($usertype =="admin"){
		$iquery = "INSERT INTO Actieformule (Syndroom, Patentformule, Kruidenformule) VALUES (?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('iii', $num, $new_oost, $new_west);
        $iid->execute();
        $iid->close();
		
		$iaquery = "INSERT INTO Actiesaantekeningen (Actie, Aantekening, User) VALUES(?, ?, ?)";
    $iaid = $conn->prepare($iaquery);
    $iaid->bind_param('isi', $num, $new_in, $userid);
    $iaid->execute();
    $iaid->close();
	
	}
	
	echo '<p><a href="syndromen.php?id='.$num.'">actie formule ingevoerd</a></p>';
	
	
}
elseif(isset($_POST["del"])){
	$new_del = $_POST["del"];

	if ($usertype =="admin"){
		$iquery = "DELETE FROM Actieformule WHERE ID =?";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('i', $new_del);
        $iid->execute();
        $iid->close();
	}
	echo '<p><a href="syndromen.php?id='.$num.'">actie formule verwijderd</a></p>';
	
	
}
//fetch
else {
	$wquery = "SELECT Syndroom, Symptoom, Hoofdsymptoom, Tong, Pols, Etiologie, Pathologie, Voorlopers, Ontwikkelingen FROM Syndromen WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($syndroom, $symptoom, $hoofdsymptoom, $tong, $pols, $etiologie, $pathologie, $voorlopers, $ontwikkelingen);
	$wid->fetch();
	$wid->close();
	//display
	echo '<form method="POST" action="syndromen.php?id='.$num.'"><div class="invul">
	<div class="inl">Syndroom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="syndroom">'.$syndroom.'</TEXTAREA></WRAP></div>
	<div class="inl">Symptomen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="symptoom">'.$symptoom.'</TEXTAREA></WRAP></div>
	<div class="inl">Hoofdsymptoom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="hoofdsymptoom">'.$hoofdsymptoom.'</TEXTAREA></WRAP></div>
	<div class="inl">Tong: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="tong">'.$tong.'</TEXTAREA></WRAP></div>
	<div class="inl">Pols: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pols">'.$pols.'</TEXTAREA></WRAP></div>
	<div class="inl">Etiologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="etiologie">'.$etiologie.'</TEXTAREA></WRAP></div>
	<div class="inl">Pathologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pathologie">'.$pathologie.'</TEXTAREA></WRAP></div>
	<div class="inl">Voorlopers: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="voorlopers">'.$voorlopers.'</TEXTAREA></WRAP></div>
	<div class="inl">Ontwikkelingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="ontwikkelingen">'.$ontwikkelingen.'</TEXTAREA></WRAP></div>
	<div class="inp"><input type="submit" value="update" name="but" class="but"></div>
	</div></form>';
	
	/*
	//actieformules invoeren
	$wcoquery = "SELECT COUNT(ID) AS idc FROM Kruidenformules";	
	$wcoid = $conn->prepare($wcoquery);
	$wcoid->execute();
	$wcoid->bind_result($idc);
	$wcoid->fetch();
	$wcoid->close();
	
	if ($idc >=1){
echo '<form method="post" action="syndromen.php?id='.$num.'">';
//westers
	echo '<select name="westers">';
	$wquery = "SELECT ID, Naam FROM Kruidenformules";	
	//$wid = $conn->prepare($wquery);
	//$wid->execute();
	//while ($rownw = $wid->fetch())
	$wresult = mysqli_query($conn, $wquery);
    while($rownw = mysqli_fetch_assoc($wresult))
	{
		$znum = $rownw["id"];
		$znaam = $rownw["Naam"];
		echo '<option value="'.$znum.'">'.$znaam.'</option>';
	}
	echo '</select>';
	//$wid->close();
//oosters
	echo '<select name="oosters">';
	$wkquery = "SELECT ID, Nederlands FROM Patentformules";	
	//$wkid = $conn->prepare($wkquery);
	//$wkid->execute();
	//while ($rownwk = $wkid->fetch())
	$wkresult = mysqli_query($conn, $wkquery);
    while($rownwk = mysqli_fetch_assoc($wkresult))
	{
		$onum = $rownwk["id"];
		$onederlands = $rownwk["Naam"];
		echo '<option value="'.$onum.'">'.$onederlands.'</option>';
	}
	echo '</select>';
	//$wkid->close();
//button
if ($usertype =="admin"){
echo '<input type="submit" value="actie invoeren" name="but" class="but">';}
	echo '</form>';
	}
	*/
	
	//actieformules display
	$wcfquery = "SELECT COUNT(ID) AS idc FROM Actieformule WHERE Syndroom =?";	
	$wcfid = $conn->prepare($wcfquery);
	$wcfid->bind_param('i', $num);
	$wcfid->execute();
	$wcfid->bind_result($idcf);	
	$wcfid->fetch();
	$wcfid->close();
	if ($idcf >=1){
		echo '<h2>Actie formules</h2>';
	//echo 'Actie formule: <select name="select">';
	//$wfquery = "SELECT Actieformules.ID AS ID, Patentformules.Nederlands AS patent, Kruidenformules.Nederlands AS kruid FROM Actieformules JOIN Patentformules, Kruidenformules WHERE Kruidenformules.ID = Actieformules.Kruidenformule AND Patentformules.ID = Actieformules.Patentformule AND Actieformules.Syndroom ='$num'";	
	//$wfid = $conn->prepare($wfquery);
	//$wfid->execute();
	//while ($rownw = $wfid->fetch())
		$wfquery = "SELECT ID, Patentformule, Kruidenformule FROM Actieformule WHERE Syndroom ='$num'";	
	
	$syfresult = mysqli_query($conn, $wfquery);
    while($rownwf = mysqli_fetch_assoc($syfresult))
	{
		echo '<form method="post" action="syndromen.php?id='.$num.'">';
		$zfnum = $rownwf["ID"];
		$zfpatent = $rownwf["Patentformule"];
		$zfkruid = $rownwf["Kruidenformule"];
		
		$wjquery = "SELECT Nederlands FROM Patentformules WHERE ID =?";	
		$jid = $conn->prepare($wjquery);
		$jid->bind_param('i', $zfpatent);
		$jid->execute();
		$jid->bind_result($jpatent);	
		$jid->fetch();
		$jid->close();
		
		$wcjquery = "SELECT Naam FROM Kruidenformules WHERE ID =?";	
		$jwid = $conn->prepare($wcjquery);
		$jwid->bind_param('i', $zfkruid);
		$jwid->execute();
		$jwid->bind_result($jkruid);	
		$jwid->fetch();
		$jwid->close();
		
		echo $jpatent.' '. $jkruid.' <b><a href="aantekening.php?id='.$num.'&type=syndroom">Aantekeningen</a></b>';
		echo '<input type="hidden" value="'.$zfnum.'" name="del"><br>';
		if ($usertype =="admin"){
		echo '<input type="submit" value="actie verwijderen" name="but">';}
		echo '</form><br><br>';
	}
	//echo '<br> Verhouding: <input type="text" name="verhouding">';
	}	
	
	
	//actieformules
	$wcoquery = "SELECT COUNT(ID) AS idc FROM Kruidenformules";	
	$wcoid = $conn->prepare($wcoquery);
	$wcoid->execute();
	$wcoid->bind_result($idc);
		$wcoid->fetch();
	$wcoid->close();
	
	$wpcoquery = "SELECT COUNT(ID) AS idcp FROM Patentformules";	
	$wpcoid = $conn->prepare($wpcoquery);
	$wpcoid->execute();
	$wpcoid->bind_result($idcp);
		$wpcoid->fetch();
	$wpcoid->close();
	
	if ($idc >=1 && $idcp >=1){
		echo '<h2>Actie formule invoeren</h2>';
echo '<form method="post" action="syndromen.php?id='.$num.'">';
	echo 'Westerse formule: <select name="westers">';
	$wquery = "SELECT ID, Naam FROM Kruidenformules";	
	//$wid = $conn->prepare($wquery);
	//$wid->execute();
	//while ($rownw = $wid->fetch())
	$wresult = mysqli_query($conn, $wquery);
    while($rownw = mysqli_fetch_assoc($wresult))
	{
		$znum = $rownw["ID"];
		$znaam = $rownw["Naam"];
		echo '<option value="'.$znum.'">'.$znaam.'</option>';
	}
	echo '</select>';
	
	echo ' Chinese formules: <select name="oosters">';
	$wpquery = "SELECT ID, Nederlands FROM Patentformules";	
	//$wpid = $conn->prepare($wpquery);
	//$wpid->execute();
	//while ($rownwp = $wpid->fetch())
	$wpresult = mysqli_query($conn, $wpquery);
    while($rownwp = mysqli_fetch_assoc($wpresult))
	{
		$zpnum = $rownwp["ID"];
		$zpnederlands = $rownwp["Nederlands"];
		echo '<option value="'.$zpnum.'">'.$zpnederlands.'</option>';
	}
	echo '</select>';
	
	
	echo '<br> Aantekening: <input type="text" name="aantekening">';
	echo '<input type="submit" value="actie formule invoeren" name="but">';
	echo '</form>';
	}

	
	
	
	
	
}
	}		
}
else {
//insert
if (isset($_POST["syndroom"]) && isset($_POST["symptoom"]) && isset($_POST["hoofdsymptoom"]) && isset($_POST["tong"]) && isset($_POST["pols"]) && isset($_POST["etiologie"]) && isset($_POST["pathologie"]) && isset($_POST["voorlopers"]) && isset($_POST["ontwikkelingen"])) {
	$new_syndroom = $_POST["syndroom"];
	$new_symptoom = $_POST["symptoom"];
	$new_hoofdsymptoom = $_POST["hoofdsymptoom"];
	$new_tong = $_POST["tong"];
	$new_pols = $_POST["pols"];
	$new_etiologie = $_POST["etiologie"];
	$new_pathologie = $_POST["pathologie"];
	$new_voorlopers = $_POST["voorlopers"];
	$new_ontwikkelingen = $_POST["ontwikkelingen"];
	    $iquery = "INSERT INTO Syndromen (Syndroom, Symptoom, Hoofdsymptoom, Tong, Pols, Etiologie, Pathologie, Voorlopers, Ontwikkelingen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('sssssssss', $new_syndroom, $new_symptoom, $new_hoofdsymptoom, $new_tong, $new_pols, $new_etiologie, $new_pathologie, $new_voorlopers, $new_ontwikkelingen);
        $iid->execute();
        $iid->close();
		
	$mwquery = "SELECT MAX(ID) AS Maxid FROM Syndromen";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
		
		echo '<p><a href="syndromen.php?id='.$maxid.'">ingevoerd</a></p>';
}
//form
else {
	echo '<form method="POST" action="syndromen.php">
<div class="invul">
	<div class="inl">Syndroom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="syndroom"></TEXTAREA></WRAP></div>
	<div class="inl">Symptomen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="symptoom"></TEXTAREA></WRAP></div>
	<div class="inl">Hoofdsymptoom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="hoofdsymptoom"></TEXTAREA></WRAP></div>
	<div class="inl">Tong: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="tong"></TEXTAREA></WRAP></div>
	<div class="inl">Pols: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pols"></TEXTAREA></WRAP></div>
	<div class="inl">Etiologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="etiologie"></TEXTAREA></WRAP></div>
	<div class="inl">Pathologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pathologie"></TEXTAREA></WRAP></div>
	<div class="inl">Voorlopers: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="voorlopers"></TEXTAREA></WRAP></div>
	<div class="inl">Ontwikkelingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="ontwikkelingen"></TEXTAREA></WRAP></div>
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