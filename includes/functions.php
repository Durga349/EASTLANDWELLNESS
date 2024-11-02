<?php 

function product($a,$b)
{
     $vat=$tax=$productPrice=0;

	$vat = $b;
    $tax = ($a * $vat) / 100;

    $productPrice = $a + $tax;
    $productPrice = round($productPrice, 2);

    return($productPrice);
}

 ?>