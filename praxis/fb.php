<?php
$data = file($argv[1]); // массив названий файлов

function fizzbuzz($f, $b, $n){
	foreach (1, $n as $number) {
		if ($number % $f == 0) && ($number %  $b == 0) {
			$res[] = "FB";
		} elseif ($number % $f == 0) {
		    $res[] = "F";
		} elseif ($number % $b == 0) {
			$res[] = "B ");
		} else $res[] = $n;
		
	}
	return implode(" ", $res );
}


foreach ($data as $value) {
	list($f, $b, $n) = explode('', (trim($value))); // trim отрезает лишние символы
    print_r(fizzbuzz($f, $b, $n) . "\n");

}