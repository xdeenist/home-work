<?php
echo "Give me the mark!\n";
$handle = fopen ("php://stdin","r");
$mark = fgets($handle);

if ($mark == 2) {
        echo "I am b`etter!!";
    } elseif ($mark == 3) {
        echo "OK :(";
    } elseif ($mark == 4) {
        echo "I am good :)";
    } elseif ($mark == 5) {
        echo "YeeeeWhaaaa!!!!";
    } else echo "Please enter real mark";
 

echo "\n";