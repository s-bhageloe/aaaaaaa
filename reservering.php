<?php
include_once 'database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4'); //hier zet je de waardes($..) constructor

if(isset($_POST["submit"])){
    print_r($_POST);
    {
        $db->createReservering($_POST['naam'], $_POST['telefoon'], $_POST['email'], $_POST['datum'], $_POST['tijd'], $_POST['aantal'], $_POST['tafel'], $_POST['allergenen'], $_POST['opmerkingen']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reservering</title>
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
    <h2>Maak hier een reservatie aan</h2>
  </div>
<br>
<form method="POST">
  <h4>Datum</h4>
  <div class="mb-3" style="width: 15%;">
    <input type="date" name="datum" class="form-control-sm" placeholder="Datum" required>
</div>

<h4>Tijd</h4>
<div class="mb-3" style="width: 15%;">
    <input type="time" name="tijd" class="form-control-sm" placeholder="Tijd" required>
</div>

<h4>Naam</h4>
<div class="mb-3" style="width: 15%;">
    <input type="text" name="naam" class="form-control-sm" placeholder="Naam" required>
</div>

<h4>Telefoonnummer</h4>
<div class="mb-3" style="width: 15%;">
    <input type="text" name="telefoon" class="form-control-sm" placeholder="Telefoonnummer" required>
</div>

<h4>Email</h4>
<div class="mb-3" style="width: 15%;">
    <input type="text" name="email" class="form-control-sm" placeholder="Email" required>
</div>

<h4>Aantal</h4>
<div class="mb-3" style="width: 15%;">
    <input type="text" name="aantal" class="form-control-sm" placeholder="Aantal" required>
</div>

<h4>Tafelnummer</h4>
<div class="mb-3" style="width: 15%;">


      <select class="mb-3" name="tafel" id="tafel">
      <option selected>Kies een Tafel</option>
        <option value="tafel1">Tafel 1</option>
        <option value="tafel2">Tafel 2</option>
        <option value="tafel3">Tafel 3</option>
        <option value="tafel4">Tafel 4</option>
        <option value="tafel5">Tafel 5</option>
        <option value="tafel6">Tafel 6</option>
        <option value="tafel7">Tafel 7</option>
        <option value="tafel8">Tafel 8</option>
        <option value="tafel9">Tafel 9</option>
        <option value="tafel10">Tafel 10</option>
      </select>
</div>

<h4>Allergenen</h4>
<div class="mb-3" style="width: 15%;">
    <input type="text" name="allergenen" class="form-control-sm" placeholder="Allergenen" required>
</div>

<h4>Opmerkingen (Optioneel)</h4>
<div class="mb-3" style="width: 15%;">
    <input type="text" name="opmerkingen" class="form-control-sm" placeholder="Opmerkingen">
</div>

<button type="submit" name="submit" class="btn btn-primary">Reserveren</button>
</form>
</body>