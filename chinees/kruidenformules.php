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
if (isset($_POST["naam"]) && isset($_POST["indicaties"]) && isset($_POST["werking"]) && isset($_POST["klasse"]) && isset($_POST["smaak"]) && isset($_POST["meridiaan"]) && isset($_POST["qi"]) && isset($_POST["contraindicaties"])) {
	/*
	$new_ = $_POST[""];
	$upquery = "UPDATE  SET  =?, =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssi', $new_, $new_, $num);
	$upid->execute();
	$upid->close();
	*/
}
//fetch
else {
	/*
	$wquery = "SELECT , , , ,  FROM  WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($, $, $, $, $);
	$wid->fetch();
	$wid->close();
	*/
	echo '<form method="POST" action="kruidenformules.php?id='.$num.'"><div class="invul">
<div class="inl">Naam: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="naam"></TEXTAREA></WRAP></div>
<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties"></TEXTAREA></WRAP></div>
<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking"></TEXTAREA></WRAP></div>
<div class="inl">Klasse: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="klasse"></TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak"></TEXTAREA></WRAP></div>
<div class="inl">Meridiaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="meridiaan"></TEXTAREA></WRAP></div>
<div class="inl">Qi: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="qi"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
	<div class="inp"><input type="submit" value="update" name="but"></div>
	</div></form>';
	
	
}
	}		
}
else {
//insert
if (isset($_POST["naam"]) && isset($_POST["indicaties"]) && isset($_POST["werking"]) && isset($_POST["klasse"]) && isset($_POST["smaak"]) && isset($_POST["meridiaan"]) && isset($_POST["qi"]) && isset($_POST["contraindicaties"])) {
	/*
	    $iquery = "INSERT INTO  (, , ) VALUES (?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('sss', $rawtitle, $datum, $modtext);
        $iid->execute();
        $iid->close();
		*/
}
//form
else {
	echo '<form method="POST" action="kruidenformules.php">
<div class="invul">
<div class="inl">Naam: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="naam"></TEXTAREA></WRAP></div>
<div class="inl">Indicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="indicaties"></TEXTAREA></WRAP></div>
<div class="inl">Werking: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="werking"></TEXTAREA></WRAP></div>
<div class="inl">Klasse: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="klasse"></TEXTAREA></WRAP></div>
<div class="inl">Smaak: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="smaak"></TEXTAREA></WRAP></div>
<div class="inl">Meridiaan: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="meridiaan"></TEXTAREA></WRAP></div>
<div class="inl">Qi: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="qi"></TEXTAREA></WRAP></div>
<div class="inl">Contraindicaties: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="contraindicaties"></TEXTAREA></WRAP></div>
<div class="inp"><input type="submit" value="invoeren" name="but"></div>
</div>
</form>';

	$wcoquery = "SELECT COUNT(ID) AS idc FROM Kruiden";	
	$wcoid = $conn->prepare($wcoquery);
	$wcoid->execute();
	$wcoid->bind_result($idc);
	
	if ($idc >=1){
echo '<form method="post" action="kruidenformules.php">';
	echo '<select name="select">';
	$wquery = "SELECT ID, Nederlands FROM Kruiden";	
	$wid = $conn->prepare($wquery);
	$wid->execute();
	while ($rownw = $wid->fetch())
	{
		$znum = $rownw["id"];
		$znederlands = $rownw["Nederlands"];
		echo '<option value="'.$znum.'">'.$znederlands.'</option>';
	}
	echo '</select>';
	echo '<br> Verhouding: <input type="text" name="verhouding">';
	echo '<input type="submit" value="verhouding invoeren" name="but">';
	echo '</form>';
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