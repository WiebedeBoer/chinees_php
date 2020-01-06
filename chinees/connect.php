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

$connected = 1;

}
?>