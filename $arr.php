<?php
$arr = ['0' => 1, '1' => 2, '2' => 3, '3' => 4];
print_r($arr);
unset($arr [2]);
print_r($arr);
print_r(array_values($arr));