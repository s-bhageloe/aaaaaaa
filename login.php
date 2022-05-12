<?php
include 'database.php';
$msg = '';
if(isset($_POST['submit'])){

    $fieldnames = ['gebruikersnaam', 'wachtwoord'];
    $error = false;

    foreach($fieldnames as $fieldname){
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $error = true; 
            $msg = 'error';
        }

    }

    if(!$error){
        $obj = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4');
        $obj->login($_POST['gebruikersnaam'], $_POST['wachtwoord']);
        
    }else{
        
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
	<div class="box">
		<h2>Inloggen</h2>
		<div class="box-content">
    		<form method="post">
    			<p> Username </p>
       		<input type="text" name="gebruikersnaam" placeholder="Username" /><br>
        		<p> Password </p>
        	<input type="password" name="wachtwoord" placeholder="Password" /><br><br>
        	<button type="submit" name="submit" class="btn btn-primary">Login</button><br>
    		</form>
		</div>
	</div>
</body>
</html>