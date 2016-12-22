<?php
$num1 = 5;
$num2 = 2;
$num3 = 3;
 if ($num3 < $num1 && $num1 < $num2) {
 	print "$num1 \n";  
 } elseif ($num3 < $num2 && $num2 < $num1) {
 	print "$num2 \n";
 } else print "$num3 \n";