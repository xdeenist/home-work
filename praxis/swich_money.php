<?php
$handle = fopen ("php://stdin","r");
$line = fgets($handle);


if (!preg_match('/^\d+$/', $line)) {
    print "\n Enter a numeric value please: \n";
}else{
	switch ($line) {
		case 1:
			print "http://bit.ly/2hUZEw4 \n";
			break;
		case 2:
			print "http://bit.ly/2hUZEw4 \n";
			break;
		case 5:
			print "http://bit.ly/2hUZEw4 \n";
			break;
		case 10:
			print "http://bit.ly/2hUZEw4 \n";
			break;
		case 20:
			print "http://bit.ly/2hUZEw4 \n";
			break;
		case 100:
			print "http://bit.ly/2hUZEw4 \n";
			break;
		default:
		    print "сорян( \n" ;
		break;

	}
}
