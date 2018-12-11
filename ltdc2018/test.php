<?php
//$kemungkinan=explode("","abcdefghijklmnopqrstuvwxyz1234567890");

function katarandom($panjang){
$kemungkinan=explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z");
$kata="";
for ($i=0; $i <$panjang ; $i++) { 
	$kata .= $kemungkinan[random_int(0,sizeof($kemungkinan)-1)];
}
return $kata;
}

$kemungkinan=explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z");
echo katarandom(10)."-".sizeof($kemungkinan);
?>