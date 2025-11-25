<?php
require "connexion.php";
$query = $db->prepare("INSERT INTO users (id, username, email, job) VALUES (NULL, :name, :email, :job)");

$parameters = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'job' => $_POST['job']
];
$query->execute($parameters);
$id = $db->lastInsertId();
header('Location: ../index.php');
?>