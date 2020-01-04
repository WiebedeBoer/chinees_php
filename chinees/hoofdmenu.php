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
	
echo '<div class="mn"><a href="westersekruiden.php">Westerse Kruiden</a></div>';
echo '<div class="mn"><a href="chinesekruiden">Chinese Kruiden</a></div>';

echo '<div class="mn"><a href="kruidenformules.php">Westerse Formules</a></div>';
echo '<div class="mn"><a href="patentformules.php">Chinese Formules</a></div>';

echo '<div class="mn"><a href="syndromen.php">Syndromen</a></div>';
echo '<div class="mn"><a href="syndroomacties.php">Syndromen Acties</a></div>';

echo '<div class="mn"><form method="post" action="overzicht.php"><inout type="text" name="zoekterm"><select name="soort">
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
</select></form></div>';
	
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