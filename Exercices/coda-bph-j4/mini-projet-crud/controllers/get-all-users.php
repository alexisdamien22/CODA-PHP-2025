<?php
require "controllers/connexion.php";
$query = $db->prepare('SELECT * FROM users');
$query->execute();
$users = $query->fetchall(PDO::FETCH_ASSOC);

?>