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
echo '<div class="mn"><a href="chinesekruiden.php">Chinese Kruiden</a></div>';

echo '<div class="mn"><a href="kruidenformules.php">Westerse Formules</a></div>';
echo '<div class="mn"><a href="patentformules.php">Chinese Formules</a></div>';

echo '<div class="mn"><a href="syndromen.php">Syndromen</a></div>';
echo '<div class="mn"><a href="syndroomacties.php">Syndromen Acties</a></div>';

echo '<div class="mn"><form method="post" action="overzicht.php"><inout type="text" name="zoekterm"><select name="soort">
<option value="nederlands">Nederlandse naam kruid</option>
<option value="latijn">Latijnse naam kruid</option>
<option value="thermo">Thermodynamisch in kruid</option>
<option value="indicaties">Indicaties in kruidenformule</option>
<option value="naam">Naam kruidenformule</option>
<option value="formule">Kruid in kruidenformule</option>
<option value="patent">Nederlandse naam patentformule</option>
<option value="engels">Engelse naam patentformule</option>
<option value="pinjin">Pinjin naam patentformule</option>
<option value="syndroom">Syndroom naam</option>
<option value="symptoom">Syndroom op symptomen pols en tong</option>
<option value="patentsymptoom">Patentformule op symptoom</option>
</select>
<input type="submit" value="zoek" name="but">
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