<?php
if (isset($_POST["username"]) && isset($_POST["password"])){
/*FILTERS*/
//CHECK USERNAME
if(filter_has_var(INPUT_POST, "username")){
//CHECK PASSWORD
if(filter_has_var(INPUT_POST, "password")){
if (filter_var($_POST["username"], FILTER_SANITIZE_STRING)){
if (filter_var($_POST["password"], FILTER_SANITIZE_STRING)){
$username = $_POST["username"];
$password = md5($_POST["password"]);
//DATABASE CONNECTION VARIABLES
include("connect.php");

// Check connection
if ($connected ==1){

//COUNT USER
$cquery = "SELECT COUNT(*) AS usercheck, ID, Password, Cokey FROM Users WHERE Username = ?";
$cid = $conn->prepare($cquery);
$cid->bind_param('s', $username);
$cid->execute();
$cid->bind_result($usercheck, $user_id, $gpass, $makekey);
$cid->fetch();
$cid->close();
if ($usercheck ==1){
if ($password == $gpass){
/*COOKIE RANDOM KEY*/
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$ra = (rand(1,62)) - 1;
$rancha = substr($chars,$ra,1);
$rb = (rand(1,62)) - 1;
$ranchb = substr($chars,$rb,1);
$rc = (rand(1,62)) - 1;
$ranchc = substr($chars,$rc,1);
$rd = (rand(1,62)) - 1;
$ranchd = substr($chars,$rd,1);
$re = (rand(1,62)) - 1;
$ranche = substr($chars,$re,1);
$rf = (rand(1,62)) - 1;
$ranchf = substr($chars,$rf,1);
$rg = (rand(1,62)) - 1;
$ranchg = substr($chars,$rg,1);
$rh = (rand(1,62)) - 1;
$ranchh = substr($chars,$rh,1);
$ri = (rand(1,62)) - 1;
$ranchi = substr($chars,$ri,1);
$rj = (rand(1,62)) - 1;
$ranchj = substr($chars,$rj,1);
$rk = (rand(1,62)) - 1;
$ranchk = substr($chars,$rk,1);
$rl = (rand(1,62)) - 1;
$ranchl = substr($chars,$rl,1);
$makekey = $rancha.$ranchb.$ranchc.$ranchd.$ranche.$ranchf.$ranchg.$ranchh.$ranchi.$ranchj.$ranchk.$ranchl;
setcookie("person", $username, time()+43200);
setcookie("keys", $makekey, time()+43200);
//UPDATING USER KEY
$uquery = "UPDATE Users SET Cokey ='$makekey' WHERE Username = ?";
$uid = $conn->prepare($uquery);
$uid->bind_param('s', $username);
$uid->execute();
$uid->close();
$Allowlogin = 11;
}
else {
$Allowlogin = 10;
}


}
else {
$Allowlogin = 9;
}


}
//con

}
else {
$Allowlogin = 8;}
}
else {
$Allowlogin = 7;}
}
else {
$Allowlogin = 6;}
}
else {
$Allowlogin = 5;}
}
else {
$Allowlogin = 4;}


//display
if ($Allowlogin ==1){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Foutmelding<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==2){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>U heeft meer dan 5 keer op een rij het wachtwoord fout. U moet minstens een halfuur wachten.<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==3){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Ongeldig IP adres<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==4){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Geen gebruikersnaam en wachtwoord opgegeven<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==5){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Geen gebruikersnaam opgegeven<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==6){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Geen wachtwoord opgegeven<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==7){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Ongeldige karakters in gebruikersnaam<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==8){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Ongeldige karakters in wachtwoord<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==9){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Een dergelijk gebruikersnaam is niet gevonden in de database<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==10){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Onjuist wachtwoord<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
elseif ($Allowlogin ==11){
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='beh'>Welkom ".$username."<BR>Ga door naar <A HREF='hoofdmenu.php'>administratieve</A> sectie.</P>";
echo '</BODY>
</HTML>';
}
else {
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>';
include("includes/inc_head.php");
echo '</HEAD>
<BODY>
<H1>Portal</H1>';
echo "<P class='error'>Foutmelding<BR><A HREF='index.php'>terug</A></P>";
echo '</BODY>
</HTML>';
}
?>