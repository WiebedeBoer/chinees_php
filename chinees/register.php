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
if (isset($_POST["username"]) && isset($_POST["password"])){
	//CHECK USERNAME
if(filter_has_var(INPUT_POST, "username")){
//CHECK PASSWORD
if(filter_has_var(INPUT_POST, "password")){
if (filter_var($_POST["username"], FILTER_SANITIZE_STRING)){
if (filter_var($_POST["password"], FILTER_SANITIZE_STRING)){
$username = $_POST["username"];
$password = md5($_POST["password"]);
include("connect.php");
if ($connected ==1){
	    $bquery = "INSERT INTO Users (Username, Password) VALUES (?, ?)";
        $bch = $conn->prepare($bquery);
        $bch->bind_param('ss', $username, $password);
        $bch->execute();
        $bch->close();
		echo '<p>Succesvol geregisteerd. Terug naar <A href="index.php">home</a></p>';
  }
  
}
else {
	echo "<P class='error'>Ongeldige karakters in wachtwoord<BR><A HREF='register.php'>terug</A></P>";
}

}
else {
	echo "<P class='error'>Ongeldige karakters in gebruikersnaam<BR><A HREF='register.php'>terug</A></P>";
}

}
else {
	echo "<P class='error'>Geen wachtwoord<BR><A HREF='register.php'>terug</A></P>";
}
}
else {
	echo "<P class='error'>Geen gebruikersnaam<BR><A HREF='register.php'>terug</A></P>";
}
	
}
else {
echo '<h1>Registratie</h1><div class="fm"><form method="POST" action="register.php">
<table class="inlog">
<tr><td class="inl">Gebruikersnaam: </td><td class="inl"><input type="text" size="20" maxlength="45" name="username" /></td></tr>
<tr><td class="inl">Wachtwoord: </td><td class="inl"><input type="password" size="20" maxlength="20" name="password" /></td></tr>
<tr><td class="inl">&nbsp;</td><td class="inl"><input type="submit" value="registreer" /></td></tr>
</table>
</form></div>';
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