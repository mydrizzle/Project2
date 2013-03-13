<?php

error_reporting(0);
/*

hoeveel combinaties van munten zijn er mogelijk als je 5 euro hebt.

munten zijn:
1 cent $h
2 cent $g
5 cent $f
10 cent $e
20 cent $d
50 cent $c
1 euro $b
2 euro $a
*/

/*
$bedrag  = 200;
$combinaties = 0;

for ($a = $bedrag; $a >= 0; $a -= 200) {
    for ($b = $a; $b >= 0; $b -= 100) {
        for ($c = $b; $c >= 0; $c -= 50) {
            for ($d = $c; $d >= 0; $d -= 20) {
                for ($e = $d; $e >= 0; $e -= 10) {
                    for ($f = $e; $f >= 0; $f -= 5) {
                        for ($g = $f; $g >= 0; $g -= 2) {
                                $combinaties++;
                        }
                    }
                }
            }
        }
    }
}

print "er zijn ".$combinaties." om 5 euro met munten te geven <br />";


*/
$bedrag = 500;
$munten = array(1,2,5,10,20,50,100,200);
$combinaties = array();
$combinaties[0] = 1;

for( $i = 0; $i < 7; $i++)
{
    for($j = $munten[$i]; $j <= $bedrag; $j++)
    {
        $combinaties[$j] += $combinaties[$j-$munten[$i]];
    }
}
print $combinaties[$bedrag]+1;





/*
function euler($coins, $sum, &$count, $printResults=false,
               $current=array(), $currentSum=0, $used=array(), $level=0)
{
    foreach($coins as $key => $value)
    {
        if($used[$key])
            continue;

        // Set coin as used
        $used[$key] = true;

        for($i=1; ($i * $value) + $currentSum <= $sum; $i++)
        {
            // Set this coin value in our current position
            $current[$level] = "$i x $key";
            $currentSum += ($i * $value);

            if($sum == $currentSum)
            {
                if($printResults)
                {
                    print_r($current);
                    echo "<hr>";
                }
                $count++;
            }

            else
            {
                // Recurse
                euler($coins, $sum, $count, $printResults, $current,
                    $currentSum, $used, $level+1);

                // Clear our position and anything past it
                if($level > 0)
                {
                    $temp = array_chunk($current, $level);
                    $current = $temp[0];
                }
                else
                {
                    $current = array();
                }
            }

            // Set current sum back
            $currentSum -= ($i * $value);
        } //while
    } //foreach
}


$coins['L2'] = 200;
$coins['L1'] = 100;
$coins['50p'] = 50;
$coins['20p'] = 20;
$coins['10p'] = 10;
$coins['5p'] = 5;
$coins['2p'] = 2;
$coins['1p'] = 1;

$count = 0;
euler($coins, 500, $count);
echo "count: $count <br />";
*/