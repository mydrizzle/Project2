<?php

$db = new PDO("mysql:host=localhost;dbname=les_1","root","");

if(isset($_POST['submit']))
{
    try{
        $sql1 = "INSERT INTO ras SET naam = :rasnaam";
        $query1 = $db->prepare($sql1);
        $query1->bindParam(":rasnaam", $_POST['rasnaam']);
        $query1->execute();

        $rasid = $db->lastInsertId();
        print "rasid =".$rasid;

        $sql2 = "INSERT INTO honden SET naam=:naam , rasid=:rasid";
        $query2 = $db->prepare($sql2);
        $query2->bindParam(":naam", $_POST['naam']);
        $query2->bindParam(":rasid", $rasid);
        $query2->execute();

        print "hond toegevoegd";

    }
    catch(PDOException $e)
    {
        echo '<pre>';
        echo 'Regelnummer: '.$e->getLine().'<br>';
        echo 'Bestand: '.$e->getFile().'<br>';
        echo 'Foutmelding: '.$e->getMessage().'<br>';
        echo '</pre>';
    }


}
else
{
    ?>
        <form action="honden.php" method="post">
            <input name="naam" type="text">
            <input name="rasnaam" type="text">
            <input name="submit" type="submit" value="verzenden">


        </form>

    <?php

}