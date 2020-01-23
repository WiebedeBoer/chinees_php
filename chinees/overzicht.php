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
	
include("zoek.php");
	
if(isset($_POST["zoekterm"]) && isset($_POST["soort"])) {

$num = $_POST["zoekterm"];
$soort = $_POST["soort"];

echo '<p>'.$num.'</p>';

//all
if ($num =="*"){
	
if ($soort =="nederlands"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden";}
elseif ($soort =="latijn"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden";}
elseif ($soort =="thermo"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden";}
elseif ($soort =="indicaties"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruidenformules";}
elseif ($soort =="naam"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruidenformules";}
elseif ($soort =="formule"){
	$ncquery = "SELECT COUNT(FormulesEnKruiden.ID) as counter FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID";}
elseif ($soort =="patent"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules";}
elseif ($soort =="engels"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules";}
elseif ($soort =="pinjin"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules";}
elseif ($soort =="syndroom"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen";}
elseif ($soort =="symptoom"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen";}
elseif ($soort =="patentsymptoom"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen";}
else {
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden";}

/*
include ("inserter.php");
$mycount = new Counter();
$mycount->set_query($ncquery);
$nwcheck = $mycount->give_count();
*/


$ncid = $conn->prepare($ncquery);
$ncid->bind_param('s', $num);
$ncid->execute();
$ncid->bind_result($nwcheck);
$ncid->fetch();
$ncid->close();


//als resultaat
if ($nwcheck >=1){

if ($soort =="nederlands"){
	$wquery = "SELECT ID, Nederlands FROM Kruiden";}
elseif ($soort =="latijn"){
	$wquery = "SELECT ID, Latijns FROM Kruiden";}
elseif ($soort =="thermo"){
	$wquery = "SELECT ID, Thermodynamisch FROM Kruiden";}
elseif ($soort =="indicaties"){
	$wquery = "SELECT ID, Indicaties FROM Kruidenformules";}
elseif ($soort =="naam"){
	$wquery = "SELECT ID, Naam FROM Kruidenformules";}
elseif ($soort =="formule"){
	$wquery = "SELECT FormulesEnKruiden.ID AS ID, Kruidenformules.Naam AS Naam FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID";}
elseif ($soort =="patent"){
	$wquery = "SELECT ID, Nederlands FROM Patentformules";}
elseif ($soort =="engels"){
	$wquery = "SELECT ID, Engels FROM Patentformules";}
elseif ($soort =="pinjin"){
	$wquery = "SELECT ID, Pinjin FROM Patentformules";}
elseif ($soort =="syndroom"){
	$wquery = "SELECT ID, Syndroom FROM Syndromen?";}
elseif ($soort =="symptoom"){
	$wquery = "SELECT ID, Pols FROM Syndromen";}
elseif ($soort =="patentsymptoom"){
	$wquery = "SELECT Actieformules.ID AS ID, Patentformules.Nederlands AS Nederlands FROM Syndromen, Actiesformules, Patentformules WHERE Syndromen.ID=Actieformules.Syndroom AND Actieformules.Patentformule=Patentformules.ID";}
else {
	$wquery = "SELECT ID, Nederlands FROM Kruiden";}
	
	
	//$wid = $conn->prepare($wquery);
	//$wid->bind_param('s', $num);
	//$wid->execute();
	//$wid->bind_result($, $, $, $, $);
	
	$query = "SELECT * FROM category ";

$result = mysqli_query($conn, $wquery);


    while($rownw = mysqli_fetch_assoc($result))
    {
        //$cat_id = $row['ID'];
        //$cat_title = $row['cat_title'];
	
	
	//while ($rownw = $wid->fetch())
	//{
		//echo $rownw;
		$znum = $rownw["ID"];
		if ($soort =="nederlands"){
			$znaam = $rownw["Nederlands"];}
		elseif ($soort =="latijn"){
			$znaam = $rownw["Latijns"];}
		elseif ($soort =="thermo"){
			$znaam = $rownw["Thermodynamisch"];}
		elseif ($soort =="indicaties"){
			$znaam = $rownw["Indicaties"];}
		elseif ($soort =="naam"){
			$znaam = $rownw["Naam"];}
		elseif ($soort =="formule"){
			$znaam = $rownw["Naam"];}
		elseif ($soort =="patent"){
			$znaam = $rownw["Nederlands"];}	
		elseif ($soort =="engels"){
			$znaam = $rownw["Engels"];}
		elseif ($soort =="pinjin"){
			$znaam = $rownw["Pinjin"];}
		elseif ($soort =="syndroom"){
			$znaam = $rownw["Syndroom"];}	
		elseif ($soort =="symptoom"){
			$znaam = $rownw["Pols"];}
		elseif ($soort =="patentsymptoom"){
			$znaam = $rownw["Nederlands"];}
		else {
			$znaam = $rownw["Nederlands"];}				

echo '<div class="item">';
//display
echo $znum.' '.$znaam.'<br> Update: '; 
//update
if ($soort =="nederlands"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="latijn"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="thermo"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="indicaties"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="naam"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="formule"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="patent"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="engels"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="pinjin"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="syndroom"){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="symptoom"){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="patentsymptoom"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
else {
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
//verwijder
echo '<br><form method="POST" action="overzicht.php">
<input type="hidden" name="delete" value="'.$znum.'"><input type="hidden" value="'.$soort.'" name="type"><input type="hidden" value="'.$num.'" name="term">
<input type="submit" value="verwijder" name="but" class="but"></form>';

  
echo '</div>';
	}
	$wid->close();	
	
		

}
else {
echo '<P class="error">Geen resultaten</P>';
}	
	
	



//not all	
}
else {
	
if ($soort =="nederlands"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Nederlands=?";}
elseif ($soort =="latijn"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Latijns=?";}
elseif ($soort =="thermo"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Thermodynamisch=?";}
elseif ($soort =="indicaties"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruidenformules WHERE Indicaties=?";}
elseif ($soort =="naam"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruidenformules WHERE Naam=?";}
elseif ($soort =="formule"){
	$ncquery = "SELECT COUNT(FormulesEnKruiden.ID) as counter FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID AND Kruiden.Nederlands=?";}
elseif ($soort =="patent"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules WHERE Nederlands=?";}
elseif ($soort =="engels"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules WHERE Engels=?";}
elseif ($soort =="pinjin"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Patentformules WHERE Pinjin=?";}
elseif ($soort =="syndroom"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen WHERE Syndroom=?";}
elseif ($soort =="symptoom"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen WHERE Pols=? OR Tong=?";}
elseif ($soort =="patentsymptoom"){
	$ncquery = "SELECT COUNT(ID) AS counter FROM Syndromen WHERE Pols=search OR Tong=?";}
else {
	$ncquery = "SELECT COUNT(ID) AS counter FROM Kruiden WHERE Nederlands=?";}

$ncid = $conn->prepare($ncquery);
$ncid->bind_param('s', $num);
$ncid->execute();
$ncid->bind_result($nwcheck);
$ncid->fetch();
$ncid->close();

//als resultaat
if ($nwcheck >=1){

/*
if ($soort =="nederlands"){
	$wquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands=?";}
elseif ($soort =="latijn"){
	$wquery = "SELECT ID, Latijns FROM Kruiden WHERE Latijns=?";}
elseif ($soort =="thermo"){
	$wquery = "SELECT ID, Thermodynamisch FROM Kruiden WHERE Thermodynamisch=?";}
elseif ($soort =="indicaties"){
	$wquery = "SELECT ID, Indicaties FROM Kruidenformules WHERE Indicaties=?";}
elseif ($soort =="naam"){
	$wquery = "SELECT ID, Naam FROM Kruidenformules WHERE Naam=?";}
elseif ($soort =="formule"){
	$wquery = "SELECT FormulesEnKruiden.ID AS ID, Kruidenformules.Naam AS Naam FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID AND Kruiden.Nederlands=?";}
elseif ($soort =="patent"){
	$wquery = "SELECT ID, Nederlands FROM Patentformules WHERE Nederlands=?";}
elseif ($soort =="engels"){
	$wquery = "SELECT ID, Engels FROM Patentformules WHERE Engels=?";}
elseif ($soort =="pinjin"){
	$wquery = "SELECT ID, Pinjin FROM Patentformules WHERE Pinjin=?";}
elseif ($soort =="syndroom"){
	$wquery = "SELECT ID, Syndroom FROM Syndromen WHERE Syndroom=?";}
elseif ($soort =="symptoom"){
	$wquery = "SELECT ID, Pols FROM Syndromen WHERE Pols=? OR Tong= ?";}
elseif ($soort =="patentsymptoom"){
	$wquery = "SELECT Actieformules.ID AS ID, Patentformules.Nederlands AS Nederlands FROM Syndromen, Actiesformules, Patentformules WHERE Syndromen.ID=Actieformules.Syndroom AND Actieformules.Patentformule=Patentformules.ID AND Syndromen.Hoofdsymptoom =?";}
else {
	$wquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands=?";}
	*/
	
	
if ($soort =="nederlands"){
	$wquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands LIKE '$num'";}
elseif ($soort =="latijn"){
	$wquery = "SELECT ID, Latijns FROM Kruiden WHERE Latijns LIKE '$num'";}
elseif ($soort =="thermo"){
	$wquery = "SELECT ID, Thermodynamisch FROM Kruiden WHERE Thermodynamisch LIKE '$num'";}
elseif ($soort =="indicaties"){
	$wquery = "SELECT ID, Indicaties FROM Kruidenformules WHERE Indicaties LIKE '$num'";}
elseif ($soort =="naam"){
	$wquery = "SELECT ID, Naam FROM Kruidenformules WHERE Naam LIKE '$num'";}
elseif ($soort =="formule"){
	$wquery = "SELECT FormulesEnKruiden.ID AS ID, Kruidenformules.Naam AS Naam FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID AND Kruiden.Nederlands=?";}
elseif ($soort =="patent"){
	$wquery = "SELECT ID, Nederlands FROM Patentformules WHERE Nederlands LIKE '$num'";}
elseif ($soort =="engels"){
	$wquery = "SELECT ID, Engels FROM Patentformules WHERE Engels LIKE '$num'";}
elseif ($soort =="pinjin"){
	$wquery = "SELECT ID, Pinjin FROM Patentformules WHERE Pinjin LIKE '$num'";}
elseif ($soort =="syndroom"){
	$wquery = "SELECT ID, Syndroom FROM Syndromen WHERE Syndroom LIKE '$num'";}
elseif ($soort =="symptoom"){
	$wquery = "SELECT ID, Pols FROM Syndromen WHERE Pols LIKE '$num' OR Tong LIKE '$num'";}
elseif ($soort =="patentsymptoom"){
	$wquery = "SELECT Actieformules.ID AS ID, Patentformules.Nederlands AS Nederlands FROM Syndromen, Actiesformules, Patentformules WHERE Syndromen.ID=Actieformules.Syndroom AND Actieformules.Patentformule=Patentformules.ID AND Syndromen.Hoofdsymptoom =?";}
else {
	$wquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands LIKE '$num'";}
	
	
	$result = mysqli_query($conn, $wquery);
    while($rownw = mysqli_fetch_assoc($result))
	
	/*
	$wid = $conn->prepare($wquery);
	$wid->bind_param('s', $num);
	$wid->execute();
	$res = $wid->get_result();
	while ($rownw = $res->fetch())
		*/
	//while ($rownw = $wid->mysqli_fetch_assoc())
	{
		//echo $rownw;
		$znum = $rownw["ID"];
		if ($soort =="nederlands"){
			$znaam = $rownw["Nederlands"];}
		elseif ($soort =="latijn"){
			$znaam = $rownw["Latijns"];}
		elseif ($soort =="thermo"){
			$znaam = $rownw["Thermodynamisch"];}
		elseif ($soort =="indicaties"){
			$znaam = $rownw["Indicaties"];}
		elseif ($soort =="naam"){
			$znaam = $rownw["Naam"];}
		elseif ($soort =="formule"){
			$znaam = $rownw["Naam"];}
		elseif ($soort =="patent"){
			$znaam = $rownw["Nederlands"];}	
		elseif ($soort =="engels"){
			$znaam = $rownw["Engels"];}
		elseif ($soort =="pinjin"){
			$znaam = $rownw["Pinjin"];}
		elseif ($soort =="syndroom"){
			$znaam = $rownw["Syndroom"];}	
		elseif ($soort =="symptoom"){
			$znaam = $rownw["Pols"];}
		elseif ($soort =="patentsymptoom"){
			$znaam = $rownw["Nederlands"];}
		else {
			$znaam = $rownw["Nederlands"];}				

echo '<div class="item">';
//display
//echo $znum.' '.$znaam; 
//<input type="submit" value="update" name="but">';
echo $znum.' '.$znaam.'<br> Update: '; 
//echo '<br>';
//update
if ($soort =="nederlands"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="latijn"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="thermo"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="indicaties"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="naam"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="formule"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="patent"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="engels"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="pinjin"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="syndroom"){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="symptoom"){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="patentsymptoom"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
else {
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
//verwijder
echo '<br><form method="POST" action="overzicht.php">
<br><input type="hidden" name="delete" value="'.$znum.'"><input type="hidden" value="'.$soort.'" name="type"><input type="hidden" value="'.$num.'" name="term">
<input type="submit" value="verwijder" name="but"></form>';

  
echo '</div>';
	}
	//$wid->close();
/*
$result_pagg = $conn->query($lquery);
while ($rownw = $result_pagg->fetch_assoc())
  {

  }
  */
  
$sycquery = "SELECT COUNT(ID) AS counter FROM Synoniemen WHERE Naam LIKE '$num' OR Synoniem LIKE '$num'";
$syc = $conn->prepare($sycquery);
$syc->execute();
$syc->bind_result($sycheck);
$syc->fetch();
$syc->close();	

if ($sycheck >=1){
	echo '<p>er zijn synoniemen</p>';
	
	$syquery = "SELECT Naam, Synoniem FROM Synoniemen WHERE Naam LIKE '$num' OR Synoniem LIKE '$num'";	
	$syresult = mysqli_query($conn, $syquery);
    while($rowsy = mysqli_fetch_assoc($syresult)){
		
		if ($rowsy["Naam"] == $num){
			$alt_num = $rowsy["Synoniem"];
		}
		else {
			$alt_num = $rowsy["Naam"];
		}
		
		echo '<p>synoniem: '.$alt_num.'</p>';
		
		if ($soort =="nederlands"){
	$awquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands LIKE '$alt_num'";}
elseif ($soort =="latijn"){
	$awquery = "SELECT ID, Latijns FROM Kruiden WHERE Latijns LIKE '$alt_num'";}
elseif ($soort =="thermo"){
	$awquery = "SELECT ID, Thermodynamisch FROM Kruiden WHERE Thermodynamisch LIKE '$alt_num'";}
elseif ($soort =="indicaties"){
	$awquery = "SELECT ID, Indicaties FROM Kruidenformules WHERE Indicaties LIKE '$alt_num'";}
elseif ($soort =="naam"){
	$awquery = "SELECT ID, Naam FROM Kruidenformules WHERE Naam LIKE '$alt_num'";}
elseif ($soort =="formule"){
	$awquery = "SELECT FormulesEnKruiden.ID AS ID, Kruidenformules.Naam AS Naam FROM Kruidenformules, FormulesEnKruiden, Kruiden WHERE Kruidenformules.ID=FormulesEnKruiden.IDKruidenformule AND FormulesEnKruiden.IDKruiden=Kruiden.ID AND Kruiden.Nederlands='$alt_num'";}
elseif ($soort =="patent"){
	$awquery = "SELECT ID, Nederlands FROM Patentformules WHERE Nederlands LIKE '$alt_num'";}
elseif ($soort =="engels"){
	$awquery = "SELECT ID, Engels FROM Patentformules WHERE Engels LIKE '$alt_num'";}
elseif ($soort =="pinjin"){
	$awquery = "SELECT ID, Pinjin FROM Patentformules WHERE Pinjin LIKE '$alt_num'";}
elseif ($soort =="syndroom"){
	$awquery = "SELECT ID, Syndroom FROM Syndromen WHERE Syndroom LIKE '$alt_num'";}
elseif ($soort =="symptoom"){
	$wquery = "SELECT ID, Pols FROM Syndromen WHERE Pols LIKE '$alt_num' OR Tong LIKE '$alt_num'";}
elseif ($soort =="patentsymptoom"){
	$awquery = "SELECT Actieformules.ID AS ID, Patentformules.Nederlands AS Nederlands FROM Syndromen, Actiesformules, Patentformules WHERE Syndromen.ID=Actieformules.Syndroom AND Actieformules.Patentformule=Patentformules.ID AND Syndromen.Hoofdsymptoom ='$alt_num'";}
else {
	$awquery = "SELECT ID, Nederlands FROM Kruiden WHERE Nederlands LIKE '$alt_num'";}
	
	
	$aresult = mysqli_query($conn, $awquery);
    while($rowaw = mysqli_fetch_assoc($aresult))
	
	/*
	$wid = $conn->prepare($wquery);
	$wid->bind_param('s', $num);
	$wid->execute();
	$res = $wid->get_result();
	while ($rownw = $res->fetch())
		*/
	//while ($rownw = $wid->mysqli_fetch_assoc())
	{
		//echo $rownw;
		$znum = $rowaw["ID"];
		if ($soort =="nederlands"){
			$znaam = $rowaw["Nederlands"];}
		elseif ($soort =="latijn"){
			$znaam = $rowaw["Latijns"];}
		elseif ($soort =="thermo"){
			$znaam = $rowaw["Thermodynamisch"];}
		elseif ($soort =="indicaties"){
			$znaam = $rowaw["Indicaties"];}
		elseif ($soort =="naam"){
			$znaam = $rowaw["Naam"];}
		elseif ($soort =="formule"){
			$znaam = $rowaw["Naam"];}
		elseif ($soort =="patent"){
			$znaam = $rowaw["Nederlands"];}	
		elseif ($soort =="engels"){
			$znaam = $rowaw["Engels"];}
		elseif ($soort =="pinjin"){
			$znaam = $rowaw["Pinjin"];}
		elseif ($soort =="syndroom"){
			$znaam = $rowaw["Syndroom"];}	
		elseif ($soort =="symptoom"){
			$znaam = $rowaw["Pols"];}
		elseif ($soort =="patentsymptoom"){
			$znaam = $rowaw["Nederlands"];}
		else {
			$znaam = $rowaw["Nederlands"];}				

echo '<div class="item">';
//display
//echo $znum.' '.$znaam; 
//<input type="submit" value="update" name="but">';
echo $znum.' '.$znaam.'<br> Update: '; 
//echo '<br>';
//update
if ($soort =="nederlands"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="latijn"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="thermo"){
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="indicaties"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="naam"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="formule"){
	echo '<a href="kruidenformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="patent"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="engels"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="pinjin"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="syndroom"){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="symptoom"){
	echo '<a href="syndromen.php?id='.$znum.'">'.$znaam.'</a>';}
elseif ($soort =="patentsymptoom"){
	echo '<a href="patentformules.php?id='.$znum.'">'.$znaam.'</a>';}
else {
	echo '<a href="westersekruiden.php?id='.$znum.'">'.$znaam.'</a>';}
//verwijder
echo '<br><form method="POST" action="overzicht.php">
<br><input type="hidden" name="delete" value="'.$znum.'"><input type="hidden" value="'.$soort.'" name="type"><input type="hidden" value="'.$alt_num.'" name="term">
<input type="submit" value="verwijder" name="but"></form>';

  
echo '</div>';
	}
		
		
		
		
		
	}
	
}

  

}
else {
echo '<P class="error">Geen resultaten</P>';
}	
	
	
}























//verwijder
}
elseif(isset($_POST["delete"]) && isset($_POST["type"]) && isset($_POST["term"])) {
$num = $_GET["term"];
$soort = $_POST["type"];
$sid = $_POST["type"];

	$wquery = "DELETE FROM Kruiden WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->close();


echo '<p>verwijderd</p>';
echo '<form method="POST" action="overzicht.php">
<input type="hidden" value="'.$soort.'" name="soort"><input type="hidden" value="'.$num.'" name="zoekterm">
<input type="submit" value="terug" name="but">
</form>';

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