<?php
/**
 * Created by JetBrains PhpStorm.
 * User: marcel
 * Date: 30-1-13
 * Time: 13:56
 * To change this template use File | Settings | File Templates.
 */
print "lalalalal";
$naam = "bla4";
$adres = "test4";

try
{
    $db = new PDO('mysql:host=localhost;dbname=test','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $sql = "INSERT INTO gebruiker SET naam = :naam, adres= :adres";
    /*$sql = "SELECT naam FROM gebruiker";*/
    $results = $db->prepare($sql);
    $results->bindParam(":naam", $naam);
    $results->bindParam(":adres", $adres);


    //$results->execute();
    print "goed gedaan";
}
catch(PDOException $e)
{
    echo '<pre>';
    echo 'Regelnummer: '.$e->getLine().'<br>';
    echo 'Bestand: '.$e->getFile().'<br>';
    echo 'Foutmelding: '.$e->getMessage().'<br>';
    echo '</pre>';
}