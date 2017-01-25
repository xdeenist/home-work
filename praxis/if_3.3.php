<?php
$num1 = 5.2;
$num2 = 5.2;
$num3 = 5.2;
$num11 = round($num1);
$num21 = round($num2);
$num31 = round($num3);
 if ($num31 < $num11 && $num11 > $num21) {
  	print "$num11 \n"; 
 } elseif ($num31 == $num11 && $num21 == $num11 && $num31 == $num21){
    print "$num31 $num11 $num21\n"; 
 } elseif ($num31 < $num21 && $num21 > $num11) {
 	print "$num21 \n";
 } elseif (($num21 < $num31 && $num31 > $num11) ){
 	print "$num31 \n";
 } elseif ($num21 == $num11){
    print "$num11 $num11\n"; 
 } elseif ($num31 == $num11){
    print "$num31 $num11\n"; 
 } elseif ($num31 == $num11){
    print "$num31 $num11\n"; 
 }
