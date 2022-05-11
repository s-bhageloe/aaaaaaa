<?php

session_start();
unset($_SESSION['gebruikersnaam']);

session_destroy();

header("Location: login.php");




?>