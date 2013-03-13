<?php
/**
 * Created by JetBrains PhpStorm.
 * User: marcel
 * Date: 30-1-13
 * Time: 12:34
 * To change this template use File | Settings | File Templates.
 */

// opdracht: Alle tafels van 1 t/m 5

// $i is eerste getal
// $j is tweede getal

for($i = 1; $i <=5; $i++)
{
    for($j = 1; $j <= 5; $j++)
    {
        print "$i * $j =".($i*$j)."<br />";

    }
}