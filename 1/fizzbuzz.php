<?php

print "Hello.\n
Please input three numbers.\n
Press Ctrl+c to exit script.
\n\n Enter the first number please:";

$handle = fopen ("php://stdin","r");
$num1 = 1;
$num2 = 1;
$num3 = 1;

while ($num1 > 0) {
    $line_num1 = fgets($handle);
if (!preg_match('/^\d+$/', $line_num1)) {
    print "\n Enter a numeric value please:";
}else{
     print "\n Enter the second number please:";
     $num1 = 0;
   }

}

while ($num2 > 0) {
    $line_num2 = fgets($handle);
if (!preg_match('/^\d+$/', $line_num2)) {
    print "\n Enter a numeric value please:";
}else{
     print "\n Enter the third number please:";
     $num2 = 0;
   }

}

while ($num3 > 0) {
    $line_num3 = fgets($handle);
if (!preg_match('/^\d+$/', $line_num3)) {
    print "\n Enter a numeric value please:";
}else{
     print " \n";
     $num3 = 0;
   }

}


for ($i = 1; $i <= $line_num3; $i++)
{
    if($i % $line_num1 == 0 && $i % $line_num2 ==0){
        print "FB ";
    }
    elseif($i % $line_num1 == 0){
        print "F ";
    }
    elseif($i % $line_num2 == 0){
        print "B ";
    }
    else {
        print "$i ";
    }
}

echo "\n";