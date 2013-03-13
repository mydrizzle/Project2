<?php
// numerieke array
// is een array die ingedeeld is met nummers
/*
$lullo[0] = "Mercedes";
$lullo[1] = "Ferrari";
$lullo[2] = "Trabantje";
print "<table border='1'>";
foreach($lullo as $bla)
{
    echo "<tr><td>".$bla.".</td></tr>";
}
print "</table>";
*/
// lullo zijn alle waardes
// 1e keer, de 1e waarde van $lullo word in $bla gezet
// binnen de lus, gebruik je $bla om hem uit te printen
// einde lus, heeft $lullo nog een waarde????
// zoja, volgende waarde word in $bla gezet

/*
$var['mooi'] ="Lekker wijf";
$var['lelijk'] = "te dik";
echo "<pre>";
print_r($lullo);

print_r($var) ;

echo "</pre>";
$aFruit = array('appel', 'peer', 'banaan', 'kiwi');
echo '<pre>'.print_r($aFruit, true).'</pre>';


*/

$koek = array(
    "chocola" => array(
        "mint" ,
        "puur",
        "melk"
    ) ,
    "noot" => array(),
    "honing" => array(
        "walnoot",
        "cashew"
    )
);
print "<table border='1'>";
foreach($koek as $array1 => $array2)
{
    print "<tr><td>categorie =".$array1."</td>";
    foreach($array2 as $soorten)
    {
        print "<td>Koekjes zijn ".$soorten."</td>";
    }
    print "</tr>";
}
print "</table>";
/*
echo "<pre>";
print_r($koek);
echo "</pre>";
*/


$_
?>