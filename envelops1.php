<?php

//initializing empty envelops

$necessityEnvelop = 0; //NEC, необходимые траты
$freedomEnvelop = 0;   //FFA, финансовая свобода
$educationEnvelop = 0; //EDU, образование
$longTermEnvelop = 0;  //LTSS, резерв и на большие покупки
$playEnvelop = 0;      //PLAY, развлечения
$giveEnvelop = 0;      //GIVE, подарки

//initializing percent rate
$necRate = 0.55;
$ffaRate = 0.1;
$eduRate = 0.1;
$ltssRate = 0.1;
$playRate = 0.1;
$giveRate = 0.05;

//initializing expected income, expected necessity and other amounts
$expectedIncome = 1000;

//invitation, greetings etc.
print "Hello.\n
We gonna fill your envelops by the money you input here!\n
Please input your amounts of money income and see the results.\n
Press Ctrl+c to exit script.
\n\n Enter the amount please:";

//initializing handler for standard input
$handle = fopen ("php://stdin","r");
$sum = 0;

while ($sum < $expectedIncome) {


    $line = fgets($handle);
if (is_int($line)) { 
    $sum += $line;
    $necessityEnvelop += $line * $necRate;
    $freedomEnvelop += $line * $ffaRate;
    $educationEnvelop += $line * $eduRate;
    $longTermEnvelop += $line * $ltssRate;
    $playEnvelop += $line * $playRate;
    $giveEnvelop += $line * $giveRate;

    print "\n Enter the amount please:";
   }
     else print "\n Enter a numeric value please:";
}

//final output
print "At the end we have:\n
    Necessity Envelop has:                       $necessityEnvelop 
    Financial Freedom Envelop has:               $freedomEnvelop
    Education Envelop                            $educationEnvelop
    Long Term Saving for Spending Envelop has:   $longTermEnvelop
    Play Envelop has:                            $playEnvelop
    Give Envelop has:                            $giveEnvelop
    _______________________________________________________________

    Thanks for using our software :)
"
?>
