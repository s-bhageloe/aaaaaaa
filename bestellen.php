<?php
include_once 'database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4'); //hier zet je de waardes($..) constructor

if(isset($_POST["submit"])){
  $db->createBestelling($_POST['menuitemsID_ph'], $_POST['aantal'], $_POST['geserveerd'], $_POST['reserveringenID_ph']);

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bestellen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <a class="navbar-brand" href="index.php">
  <img src="foto.jpg" alt="logo" style="width:40px;">
  </a>
  

  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="reservering.php">Reserveren</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bestellen.php">Bestellen</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Inloggen naar overzichten</a>
    </li>
  </ul>
</nav>

  <div id="horizontal">
    <div class="bar">
  </div>

  <div class="body">
    <h2>Maak hier een bestelling aan</h2>
  </div>
    <br>
    <form method="POST">
    <form class="bestelling" action="" method="post">
        <td> <input type="text" placeholder="menuitemsID" name="menuitemsID_ph"> </td>
        <br>
        <td> <input type="text" placeholder="aantal" name="aantal"> </td> 
        <br>
        <td> <input type="text" placeholder="geserveerd" name="geserveerd"> </td>
        <br>
        <td> <input type="text" placeholder="reseveringenID" name="reserveringenID_ph"> </td>
        <br><br>
          <button type="submit" class="btn btn-primary" name="submit">Bestellen</button>
    </form>


</body>