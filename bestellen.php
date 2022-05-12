<?php
include_once 'database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4'); //hier zet je de waardes($..) constructor

if(isset($_POST["submit"])){
    print_r($_POST);
    {
        $db->createBestelling($_POST['geserveerd'], $_POST['reservering'], $_POST['menuitem'], $_POST['aantal']);
    }
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
      <a class="nav-link" href="bestelling.php">Bestellen</a>
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
            <h4>Aantal</h4>
            <div class="mb-3" style="width: 15%;">
                <input type="text" name="aantal" class="form-control-sm" placeholder="Aantal" required>
            </div>

            <h4>Geserveerd</h4>
            <div class="mb-3" style="width: 15%;">
                <input type="text" name="geserveerd" class="form-control-sm" placeholder="Geserveerd" required>
            </div>

            <h4>Tafel</h4>
            <div class="mb-3" style="width: 15%;">
                <input type="text" name="reservering" class="form-control-sm" placeholder="Tafel" required>
            </div>

            <h4>Menuitem</h4>
            <div class="mb-3" style="width: 15%;">
                <input type="text" name="menuitem" class="form-control-sm" placeholder="Menuitem" required>
            </div>


<button type="submit" name="submit" class="btn btn-primary">Bestellen</button>
</form>
</body>