<?php
// $i is de dag
for($i = 1; $i <= 4; $i++)
{
    $daguren = 0;
    if($i == 1)
    {
        // maandag hebben we maar 8 uur $j
        for($j = 1; $j <= 8 ; $j++)
        {
            if($j != 5)
            {
                $daguren += 0.75;
            }
        }
    }
    else
    {
        // de andere dagen hebben we 10 uur
        for($j = 1; $j <= 10 ; $j++)
        {
            if($j != 5)
            {
                $daguren += 0.75;
            }
        }
    }



}



aantal dagen = 4

for(..... 4 dagen .....)
{
    als dag 1?? dan
        for( .... 8 lesuren ....)
            als uur 5, dan pauze


    en anders...
        for( .... 10 lesuren ....)
            als uur 5, dan pauze



}