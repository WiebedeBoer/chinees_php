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
if(isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""])) {
	$new_ = $_POST[""];
	$upquery = "UPDATE  SET  =?, =? WHERE ID = ?";
	$upid = $conn->prepare($upquery);
	$upid->bind_param('ssi', $new_, $new_, $num);
	$upid->execute();
	$upid->close();
}
//fetch
else {
	$wquery = "SELECT , , , ,  FROM  WHERE ID = ?";
	$wid = $conn->prepare($wquery);
	$wid->bind_param('i', $num);
	$wid->execute();
	$wid->bind_result($, $, $, $, $);
	$wid->fetch();
	$wid->close();
	echo '<form method="POST" action="syndromen.php?id='.$num.'"><div class="invul">
	<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'..'</TEXTAREA></WRAP></div>
	<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'..'</TEXTAREA></WRAP></div>
	<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'..'</TEXTAREA></WRAP></div>
	<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name="">'..'</TEXTAREA></WRAP></div>
	</div></form>';
	
}
	}		
}
else {
//insert
if (isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""])) {
	    $iquery = "INSERT INTO  (, , ) VALUES (?, ?, ?)";
        $iid = $conn->prepare($iquery);
        $iid->bind_param('sss', $rawtitle, $datum, $modtext);
        $iid->execute();
        $iid->close();
}
//form
else {
	echo '<form method="POST" action="syndromen.php">
<div class="invul">
<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
<div class="inl">: </div><div class="inv"><WRAP><TEXTAREA cols="78" rows="20" name=""></TEXTAREA></WRAP></div>
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