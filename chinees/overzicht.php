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
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Nederlands=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Latijns=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Thermodynamisch=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruidenformules WHERE Indicaties=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruidenformules WHERE Naam=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(FormulesEnKruiden.ID) as counter FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID AND Kruiden.Nederlands=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules WHERE Nederlands=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules WHERE Engels=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules WHERE Pinjin=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen WHERE Syndroom=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen WHERE Pols=? OR Tong=?";}
elseif ($soort ==""){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen WHERE Pols=search OR Tong=?";}
else {
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Nederlands=?";}

$ncid = $conn->prepare($ncquery);
$wid->bind_param('s', $num);
$ncid->execute();
$ncid->bind_result($nwcheck);
$ncid->fetch();
$ncid->close();
if ($nwcheck >=1){

if ($soort ==""){
	$wquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands=?";}
elseif (){
	$wquery = "SELECT ID, Latijns FROM Kruiden WHERE Latijns=?";}
elseif (){
	$wquery = "SELECT ID, Thermodynamisch FROM Kruiden WHERE Thermodynamisch=?";}
elseif (){
	$wquery = "SELECT ID, Indicaties FROM Kruidenformules WHERE Indicaties=?";}
elseif (){
	$wquery = "SELECT ID, Naam FROM Kruidenformules WHERE Naam=?";}
elseif (){
	$wquery = "SELECT FormulesEnKruiden.ID AS ID, Kruidenformules.Naam AS Naam FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID AND Kruiden.Nederlands=?";}
elseif (){
	$wquery = "SELECT ID, Nederlands FROM Patentformules WHERE Nederlands=?";}
elseif (){
	$wquery = "SELECT ID, Engels FROM Patentformules WHERE Engels=?";}
elseif (){
	$wquery = "SELECT ID, Pinjin FROM Patentformules WHERE Pinjin=?";}
elseif (){
	$wquery = "SELECT ID, Syndroom FROM Syndromen WHERE Syndroom=?";}
elseif (){
	$wquery = "SELECT ID, Pols FROM Syndromen WHERE Pols=? OR Tong= ?";}
elseif (){
	$wquery = "SELECT Actieformules.ID AS ID, Patentformules.Nederlands AS Nederlands FROM Syndromen, Actiesformules, Patentformules WHERE Syndromen.ID=Actieformules.Syndroom AND Actieformules.Patentformule=Patentformules.ID AND Syndromen.Hoofdsymptoom =?";}
else {
	$wquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands=?";}
	
	$wid = $conn->prepare($wquery);
	$wid->bind_param('s', $num);
	$wid->execute();
	$wid->bind_result($, $, $, $, $);
	while ($rownw = $wid->fetch())
	{
		$znum = $rownw["id"];
		if ($soort ==""){
			$znaam = $rownw["Nederlands"];}
		elseif ($soort ==""){
			$znaam = $rownw["Latijns"];}
		elseif ($soort ==""){
			$znaam = $rownw["Thermodynamisch"];}
		elseif ($soort ==""){
			$znaam = $rownw["Indicaties"];}
		elseif ($soort ==""){
			$znaam = $rownw["Naam"];}
		elseif ($soort ==""){
			$znaam = $rownw["Naam"];}
		elseif ($soort ==""){
			$znaam = $rownw["Nederlands"];}	
		elseif ($soort ==""){
			$znaam = $rownw["Engels"];}
		elseif ($soort ==""){
			$znaam = $rownw["Pinjin"];}
		elseif ($soort ==""){
			$znaam = $rownw["Syndroom"];}	
		elseif ($soort ==""){
			$znaam = $rownw["Pols"];}
		elseif ($soort ==""){
			$znaam = $rownw["Nederlands"];}
		else {
			$znaam = $rownw["Nederlands"];}				

echo '<div class="item">';
//display
echo $znum.' '.$znaam.' <input type="submit" value="update" name="but">';
//update
if ($soort ==""){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort ==""){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
else {
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
//verwijder
echo '<form method="POST" action="overzicht.php">
<input type="hidden" name="delete" value="'.$znum.'"><input type="hidden" value="'.$soort.'" name="type"><input type="hidden" value="'.$num.'" name="term">
<input type="submit" value="verwijder" name="but"></form>';


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
else(isset($_POST["delete"]) && isset($_POST["type"]) && isset($_POST["term"])) {
$num = $_GET["term"];
$soort = $_POST["type"];
$sid = $_POST["type"];
if (){
	
}
echo '<p>verwijderd</p><form method="POST" action="overzicht.php">
<input type="hidden" value="'.$soort.'" name="soort"><input type="hidden" value="'.$num.'" name="zoekterm">
<input type="submit" value="terug" name="but"></form>';

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