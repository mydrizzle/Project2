<?php

include_once("function.inc.php");

$tpl = new TemplatePower( "html/student.html" );
$tpl->prepare();

try
{
    $query = $db->prepare("SELECT * FROM klant WHERE plaats = :plaats");
    $query->bindValue(":plaats","Rotterdam");
    $query->execute();

    while($resultaat = $query->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($resultaat);
        $tpl->newBlock("STUDENTEN");
        $tpl->assign(array(
            "NAAM" => $resultaat['Naam'],
            "ADRES" => $resultaat['Adres'],
            "PLAATS" => $resultaat['Plaats']
        ));
    }


}
catch(PDOException $e)
{
    echo '<pre>';
    echo 'Regelnummer: '.$e->getLine().'<br>';
    echo 'Bestand: '.$e->getFile().'<br>';
    echo 'Foutmelding: '.$e->getMessage().'<br>';
    echo '</pre>';
}


$var = 10;



$tpl->assign("LULLO", " Wanneer komen er nou chicks");
$tpl->assign("BLABLA", "Volgend jaar minimaal 50% Chicks");

if($var == 10)
{


}







$tpl->printToScreen();

/*



$count = 0;

while( $count < 10 )
{
    $tpl->newBlock( "name_row" );
    $tpl->assign( "name", "Ron" );

    $count++;
}

//$tpl->gotoBlock( "_ROOT" );
$tpl->assign( "total_names", $count );

$tpl->printToScreen();
*/
?>