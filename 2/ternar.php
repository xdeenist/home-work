<?php
print "Say hello: ";
$handle = fopen ("php://stdin","r");
$a = fgets($handle);

echo 'Hello '.(preg_match("/Hello/", $a)?'world':'and good buy');

print "\n";