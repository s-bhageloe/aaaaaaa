<?php
include_once 'database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4'); //hier zet je de waardes($..) constructor

$klantedit = $db->selectSpecificKlant($_GET['id']);

if(isset($_POST["submit"])){
    //fieldnames - input fields
    $fieldnames = ['naam', 'telefoon', 'email'];

    //Var boolean
    $err = false;

    //Looping
    foreach ($fieldnames as $fieldname) {
        //if fieldname is empty -> $err = true
        if (empty($_POST[$fieldname])) {
            $err = true;
        }
    }


    if ($err) {
        echo "All fields are required!";
    } else {
        $naam = $_POST['naam'];
        $telefoon = $_POST['telefoon'];
        $email = $_POST['email'];

        
        $db->updateKlant($klantedit['klantenID'],  $_POST['naam'], $_POST['telefoon'], $_POST['email']);
    }
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
            <h4>Naam</h4>
            <input type="text" name="naam" value="<?php echo $klantedit['naam'];?>">
            <br>
            <h4>Telefoonnummer</h4>
            <input type="text" name="telefoon" value="<?php echo $klantedit['telefoon'];?>">
            <br>
            <h4>Email</h4>
            <input type="text" name="email" value="<?php echo $klantedit['email'];?>">
            <br>
            <br>
            <button type="submit" name="submit">Bewaren</button>
            <button type="submit" name="submit" href='klant.php'>Annuleren</button>
        </form>
</body>
</html>