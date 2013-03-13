<?php
include_once("function.inc.php");

$template = new TemplatePower("admin.html");
$template->prepare();

if(isset($_GET['actie']))
{
    $actie = $_GET['actie'];
}
else
{
    $actie = NULL;
}


switch($actie)
{
    case "toevoegen":

    break;
    case "wijzigen":
        if(isset($_POST['submit']))
        {
            // gaan de update in de db zetten
            $updateklant = $db->prepare("UPDATE klant
                SET Naam = :naam,
                    Adres = :adres,
                    Postcode = :postcode,
                    Plaats = :plaats
                WHERE Klant_ID = :klantid");

            $updateklant->bindParam(":naam", $_POST['naam']);
            $updateklant->bindParam(":adres", $_POST['adres']);
            $updateklant->bindParam(":postcode", $_POST['postcode']);
            $updateklant->bindParam(":plaats", $_POST['plaats']);
            $updateklant->bindParam(":klantid", $_POST['klantid']);

            $updateklant->execute();

            $template->newBlock("UPDATE_RES");
            $template->assign(array(

            ));
        }
        else
        {
            $template->newBlock("WIJZIG");

            // ophalen van klantinfo die geselecteerd is (GET waarde id)
            $getinfo = $db->prepare("SELECT * FROM klant WHERE Klant_ID = :klantid");
            $getinfo->bindParam(":klantid", $_GET['id']);
            $getinfo->execute();

            // maar 1 klant opgehaald, dus geen lus nodig
            $result = $getinfo->fetch(PDO::FETCH_ASSOC);

            $template->assign(array(
                "NAAM" =>$result['Naam'],
                "ADRES" =>$result['Adres'],
                "POSTCODE" => $result['Postcode'],
                "PLAATS" => $result['Plaats'],
                "KID" => $result['Klant_ID']
            ));


        }

    break;
    case "verwijderen":

    break;
    case "zoeken":

    break;
    default:

        $template->newBlock("OVERZICHT");

        $getklant = $db->prepare("SELECT * FROM klant");
        $getklant->execute();

        while($resultaat = $getklant->fetch(PDO::FETCH_ASSOC))
        {
            $template->newBlock("KLANTEN");
            $template->assign(array(
                "NAAM" =>$resultaat['Naam'],
                "ADRES" =>$resultaat['Adres'],
                "POSTCODE" => $resultaat['Postcode'],
                "PLAATS" => $resultaat['Plaats'],
                "KID" => $resultaat['Klant_ID']
            ));
        }




}

$template->printToScreen();







