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
if(isset($_POST["engels"]) && isset($_POST["latijn"]) && isset($_POST["pinjin"]) && isset($_POST["klasse"]) && isset($_POST["thermodynamisch"]) && isset($_POST["meridiaan"]) && isset($_POST["qi"]) && isset($_POST["werking"]) && isset($_POST["indicaties"]) && isset($_POST["dosering"])) {
	$new_engels = $_POST["engels"];
	$new_latijn = $_POST["latijn"];
	$new_pinjin = $_POST["pinjin"];
	$new_klasse = $_POST["klasse"];
	$new_thermodynamisch = $_POST["thermodynamisch"];
	$new_meridiaan = $_POST["meridiaan"];
	$new_qi = $_POST["qi"];
	$new_werking = $_POST["werking"];
	$new_indicaties = $_POST["indicaties"];
	$new_dosering = $_POST["dosering"];
	$upquery = "UPDATE ChineseKruiden SET Engels =?, Latijn =?, Pinjin =@?, Klasse =@?, Thermodynamisch =@?, Meridiaan =@?, Qi =@?, Werking =@?, Indicaties =@?, Dosering =@? WHERE ID =?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssssssssssi', $new_engels, $new_latijn, $new_pinjin, $new_klasse, $new_thermodynamisch, $new_meridiaan, $new_qi, $new_werking, $new_indicaties, $new_dosering, $num);
	$upid->execute();
	$upid->close();
	echo '<p><a href="chinesekruiden.php?id='.$num.'">aangepast</a></p>';
}
//fetch
else {
	$wquery = "SELECT Engels, Latijn, Pinjin, Klasse, Thermodynamisch, Meridiaan, Qi, Werking, Indicaties, Dosering FROM ChineseKruiden WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($engels, $latijn, $pinjin, $klasse, $thermodynamisch, $meridiaan, $qi, $werking, $indicaties, $dosering);
	$wid->fetch();
	$wid->close();
	
		echo '<p><b><a href="aantekening.php?id='.$num.'&type=chineeskruid">Aantekeningen</a></b></p>';
 
	echo '<form method="POST" action="chinesekruiden.php?id='.$num.'"><div class="invul">
	<div class="inl">Engels: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="engels">'.$engels.'</TEXTAREA></WRAP></div>
	<div class="inl">Latijn: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="latijn">'.$latijn.'</TEXTAREA></WRAP></div>
	<div class="inl">Pinjin: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pinjin">'.$pinjin.'</TEXTAREA></WRAP></div>
	<div class="inl">Klasse: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="klasse">'.$klasse.'</TEXTAREA></WRAP></div>
	<div class="inl">Thermodynamisch: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="thermodynamisch">'.$thermodynamisch.'</TEXTAREA></WRAP></div>
	<div class="inl">Meridiaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="meridiaan">'.$meridiaan.'</TEXTAREA></WRAP></div>
	<div class="inl">Qi: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="qi">'.$qi.'</TEXTAREA></WRAP></div>
	<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking">'.$werking.'</TEXTAREA></WRAP></div>
	<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties">'.$indicaties.'</TEXTAREA></WRAP></div>
	<div class="inl">Dosering: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="dosering">'.$dosering.'</TEXTAREA></WRAP></div>
	<div class="inp"><input type="submit" value="update" name="but"></div>
	</div></form>';
	
}
	}		
}
else {
//insert
if(isset($_POST["engels"]) && isset($_POST["latijn"]) && isset($_POST["pinjin"]) && isset($_POST["klasse"]) && isset($_POST["thermodynamisch"]) && isset($_POST["meridiaan"]) && isset($_POST["qi"]) && isset($_POST["werking"]) && isset($_POST["indicaties"]) && isset($_POST["dosering"])) {
	    $iquery = "INSERT INTO ChineseKruiden (Engels, Latijn, Pinjin, Klasse, Thermodynamisch, Meridiaan, Qi, Werking, Indicaties, Dosering) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('ssssssssss', $new_engels, $new_latijn, $new_pinjin, $new_klasse, $new_thermodynamisch, $new_meridiaan, $new_qi, $new_werking, $new_indicaties, $new_dosering);
        $iid->execute();
        $iid->close();
			$mwquery = "SELECT MAX(ID) AS Maxid FROM ChineseKruiden";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
		
		echo '<p><a href="chinesekruiden.php?id='.$maxid.'">ingevoerd</a></p>';
}
//form
else {
	echo '<form method="POST" action="chinesekruiden.php">
<div class="invul">
	<div class="inl">Engels: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="engels"></TEXTAREA></WRAP></div>
	<div class="inl">Latijn: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="latijn"></TEXTAREA></WRAP></div>
	<div class="inl">Pinjin: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="pinjin"></TEXTAREA></WRAP></div>
	<div class="inl">Klasse: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="klasse"></TEXTAREA></WRAP></div>
	<div class="inl">Thermodynamisch: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="thermodynamisch"></TEXTAREA></WRAP></div>
	<div class="inl">Meridiaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="meridiaan"></TEXTAREA></WRAP></div>
	<div class="inl">Qi: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="qi"></TEXTAREA></WRAP></div>
	<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking"></TEXTAREA></WRAP></div>
	<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties"></TEXTAREA></WRAP></div>
	<div class="inl">Dosering: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="dosering"></TEXTAREA></WRAP></div>
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