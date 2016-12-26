<?php
//looping through file
foreach (file($argv[1]) as $value) {
    //creating or reseting variables
    $result = [];
    $rank = 1;
    $ranks = [$rank];
    //getting numbers to process
    list($a, $b) = array_map('intval', explode(',', $value));
    //defining ranks used in final multiplier
    while($b * ($rank * 10) < $a) {
        $rank *= 10;
        $ranks[] = $rank;
    }
    $ranks = array_reverse($ranks);
    //defining exact multiplier for each rank
    foreach ($ranks as $rank) {
        $multiplier = isset($result[$rank]) ? $result[$rank] : 1;
        while(($rank * ($multiplier + 1) * $b) < $a) {
            $multiplier++;
        }
        $result[$rank] = $multiplier;
        if($rank != 1) {
            $result[$rank * 0.1] = $multiplier * 10;
        }
    }
    echo $b * ($result[1]+1) . "\n";
}