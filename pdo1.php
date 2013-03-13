<?php
$id = 1;
$id2= 2;
$id3 = 3;
$database = new PDO('mysql:host=localhost;dbname=voorbeeld1','root','');

//$ophaalgeb2 = $database->prepare("SELECT * FROM merk WHERE merkid IN (:id, :id2, :id3) ");
$ophaalgeb2 = $database->prepare("SELECT * FROM merk WHERE
    merkid = :lullo
    OR merkid = :id2
    OR merkid = :id3 ");

/*merkid = :id  => merkid = $id = 1
    OR merkid = :id2 =>merkid = $id2 = 2
    OR merkid = :id3 => merkid = $id3 = 3");
*/
$ophaalgeb2->bindParam(":lullo", $id );
$ophaalgeb2->bindParam(":id2", $id2 );
$ophaalgeb2->bindParam(":id3", $id3 );
$ophaalgeb2->execute();

//$rij = $ophaalgeb2->fetch();

while($rij = $ophaalgeb2->fetch(PDO::FETCH_ASSOC))
{
    //print "resultaat =".$rij['naam']."<br />";
    var_dump($rij);
}



?>