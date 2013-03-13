<?php

$db = new PDO('mysql:host=localhost;
                dbname=phpweek','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

print "<a href='opdracht_dag2_if.php'>Overzicht</a> -
        <a href='opdracht_dag2_if.php?actie=toevoegen'>Cijfer Toevoegen</a> <br />";

if(isset($_GET['actie']))
{
    $actie = $_GET['actie'];
}
else{
    $actie = NULL;
}



if($actie == "toevoegen")
{
  // formulier
    ?>
    <form action="opdracht_dag2_if.php" method="post">
        Vak : <input name="vak" type="text" /> <br />
        Cijfer : <input name="cijfer" type="text" /> <br />
        <input name="toevoegen" type="submit" value="Cijfer toevoegen" />
    </form>
<?php
}
elseif(isset($_POST['toevoegen']))
{
    // opvang
    if(empty($_POST['vak']) || empty($_POST['cijfer']))
    {
        print "Het vak of cijfer is niet ingevuld";
    }
    else
    {
        // controle of cijfer een float is
        if(is_numeric($_POST['cijfer']) AND $_POST['cijfer'] <= 10)
        {
            // insert nu echt doen
            $insert = $db->prepare("INSERT INTO cijfers SET
                        vak = :vak,
                        cijfer = :cijfer ");
            $insert->bindParam(":vak", $_POST['vak']);
$insert->bindParam(":cijfer", $_POST['cijfer']);
$insert->execute();

print "Het cijfer voor het vak ".$_POST['vak']." = ".$_POST['cijfer']." is toegevoegd";
}
else
{
    print "Bij het cijfer heb je geen getal ingevuld. <br />
                     Of je hebt een getal ingevoerd groter dan 10 <br />
                     Gewenst is 'xx.xx'";
}
}
}
elseif($actie == "wijzigen")
{
    if(isset($_POST['wijzigen']))
    {
        // update
        if(is_numeric($_POST['cijfer']) AND $_POST['cijfer'] <= 10 AND $_POST['cijfer'] >= 1)
        {
           // hij mag updaten
            $update = $db->prepare("UPDATE cijfers SET
                          vak = :vak,
                          cijfer = :cijfer
                          WHERE id = :id");
            $update->bindParam(":vak", $_POST['vak']);
            $update->bindParam(":cijfer", $_POST['cijfer']);
            $update->bindParam(":id", $_POST['id']);
            $update->execute();

            print "Het vak en/of cijfer is geupdate";

        }
        else
        {
            // error !!!!!
            print "Het cijfer is geen getal, of hoger dan 10";
        }

    }
    else
    {
        // ingevuld form laten zien
        print "we gaan wijzigen";
        $verkrijg_cijfer = $db->prepare("SELECT *
                                    FROM cijfers
                                    WHERE id = :id");
        $verkrijg_cijfer->bindParam(":id", $_GET['id']);
        $verkrijg_cijfer->execute();

        $cijfers = $verkrijg_cijfer->fetch(PDO::FETCH_ASSOC);

        ?>
        <form action="opdracht_dag2_if.php?actie=wijzigen" method="post">
            Vak : <input name="vak" type="text" value="<?php print $cijfers['vak']; ?>" /> <br />
            Cijfer : <input name="cijfer" type="text" value="<?php print $cijfers['cijfer']; ?>" /> <br />
            <input name="id" type="hidden" value="<?php print $cijfers['id']; ?>" />
            <input name="wijzigen" type="submit" value="Cijfer wijzigen" />

        </form>
        <?php
    }

}
elseif($actie == "verwijderen")
{
    print "verwijderen";
}
else
{
    // overzicht
    // verkrijg lijst van vakken en cijfer
    $check_cijfers = $db->prepare("SELECT count(*) FROM cijfers");
    $check_cijfers->execute();

    if($check_cijfers->fetchColumn() > 0)
    {
        $get_cijfers = $db->prepare("SELECT * FROM cijfers");
        $get_cijfers->execute();

        print "<table border='1'>";
        $totaal = 0;
        $teller = 0;
        while($cijfers = $get_cijfers->fetch(PDO::FETCH_ASSOC))
        {
            $totaal +=$cijfers['cijfer'];
            $teller++;
            print "<tr><td>".$cijfers['vak']."</td>";
            print "<td>".$cijfers['cijfer']."</td>
                <td><a href='opdracht_dag2_if.php?actie=wijzigen&id=".$cijfers['id']."'>Wijzigen</a></td>
                <td><a href='opdracht_dag2_if.php?actie=verwijderen&id=".$cijfers['id']."'>Verwijderen</a></td>
                </tr>";
        }
        print "</table>";

        $gemiddeld = $totaal / $teller;
        print "Het gemiddelde is $gemiddeld";


    }
    else
    {
        print "Er staan geen vakken met cijfers in de database";
    }
}


/*
 * if($_POST['wijzigen'])
   {
       //opvang van formulier => update query
       if(empty($_POST['vak'])) || empty($_POST['cijfer'])
       {
           // error, je hebt niet alles ingevuld
       }
       else
       {
           // formulier is goed opgestuurd
           // dus nu echt updaten in db
        }
   }
    else
    {
        // Wijzig formulier
    }
 */