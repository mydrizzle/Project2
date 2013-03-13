<?php

$geb_maand = 9;
$geb_dag = 18;
$geb_jaar = 1980;

$nu_maand = 9;
$nu_dag = 18;
$nu_jaar = 2013;

$verschil_jaar = $nu_jaar - $geb_jaar;
if($nu_maand <= $geb_maand)
{
    // ja, want 3 is kleiner dan 9
    if($nu_dag < $geb_dag)
    {
        // ben nog steeds niet jarig geweest
        $verschil_jaar--;
    }
    else
    {
        // 25 <= 18
        if($nu_maand == $geb_maand)
        {
            // ben of jarig, of jarig geweest
        }
        else
        {
            $verschil_jaar--;
        }
    }





    //$verschil_jaar--;
}

$leeftijd = $verschil_jaar;

print "dhr koningstein is $leeftijd jaar oud";
