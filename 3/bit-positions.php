<?php
$file = fopen('/home/xdeenist/git-repo/home-work/pic/bitfile.txt', 'r');

while (false !== ($line = fgets($file))){
      list($num1, $num2, $num3) = explode(",", $line);

      $bits = decbin($num1);
            print_r($bits) ;
            echo "\n";
 //      $leftBit  = $bits[strlen($bits) - $num2];
 //      print_r($leftBit);
 //      echo "\n";
}
fclose($file);