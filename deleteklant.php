<?php
include_once 'database.php';

$db = new DB('localhost', 'root', '', 'restaurant', 'utf8mb4');

$klantenID = $db->deleteKlant($_GET['id']);

?>