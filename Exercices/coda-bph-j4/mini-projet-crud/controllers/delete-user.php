<?php
require "connexion.php";
$query = $db->prepare("DELETE FROM users WHERE id = :id");

$parameters = [
    'id' => $_GET["user"]
];
$query->execute($parameters);
$id = $db->lastInsertId();
header('Location: ../index.php');
exit;
?>