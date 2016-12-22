<?php
array_map(function($value){
 list($f, $b, $n) = explode(' ',(trim($value)));
  $result = array_map(function ($number, $x, $z){
   if (!($number % $x) && !($number % $z)) {
       return "FB";
   } elseif (!($number % $x)) {
       return "F";
   } elseif (!($number % $z)) {
       return "B";
   } else return $number;
}, range(1, $n), array_fill(1, $n, $f), array_fill(1, $n, $b));
  echo implode(" ",$result). "\n";
}, file($argv[1]));

 