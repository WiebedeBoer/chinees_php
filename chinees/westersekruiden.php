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
if (isset($_GET["id"])){
	if (filter_var($_GET["id"], FILTER_VALIDATE_INT)){
	$num = $_GET["id"];
//update
if (isset($_POST["nederlands"]) && isset($_POST["latijn"]) && isset($_POST["familie"]) && isset($_POST["inhoudsstoffen"]) && isset($_POST["toepassingen"]) && isset($_POST["eigenschappen"]) && isset($_POST["actie"]) && isset($_POST["gebruik"]) && isset($_POST["contraindicaties"]) && isset($_POST["smaak"]) && isset($_POST["dosering"]) && isset($_POST["thermodynamisch"]) && isset($_POST["gebruiktedelen"]) && isset($_POST["orgaan"])) {
	$new_nederlands = $_POST["nederlands"];
	$new_latijn = $_POST["latijn"];
	$new_familie = $_POST["familie"];
	$new_inhoudsstoffen = $_POST["inhoudsstoffen"];
	$new_toepassingen = $_POST["toepassingen"];
	$new_eigenschappen = $_POST["eigenschappen"];
	$new_actie = $_POST["actie"];
	$new_gebruik = $_POST["gebruik"];
	$new_contraindicaties = $_POST["contraindicaties"];
	$new_smaak = $_POST["smaak"];
	$new_dosering = $_POST["dosering"];
	$new_thermodynamisch = $_POST["thermodynamisch"];
	$new_gebruiktedelen = $_POST["gebruiktedelen"];
	$new_orgaan = $_POST["orgaan"];

	$upquery = "UPDATE Kruiden SET Nederlands =?, Latijn =?, Familie =?, Inhoudsstof =?, Toepassingen =?, Eigenschappen =?, Actie =?, Gebruik =?, Contraindicaties =?, Smaak =?, Dosering =?, Thermodynamisch =?, GebruikteDelen =?, Orgaan =? WHERE ID =?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssssssssssssssi', $new_nederlands, $new_latijn, $new_familie, $new_inhoudsstoffen, $new_toepassingen, $new_eigenschappen, $new_actie, $new_gebruik, $new_contraindicaties, $new_smaak, $new_dosering, $new_thermodynamisch, $new_gebruiktedelen, $new_orgaan, $num);
	$upid->execute();
	$upid->close();
	
	echo '<p><a href="westersekruiden.php?id='.$num.'">aangepast</a></p>';
	
}
//fetch
else {

	$wquery = "SELECT Nederlands, Latijn, Familie, Inhoudsstof, Toepassingen, Eigenschappen, Actie, Gebruik, Contraindicaties, Smaak, Dosering, Thermodynamisch, GebruikteDelen, Orgaan FROM Kruiden WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($new_nederlands, $new_latijn, $new_familie, $new_inhoudsstoffen, $new_toepassingen, $new_eigenschappen, $new_actie, $new_gebruik, $new_contraindicaties, $new_smaak, $new_dosering, $new_thermodynamisch, $new_gebruiktedelen, $new_orgaan);
	$wid->fetch();
	$wid->close();
	
	echo '<p><b><a href="aantekening.php?id='.$num.'&type=westerskruid">Aantekeningen</a></b></p>';

	echo '<form method="POST" action="westersekruiden.php">
<div class="invul">
<div class="inl">Nederlands: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="nederlands">'.$new_nederlands.'</TEXTAREA></WRAP></div>
<div class="inl">Latijn: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="latijn">'.$new_latijn.'</TEXTAREA></WRAP></div>
<div class="inl">Familie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="familie">'.$new_familie.'</TEXTAREA></WRAP></div>
<div class="inl">Inhoudsstoffen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="inhoudsstoffen">'.$new_inhoudsstoffen.'</TEXTAREA></WRAP></div>
<div class="inl">Toepassingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="toepassingen">'.$new_toepassingen.'</TEXTAREA></WRAP></div>
<div class="inl">Eigenschappen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="eigenschappen">'.$new_eigenschappen.'</TEXTAREA></WRAP></div>
<div class="inl">Actie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="actie">'.$new_actie.'</TEXTAREA></WRAP></div>
<div class="inl">Gebruik: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruik">'.$new_gebruik.'</TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties">'.$new_contraindicaties.'</TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak">'.$new_smaak.'</TEXTAREA></WRAP></div>
<div class="inl">Dosering: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="dosering">'.$new_dosering.'</TEXTAREA></WRAP></div>
<div class="inl">Thermodynamisch: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="thermodynamisch">'.$new_thermodynamisch.'</TEXTAREA></WRAP></div>
<div class="inl">Gebruikte Delen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruiktedelen">'.$new_gebruiktedelen.'</TEXTAREA></WRAP></div>
<div class="inl">Orgaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="orgaan">'.$new_orgaan.'</TEXTAREA></WRAP></div>
<div class="inp"><input type="submit" value="update" name="but"></div>
</div>
</form>';
	
}
	}		
}
else {
//insert
if (isset($_POST["nederlands"]) && isset($_POST["latijn"]) && isset($_POST["familie"]) && isset($_POST["inhoudsstoffen"]) && isset($_POST["toepassingen"]) && isset($_POST["eigenschappen"]) && isset($_POST["actie"]) && isset($_POST["gebruik"]) && isset($_POST["contraindicaties"]) && isset($_POST["smaak"]) && isset($_POST["dosering"]) && isset($_POST["thermodynamisch"]) && isset($_POST["gebruiktedelen"]) && isset($_POST["orgaan"])) {
	$new_nederlands = $_POST["nederlands"];
	$new_latijn = $_POST["latijn"];
	$new_familie = $_POST["familie"];
	$new_inhoudsstoffen = $_POST["inhoudsstoffen"];
	$new_toepassingen = $_POST["toepassingen"];
	$new_eigenschappen = $_POST["eigenschappen"];
	$new_actie = $_POST["actie"];
	$new_gebruik = $_POST["gebruik"];
	$new_contraindicaties = $_POST["contraindicaties"];
	$new_smaak = $_POST["smaak"];
	$new_dosering = $_POST["dosering"];
	$new_thermodynamisch = $_POST["thermodynamisch"];
	$new_gebruiktedelen = $_POST["gebruiktedelen"];
	$new_orgaan = $_POST["orgaan"];
	
	$iquery = "INSERT INTO Kruiden (Nederlands, Latijn, Familie, Inhoudsstof, Toepassingen, Eigenschappen, Actie, Gebruik, Contraindicaties, Smaak, Dosering, Thermodynamisch, GebruikteDelen, Orgaan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $iid = $conn->prepare($iquery);
    $iid->bind_param('ssssssssssssss', $new_nederlands, $new_latijn, $new_familie, $new_inhoudsstoffen, $new_toepassingen, $new_eigenschappen, $new_actie, $new_gebruik, $new_contraindicaties, $new_smaak, $new_dosering, $new_thermodynamisch, $new_gebruiktedelen, $new_orgaan);
    $iid->execute();
    $iid->close();
		
	$mwquery = "SELECT MAX(ID) AS Maxid FROM Kruiden";
	$result_wpg = $conn->query($mwquery);
	$rowwpg = $result_wpg->fetch_assoc();
	$maxid = $rowwpg['Maxid'];
		
	echo '<p><a href="westersekruiden.php?id='.$maxid.'">ingevoerd</a></p>';
}
//form
else {
	echo '<form method="POST" action="westersekruiden.php">
<div class="invul">
<div class="inl">Nederlands: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="nederlands"></TEXTAREA></WRAP></div>
<div class="inl">Latijn: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="latijn"></TEXTAREA></WRAP></div>
<div class="inl">Familie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="familie"></TEXTAREA></WRAP></div>
<div class="inl">Inhoudsstoffen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="inhoudsstoffen"></TEXTAREA></WRAP></div>
<div class="inl">Toepassingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="toepassingen"></TEXTAREA></WRAP></div>
<div class="inl">Eigenschappen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="eigenschappen"></TEXTAREA></WRAP></div>
<div class="inl">Actie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="actie"></TEXTAREA></WRAP></div>
<div class="inl">Gebruik: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruik"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak"></TEXTAREA></WRAP></div>
<div class="inl">Dosering: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="dosering"></TEXTAREA></WRAP></div>
<div class="inl">Thermodynamisch: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="thermodynamisch"></TEXTAREA></WRAP></div>
<div class="inl">Gebruikte Delen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="gebruiktedelen"></TEXTAREA></WRAP></div>
<div class="inl">Orgaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="orgaan"></TEXTAREA></WRAP></div>
<div class="inp"><input type="submit" value="invoeren" name="but"></div>
</div>
</form>';
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