<?php
function fizzbuzz($f, $b, $n) {    
foreach (range(1, $n) as $number) {
        if(!($number % $f) && !($number % $b)) {            
        $res[] = "FB";
        } elseif(!($number % $f)) { 
        $res[] = "F";     
        } elseif(!($number % $b)) { 
        $res[] = "B"; 
        } else $res[] = $number; 
        }    
 return implode(" ", $res);
 }
function test($value){    
	list($f, $b, $n) = explode(" ",(trim($value)));  
  print_r(fizzbuzz($f, $b, $n) . "\n");
}

array_map("test", file("/home/xdeenist/git-repo/home-work/file.txt"));