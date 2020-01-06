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
<a href="index.php">terug naar home</a>
<?php
/*
if (isset($_GET["obj"])) {
if(filter_var($_GET["obj"], FILTER_VALIDATE_INT)){
$ding = $_GET["obj"];
if (isset($_COOKIE["person"]) && isset($_COOKIE["key"])){
echo '<p class="beh"><a href="beheer.php">Ga door</a> naar object</p>';
}
else {
	*/
echo '<h1>Login</h1>
<form method="POST" action="portal.php">
<table class="inlog">
<tr><td class="inl">Gebruikersnaam: </td><td class="inl"><input type="text" size="20" maxlength="20" name="username" /></td></tr>
<tr><td class="inl">Wachtwoord: </td><td class="inl"><input type="password" size="20" maxlength="20" name="password" /></td></tr>
<tr><td class="inl">&nbsp;</td><td class="inl"><input type="submit" value="login" /></td></tr>
</table>
</form>';
/*
}
}
}
*/
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