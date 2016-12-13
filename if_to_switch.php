<?php

echo "Give it to me!\n";
$handle = fopen ("php://stdin","r");
$number = fgets($handle);

switch ($number) {
    case $number < 10:
         echo "WHAAAAT????";
     	 break;
    case ($number > 10) && ($number < 100):
         echo "\n OK :(";
         break;
    case $number > 100:
         echo "Thanks, man!\n";
         break;
    case $number > 1000:
         echo "\n!!!!WOOOOWWWW!!!\n";
         break;
}


