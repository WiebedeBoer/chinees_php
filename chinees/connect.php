<?php



//DATABASE CONNECTION VARIABLES
$myserver ="localhost";
$myname = "geennaam";
$mypassword = "watte2017";
$mydb = "test_nl";

$conn = new mysqli($myserver, $myname, $mypassword, $mydb);
if ($conn->connect_error)
  {
echo "<P class='error'>Could not select database</P>";
$connected = 0;
  }
else {
	
	$user =	$_COOKIE["person"];

$usquery = "SELECT ID, Type FROM Users WHERE Username = ?";
$usid = $conn->prepare($usquery);
$usid->bind_param('s', $user);
$usid->execute();
$usid->bind_result($userid,$usertype);
$usid->fetch();
$usid->close();

$connected = 1;

}
?>