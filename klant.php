<?php
include_once 'database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4'); //hier zet je de waardes($..) constructor

$klanten = $db->showKlant();


?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Klanten Overzicht</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">

      <li class="active"><a href="overzichten.php">Overzichten</a></li>
      <li><a href="reserveren.php">Reserveringen</a></li>
      <li><a href="bestellingoverzicht.php">Bestelling Overzicht</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Serveren <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="kok.php">Voor kok</a></li>
          <li><a href="barman.php">Voor barman</a></li>
          <li><a href="ober.php">Voor ober</a></li>
        </ul>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gegevens <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="drinken.php">Drinken</a></li>
          <li><a href="eten.php">Eten</a></li>
          <li><a href="klant.php">Klanten</a></li>
          <li><a href="gerechthoofd.php">Gerecht hoofdgroepen</a></li>
          <li><a href="gerechtsub.php">Gerecht subgroepen</a></li>
        </ul>    
      </li>
    </ul>
  </div>
</nav>

  <div id="horizontal">
    <div class="bar">
  </div>
    <main>
        <table class="table table-striped" id="overzicht">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Telefoon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Allergien</th>
                    <th scope="col">Opmerkingen</th>

                </tr>
            </thead>
            <tbody> 
                <!-- klanten are rows and klant is a single row  -->
                <?php foreach ($klanten as $klant): ?>
                    <tr>
                        <td><?php echo $klant["naam"]; ?></td>
                        <td><?php echo $klant["telefoon"];?></td>
                        <td><?php echo $klant["email"];?></td>
                        <td><?php echo $klant["allergieen"];?></td>
                        <td><?php echo $klant["opmerkingen"];?></td>
                        <td class="noExl">
                            <a class="btn btn-primary mr-2 btn-sm" href="editklant.php?id=<?php echo $klant["klantenID"]; ?>">Edit</a>
                        </td>      
                        <td class="noExl">
                            <a class="btn btn-danger mr-2 btn-sm" href="deleteklant.php?id=<?php echo $klant["klantenID"]; ?>">Delete</a>
                        </td> 
                    </tr>
                <?php endforeach; ?>     
            </tbody>
        </table>
    </main>
</body>
</html>
