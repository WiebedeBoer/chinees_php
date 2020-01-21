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



//echo $userid;
//echo $usertype;

if ($connected ==1){
	echo '<p><a href="hoofdmenu.php">hoofdmenu</a></p>';
	
if (isset($_GET["id"]) && isset($_GET["type"])){
	if (filter_var($_GET["id"], FILTER_VALIDATE_INT)){
	$num = $_GET["id"];
	$type = $_GET["type"];
//update
if(isset($_POST["update"])) {
	$new_in = $_POST["update"];
	if($type =="chineeskruid"){
		$iquery = "UPDATE Chineesaantekeningen SET Aantekening =? WHERE ID =?";}
	elseif ($type =="westerskruid"){
		$iquery = "UPDATE Kruidenaantekeningen SET Aantekening =? WHERE ID =?";}
	elseif ($type =="westersformule"){
		$iquery = "UPDATE Formulesaantekeningen SET Aantekening =? WHERE ID =?";}
	elseif ($type =="patentformule"){
		$iquery = "UPDATE Patentaantekeningen SET Aantekening =? WHERE ID =?";}
	elseif ($type =="syndroom"){
		$iquery = "UPDATE Actiesaantekeningen SET Aantekening =? WHERE ID =?";}
    $iid = $conn->prepare($iquery);
    $iid->bind_param('si', $new_in, $num);
    $iid->execute();
    $iid->close();
	echo '<p><a href="hoofdmenu.php">aagepast</a></p>';
}
//insert
elseif (isset($_POST["insert"])) {
	$new_in = $_POST["insert"];
	if($type =="chineeskruid"){
		$iquery = "INSERT INTO Chineesaantekeningen (Kruid, Aantekening, User) VALUES(?, ?, ?)";}
	elseif ($type =="westerskruid"){
		$iquery = "INSERT INTO Kruidenaantekeningen (Kruid, Aantekening, User) VALUES(?, ?, ?)";}
	elseif ($type =="westersformule"){
		$iquery = "INSERT INTO Formulesaantekeningen (Kruid, Aantekening, User) VALUES(?, ?, ?)";}
	elseif ($type =="patentformule"){
		$iquery = "INSERT INTO Patentaantekeningen (Patent, Aantekening, User) VALUES(?, ?, ?)";}
	elseif ($type =="syndroom"){
		$iquery = "INSERT INTO Actiesaantekeningen (Actie, Aantekening, User) VALUES(?, ?, ?)";}
    $iid = $conn->prepare($iquery);
    $iid->bind_param('isi', $num, $new_in, $userid);
    $iid->execute();
    $iid->close();
	echo '<p><a href="aantekening.php?id='.$num.'&type='.$type.'">ingevoerd</a></p>';
}
//fetch
else {

	//insert form
	echo '<h2>Invoeren</h2>';
	echo '<form method="POST" action="aantekening.php?id='.$num.'&type='.$type.'"><div class="invul">
	<div class="inl">Aantekening: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="insert"></TEXTAREA></WRAP></div>
		<div class="sbm"><input type="submit" value="invoeren" class="but"></div>
	</div></form>';
	
	
	
	//updating display
	if ($usertype =="admin"){
			if($type =="chineeskruid"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Chineesaantekeningen WHERE Kruid ='$num'";}
	elseif ($type =="westerskruid"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Kruidenaantekeningen WHERE Kruid ='$num'";}
	elseif ($type =="westersformule"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Formulesaantekeningen WHERE Kruid ='$num'";}
	elseif ($type =="patentformule"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Patentaantekeningen WHERE Patent ='$num'";}
	elseif ($type =="syndroom"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Actiesaantekeningen WHERE Actie ='$num'";}
	else {
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Kruidenaantekeningen WHERE Kruid ='$num'";}
	}
	else {
			if($type =="chineeskruid"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Chineesaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	elseif ($type =="westerskruid"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Kruidenaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	elseif ($type =="westersformule"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Formulesaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	elseif ($type =="patentformule"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Patentaantekeningen WHERE Patent ='$num' AND User ='$userid'";}
	elseif ($type =="syndroom"){
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Patentaantekeningen WHERE Actie ='$num' AND User ='$userid'";}
	else {
		$cwquery = "SELECT COUNT(Aantekening) AS counting FROM Kruidenaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	}
	
	

	$cwresult = mysqli_query($conn, $cwquery);
    $cw = mysqli_fetch_assoc($cwresult);
	
	echo $cw;
	
	if ($cw >=1){
		echo '<h2>Wijzigen</h2>';
		
	if ($usertype =="admin"){
			if($type =="chineeskruid"){
		$wquery = "SELECT Aantekening FROM Chineesaantekeningen WHERE Kruid ='$num'";}
	elseif ($type =="westerskruid"){
		$wquery = "SELECT Aantekening FROM Kruidenaantekeningen WHERE Kruid ='$num'";}
	elseif ($type =="westersformule"){
		$wquery = "SELECT Aantekening FROM Formulesaantekeningen WHERE Kruid ='$num'";}
	elseif ($type =="patentformule"){
		$wquery = "SELECT Aantekening FROM Patentaantekeningen WHERE Patent ='$num'";}
	elseif ($type =="syndroom"){
		$wquery = "SELECT Aantekening FROM Actiesaantekeningen WHERE Patent ='$num'";}
	else {
		$wquery = "SELECT Aantekening FROM Kruidenaantekeningen WHERE Kruid ='$num'";}
	}
	else {
			if($type =="chineeskruid"){
		$wquery = "SELECT Aantekening FROM Chineesaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	elseif ($type =="westerskruid"){
		$wquery = "SELECT Aantekening FROM Kruidenaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	elseif ($type =="westersformule"){
		$wquery = "SELECT Aantekening FROM Formulesaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	elseif ($type =="patentformule"){
		$wquery = "SELECT Aantekening FROM Patentaantekeningen WHERE Patent ='$num' AND User ='$userid'";}
	elseif ($type =="syndroom"){
		$wquery = "SELECT Aantekening FROM Actiesaantekeningen WHERE Patent ='$num' AND User ='$userid'";}
	else {
		$wquery = "SELECT Aantekening FROM Kruidenaantekeningen WHERE Kruid ='$num' AND User ='$userid'";}
	}	
		
		
	/*
	if($type =="chineeskruid"){
		$wquery = "SELECT Aantekening FROM Chineesaantekeningen WHERE ID = ? AND WHERE User =?";}
	elseif ($type =="westerskruid"){
		$wquery = "SELECT Aantekening FROM Kruidenaantekeningen WHERE ID = ? AND WHERE User =?";}
	elseif ($type =="westersformule"){
		$wquery = "SELECT Aantekening FROM Formulesaantekeningen WHERE ID = ? AND WHERE User =?";}
	elseif ($type =="patentformule"){
		$wquery = "SELECT Aantekening FROM Patentaantekeningen WHERE ID = ? AND WHERE User =?";}
		*/
	//$wid = $conn->prepare($wquery);
	//$wid->bind_param('ii', $num, $userid);
	//$wid->execute();
	//$wid->bind_result($aantekening);
	$result = mysqli_query($conn, $wquery);
    while($rownw = mysqli_fetch_assoc($result))
	{
		echo '<form method="POST" action="aantekening.php?id='.$num.'&type='.$type.'"><div class="invul"><input type="hidden" value="'.$rownw["ID"].'" name="uid">
		<div class="inl">Aantekening: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="update">'.$rownw["Aantekening"].'</TEXTAREA></WRAP></div>
		<div class="sbm"><input type="submit" value="update" class="but"></div>
		</div></form>';
	}
	//$wid->close();
	}
	
}
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