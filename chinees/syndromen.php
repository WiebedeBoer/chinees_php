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
	
if (isset($_GET["id"])){
	if (filter_var($_GET["id"], FILTER_VALIDATE_INT)){
	$num = $_GET["id"];
//update
if(isset($_POST["syndroom"]) && isset($_POST["symptoom"]) && isset($_POST["hoofdsymptoom"]) && isset($_POST["tong"]) && isset($_POST["pols"]) && isset($_POST["etiologie"]) && isset($_POST["pathologie"]) && isset($_POST["voorlopers"]) && isset($_POST["ontwikkelingen"])) {
	$new_syndroom = $_POST["syndroom"];
	$new_symptoom = $_POST["symptoom"];
	$new_hoofdsymptoom = $_POST["hoofdsymptoom"];
	$new_tong = $_POST["tong"];
	$new_pols = $_POST["pols"];
	$new_etiologie = $_POST["etiologie"];
	$new_pathologie = $_POST["pathologie"];
	$new_voorlopers = $_POST["voorlopers"];
	$new_ontwikkelingen = $_POST["ontwikkelingen"];
	$upquery = "UPDATE Syndromen SET Syndroom =?, Symptoom =?, Hoofdsymptoom =?, Tong =?, Pols =?, Etiologie =?, Pathologie =?, Voorlopers =?, Ontwikkelingen =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('sssssssssi', $new_syndroom, $new_symptoom, $new_hoofdsymptoom, $new_tong, $new_pols, $new_etiologie, $new_pathologie, $new_voorlopers, $new_ontwikkelingen, $num);
	$upid->execute();
	$upid->close();
}
//fetch
else {
	$wquery = "SELECT Syndroom, Symptoom, Hoofdsymptoom, Tong, Pols, Etiologie, Pathologie, Voorlopers, Ontwikkelingen FROM Syndromen WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($syndroom, $symptoom, $hoofdsymptoom, $tong, $pols, $etiologie, $pathologie, $voorlopers, $ontwikkelingen);
	$wid->fetch();
	$wid->close();
	echo '<form method="POST" action="syndromen.php?id='.$num.'"><div class="invul">
	<div class="inl">Syndroom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$syndroom.'</TEXTAREA></WRAP></div>
	<div class="inl">Symptomen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$symptoom.'</TEXTAREA></WRAP></div>
	<div class="inl">Hoofdsymptoom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$hoofdsymptoom.'</TEXTAREA></WRAP></div>
	<div class="inl">Tong: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$tong.'</TEXTAREA></WRAP></div>
	<div class="inl">Pols: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$pols.'</TEXTAREA></WRAP></div>
	<div class="inl">Etiologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$etiologie.'</TEXTAREA></WRAP></div>
	<div class="inl">Pathologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$pathologie.'</TEXTAREA></WRAP></div>
	<div class="inl">Voorlopers: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$voorlopers.'</TEXTAREA></WRAP></div>
	<div class="inl">Ontwikkelingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'.$ontwikkelingen.'</TEXTAREA></WRAP></div>
	</div></form>';
	
}
	}		
}
else {
//insert
if (isset($_POST["syndroom"]) && isset($_POST["symptoom"]) && isset($_POST["hoofdsymptoom"]) && isset($_POST["tong"]) && isset($_POST["pols"]) && isset($_POST["etiologie"]) && isset($_POST["pathologie"]) && isset($_POST["voorlopers"]) && isset($_POST["ontwikkelingen"])) {
	$new_syndroom = $_POST["syndroom"];
	$new_symptoom = $_POST["symptoom"];
	$new_hoofdsymptoom = $_POST["hoofdsymptoom"];
	$new_tong = $_POST["tong"];
	$new_pols = $_POST["pols"];
	$new_etiologie = $_POST["etiologie"];
	$new_pathologie = $_POST["pathologie"];
	$new_voorlopers = $_POST["voorlopers"];
	$new_ontwikkelingen = $_POST["ontwikkelingen"];
	    $iquery = "INSERT INTO Syndromen (Syndroom, Symptoom, Hoofdsymptoom, Tong, Pols, Etiologie, Pathologie, Voorlopers, Ontwikkelingen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('sssssssss', $new_syndroom, $new_symptoom, $new_hoofdsymptoom, $new_tong, $new_pols, $new_etiologie, $new_pathologie, $new_voorlopers, $new_ontwikkelingen);
        $iid->execute();
        $iid->close();
}
//form
else {
	echo '<form method="POST" action="syndromen.php">
<div class="invul">
	<div class="inl">Syndroom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Symptomen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Hoofdsymptoom: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Tong: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Pols: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Etiologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Pathologie: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Voorlopers: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
	<div class="inl">Ontwikkelingen: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
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