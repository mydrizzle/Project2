<?php

$db = new PDO('mysql:host=localhost;
                dbname=phpweek','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if(isset($_GET['pagina']))
{
    // pagina met formulier
    print "hier komt een formulier";
    ?>
    <form action="les9.php" method="post">
        Voornaam: <input name="voornaam" type="text"><br />
        Achternaam: <input name="achternaam" type="text"><br />
        Adres: <input name="adres" type="text"><br />
        Telefoonnr: <input name="telefoonnr" type="text"><br />
        Cupmaat: <select name="cupmaat">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="DD">DD</option>
        </select>
        <br />
        <input name="submit" type="submit" value="Print het telefoonnr">
    </form>
        <!-- commentaar zetten -->

    <?php
}
elseif(isset($_POST['submit']))
{
    // inserten in de database
    // en laten zien wat er dan in de db staat

    $insert = $db->prepare("INSERT INTO meiden SET
            voornaam = :vnaam,
            achternaam = :pietjepuk,
            adres = :adres,
            telefoonnr = :telefoonnr,
            cupmaat = :cupmaat");
    $insert->bindParam(":vnaam", $_POST['voornaam']);
    $insert->bindParam(":pietjepuk", $_POST['achternaam']);
    $insert->bindParam(":adres", $_POST['adres']);
    $insert->bindParam(":telefoonnr", $_POST['telefoonnr']);
    $insert->bindParam(":cupmaat", $_POST['cupmaat']);

    $insert->execute();

    print "Voornaam = ".$_POST['voornaam']."<br />
            Achternaam = ".$_POST['achternaam']."<br />
            Adres = ".$_POST['adres']."<br />
            Telefoonnr = ".$_POST['telefoonnr']."<br />
            Cupmaat = ".$_POST['cupmaat']."<br />
    ";
}
else
{
   // heeft geen voorwaarde, dus dit is de 1e pagina
    // dit word dus de pagina met linkjes
    ?>
        <a href="les9.php?pagina=formulier">Naar formulier</a>

    <?php

    $get_chicks = $db->prepare("SELECT * FROM meiden");
    $get_chicks->execute();

    while($row = $get_chicks->fetch(PDO::FETCH_ASSOC))
    {
        print $row['voornaam']." ".$row['achternaam']."<br />";
        /*print "<pre>";
        print_r($row);
        print "</pre>";
        */
    }




}
?>