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
	
/*	
$user =	$_COOKIE["person"];

$uquery = "SELECT Type FROM Users WHERE Username = ?";
$uid = $conn->prepare($uquery);
$uid->bind_param('s', $user);
$uid->execute();
$uid->bind_result($usertype);
$uid->fetch();
$uid->close();
*/

if ($usertype =="admin"){	

echo '<div class="mn"><h2>Invoeren</h2></div>';

echo '<div class="mn"><a href="westersekruiden.php">Westerse Kruiden</a></div>';
echo '<div class="mn"><a href="chinesekruiden.php">Chinese Kruiden</a></div>';

echo '<div class="mn"><a href="kruidenformules.php">Westerse Formules</a></div>';
echo '<div class="mn"><a href="patentformules.php">Chinese Formules</a></div>';

echo '<div class="mn"><a href="syndromen.php">Syndromen</a></div>';
echo '<div class="mn"><a href="syndroomacties.php">Syndromen Acties</a></div>';
echo '<div class="mn"><h2>Synoniemen</h2></div>';
echo '<div class="mn"><a href="synoniem.php">Synoniemen</a></div>';
}

echo '<div class="mn"><h2>Zoeken</h2></div>';

include("zoek.php");

echo '<div class="mn"><h2>Uitloggen</h2></div>';

echo '<div class="mn"><a href="logout.php">Logout</a></div>';
	
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