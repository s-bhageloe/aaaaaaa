<?php
include_once 'database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4'); //hier zet je de waardes($..) constructor

$reserveringenedit = $db->selectSpecificReservering($_GET['id']);

if(isset($_POST["submit"])){

        $datum = $_POST['datum'];
        $tijd = $_POST['tijd'];
        $tafel = $_POST['tafel'];
        $naam = $_POST['naam'];
        $telefoon = $_POST['telefoon'];
        $aantal = $_POST['aantal'];
        
        $db->updateReservering($reserveringenedit['reserveringenID'],  $_POST['datum'],  $_POST['tijd'], $_POST['tafel'], $_POST['naam'], $_POST['telefoon'], $_POST['aantal']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit klant</title>
</head>
<body>
    <h2>Klantgegevens wijzigen</h2>
        <form action="" method="post">
            <h4>Datum</h4>
            <input type="date" name="datum" value="<?php echo $reserveringenedit['datum'];?>">
            <br>
            <h4>Tijd</h4>
            <input type="time" name="tijd" value="<?php echo $reserveringenedit['tijd'];?>">
            <br>
            <h4>Tafel</h4>
            <input type="text" name="tafel" value="<?php echo $reserveringenedit['tafel'];?>">
            <br>
            <h4>Klantnaam</h4>
            <input type="text" name="naam" value="<?php echo $reserveringenedit['naam'];?>"> 
            <br>
            <h4>Telefoonnummer</h4>
            <input type="text" name="telefoon" value="<?php echo $reserveringenedit['telefoon'];?>"> 
            <br>
            <h4>Aantal</h4>
            <input type="text" name="aantal" value="<?php echo $reserveringenedit['aantal'];?>">
            <br>
            <br>
            <button type="submit" name="submit">Bewaren</button>
            <button type="submit" name="submit" href='reserveren.php'>Annuleren</button>
        </form>
</body>
</html>