<?php
/*
Je database:

Je moet voor jezelf kunnen bijhouden wat je cijfers zijn per les

Website:
Toevoegen van lessen met het cijfer
Als je het hebt toegevoegd wel de melding laten zien
Overzicht van lessen en cijfers.
In het overzicht wil ik een gemiddelde hebben van al je cijfers.
*/

$db = new PDO('mysql:host=localhost;
                dbname=phpweek','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['actie']))
{
    $actie = $_GET['actie'];
}
else{
    $actie = NULL;
}

print "<a href='opdracht_dag2.php'>Overzicht</a> -
        <a href='opdracht_dag2.php?actie=toevoegen'>Cijfer Toevoegen</a> <br/><br/>";

switch($actie)
{
    case "toevoegen":
        if(isset($_POST['toevoegen']))
        {
            // sql insert
            if(empty($_POST['vak']) || empty($_POST['cijfer']))
            {
                print "Het vak of cijfer is niet ingevuld";
            }
            else
            {
               // controle of cijfer een float is
                if(is_numeric($_POST['cijfer']))
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
                     Gewenst is 'xx.xx'";
                }
            }
        }
        else
        {
            // formulier laten zien
            ?>
            <form action="opdracht_dag2.php?actie=toevoegen" method="post">
                Vak : <input name="vak" type="text" /> <br />
                Cijfer : <input name="cijfer" type="text" /> <br />
                <input name="toevoegen" type="submit" value="Cijfer toevoegen" />
            </form>
            <?php
        }
    break;
    case "wijzigen":
        print "we gaan wijzigen";
    break;
    default:

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
                <td><a href='opdracht_dag2.php?actie=wijzigen'>Wijzigen</a></td>
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