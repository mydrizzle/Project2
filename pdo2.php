<?php

$plaatsnaam = "Rotterdam";

$db = new PDO("mysql:host=localhost;dbname=les_1","root","");

$var = $db->prepare("SELECT * FROM klant WHERE Plaats = :plaatsnaam ");
$var->bindParam(":plaatsnaam", $plaatsnaam);
$var->execute();

while($eikels = $var->fetch(PDO::FETCH_ASSOC))
{
    //print $eikels['Naam']." woont in ".$eikels['Plaats']."<br />";
    var_dump($eikels);
}

print "iwufhaeiugvhaerfuivhaeirufvaeirufv";