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
	
if(isset($_POST["zoekterm"]) && isset($_POST["soort"])) {
$num = $_GET["zoekterm"];
$soort = $_POST["soort"]

if ($soort ==""){
	$ncquery = "SELECT COUNT(*) AS nwcheck FROM WHERE = ? ";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(*) AS nwcheck FROM WHERE = ? ";}

$ncid = $conn->prepare($ncquery);
$wid->bind_param('s', $num);
$ncid->execute();
$ncid->bind_result($nwcheck);
$ncid->fetch();
$ncid->close();
if ($nwcheck >=1){

if ($soort ==""){
	$wquery = "SELECT ID,   FROM  WHERE  = ?";}
elseif (){
	$wquery = "SELECT ID,   FROM  WHERE  = ?";}
	
	$wid = $conn->prepare($wquery);
	$wid->bind_param('s', $num);
	$wid->execute();
	$wid->bind_result($, $, $, $, $);
	while ($rownw = $wid->fetch())
	{
		$znum = $rownw[""];
		$znaam = $rownw[""];

echo '<div class="item">';
//display
echo $znum.' '.$znaam.' <input type="submit" value="update" name="but">';
//update
if ($soort ==""){
	echo '<form method="POST" action="overzicht.php"><input type="submit" value="update" name="but"></form>';}
elseif ($soort ==""){
	echo '<form method="POST" action="overzicht.php"><input type="submit" value="update" name="but"></form>';}
//verwijder
if ($soort ==""){
	echo '<form method="POST" action="overzicht.php"><input type="submit" value="update" name="but"></form>';}
elseif ($soort ==""){
	echo '<form method="POST" action="overzicht.php"><input type="submit" value="update" name="but"></form>';}

echo '</div>';
	}
	$wid->close();

$result_pagg = $conn->query($lquery);
while ($rownw = $result_pagg->fetch_assoc())
  {

  }
}
else {
echo '<P class="error">Geen resultaten</P>';
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