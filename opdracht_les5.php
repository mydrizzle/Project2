<?php

// hoeveel klokuren zit je per week op school
// tel hiervoor de lesuren op die je aanwezig moet zijn
$totaalweek = 0;
for($i = 1; $i != 5; $i++) // dag van de week bepalen
{
    $daguur = 0;
    if($i == 1)
    {
        // dag gaat maar tot 8
        for($j = 1; $j <= 8; $j++)
        {
            if($j != 5){
                $daguur += 0.75;
            }
        }
    }
    else
    {
        for($k = 1; $k <= 10; $k++)
        {
            if($k != 5){
                $daguur += 0.75;
            }
        }
    }
    $totaaldag = $daguur;
    print "Op dag $i maken we  $totaaldag aan klokuren <br />";
    $totaalweek += $totaaldag;
}
print "Totalen klokuren per week =".$totaalweek;

