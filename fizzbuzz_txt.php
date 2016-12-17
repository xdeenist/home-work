<?php
function num_line ($num1, $num2, $num3) {
   for ($i = 1; $i <= $num3; $i++)
{
    if($i % $num1 == 0 && $i % $num2 ==0){
        print "FB ";
    }
    elseif($i % $num1 == 0){
        print "F ";
    }
    elseif($i % $num2 == 0){
        print "B ";
    }
    else {
        print "$i ";
    }
} 
}


//$file = file('https://raw.githubusercontent.com/xdeenist/home-work/master/pic/file.txt');
$file = file('/home/xdeenist/git-repo/home-work/pic/file.txt');

//$firstarrov = $file[0];

foreach ($file as $numline) {
    list ($num1, $num2, $num3) = explode(" ", $numline);
    num_line ($num1, $num2, $num3);
    echo "\n";
}


