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
<option value="">Nederlandse naam kruid</option>
<option value="">Latijnse naam kruid</option>
<option value="">Thermodynamisch in kruid</option>
<option value="">Indicaties in kruidenformule</option>
<option value="">Naam kruidenformule</option>
<option value="">Kruid in kruidenformule</option>
<option value="">Nederlandse naam patentformule</option>
<option value="">Engelse naam patentformule</option>
<option value="">Pinjin naam patentformule</option>
<option value="">Syndroom naam</option>
<option value="">Syndroom op symptomen pols en tong</option>
<option value="">Patentformule op symptoom</option>
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