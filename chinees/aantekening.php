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

$userid = $_COOKIE['person'];

if ($connected ==1){
	echo '<p><a href="hoofdmenu.php">hoofdmenu</a></p>';
	
if (isset($_GET["id"]) && isset($_GET["type"])){
	if (filter_var($_GET["id"], FILTER_VALIDATE_INT)){
	$num = $_GET["id"];
	$type = $get["type"];
//update
if(isset($_POST["update"]) && isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""])) {
	/*
	$new_upd = $_POST["update"];
	$upquery = "UPDATE  SET  =?, =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssi', $new_, $new_, $num);
	$upid->execute();
	$upid->close();
	*/
	echo '<p><a href="hoofdmenu.php">aagepast</a></p>';
}
//insert
elseif (isset($_POST["insert"])) {
	$new_in = $_POST["insert"];
	if($type =="chineeskruid"){
		$iquery = "INSERT INTO Chineesaantekeningen (Kruid, Aantekening) VALUES(?, ?)";}
	elseif ($type =="westerskruid"){
		$iquery = "INSERT INTO Kruidenaantekeningen (Kruid, Aantekening) VALUES(?, ?)";}
	elseif ($type =="westersformule"){
		$iquery = "INSERT INTO Formulesaantekeningen (Kruid, Aantekening) VALUES(?, ?)";}
	elseif ($type =="patentformule"){
		$iquery = "INSERT INTO Patentaantekeningen (Kruid, Aantekening) VALUES(?, ?)";}
    $iid = $conn->prepare($iquery);
    $iid->bind_param('is', $num, $new_in);
    $iid->execute();
    $iid->close();
	echo '<p><a href="hoofdmenu.php">ingevoerd</a></p>';
}
//fetch
else {

	echo '<form method="POST" action="aantekening.php?id='.$num.'&type='.$type.'"><div class="invul">
	<div class="inl">Aantekening: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="insert"></TEXTAREA></WRAP></div>
		<div class="sbm"><input type="submit" value="invoeren" class="but"></div>
	</div></form>';
	
		
	if($type =="chineeskruid"){
		$wquery = "SELECT Aantekening FROM Chineesaantekeningen WHERE ID = ? AND WHERE User =?";}
	elseif ($type =="westerskruid"){
		$wquery = "SELECT Aantekening FROM Kruidenaantekeningen WHERE ID = ? AND WHERE User =?";}
	elseif ($type =="westersformule"){
		$wquery = "SELECT Aantekening FROM Formulesaantekeningen WHERE ID = ? AND WHERE User =?";}
	elseif ($type =="patentformule"){
		$wquery = "SELECT Aantekening FROM Patentaantekeningen WHERE ID = ? AND WHERE User =?";}
	$wid = $conn->prepare($wquery);
	$wid->bind_param('ii', $num, $userid);
	$wid->execute();
	$wid->bind_result($aantekening);
	while ($wid->fetch())
	{
		echo '<form method="POST" action="aantekening.php"><div class="invul">
		<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$aantekening.'</TEXTAREA></WRAP></div>
		<div class="sbm"><input type="submit" value="update" class="but"></div>
		</div></form>';
	}
	$wid->close();
	
}
	}		
}
/*
else {

		
}
*/

	
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