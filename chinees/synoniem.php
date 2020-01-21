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

//insert
if (isset($_POST["synoniem"]) && isset($_POST["naam"])) {
	$new_alt = $_POST["synoniem"];
	$new_naam = $_POST["naam"];
	
	    $iquery = "INSERT INTO Synoniemen (Naam, Synoniem) VALUES (?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('ss', $new_alt, $new_naam);
        $iid->execute();
        $iid->close();
		
	echo '<p><a href="synoniem.php">ingevoerd</a></p>';
		
}
elseif (isset($_POST["del"])){
	$delid = $_POST["del"];
		$ncquery = "DELETE FROM Synoniemen WHERE ID =?";

$ncid = $conn->prepare($ncquery);
$ncid->bind_param('i', $delid);
$ncid->execute();
$ncid->close();
echo '<p><a href="synoniem.php">verwijderd</a></p>';

}
//form
else {
	echo '<form method="POST" action="synoniem.php">
<div class="invul">
<div class="inl">Naam: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="naam"></TEXTAREA></WRAP></div>
<div class="inl">Synoniem: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="2" name="synoniem"></TEXTAREA></WRAP></div>
<div class="inp"><input type="submit" value="invoeren" name="but" class="but"></div>
</div>
</form>';


$ncquery = "SELECT COUNT(ID) AS counter FROM Synoniemen";
$ncid = $conn->prepare($ncquery);
$ncid->execute();
$ncid->bind_result($nwcheck);
$ncid->fetch();
$ncid->close();

if ($nwcheck >=1){
	
	echo '<h2>Synoniemen</h2>';

	$wquery = "SELECT Naam, Synoniem FROM Synoniemen";
	$result = mysqli_query($conn, $wquery);
    while($rownw = mysqli_fetch_assoc($result))
	{
	echo '<div> 
	<form method="post" action="synoniem.php">'.$rownw["Naam"].' '.$rownw["Synoniem"].' <input type="hidden" value="'.$rownw["ID"].'" name="del"><input type="submit" value="verwijder" name="but" class="but"></form>
	</div>';	
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