<?php
$host = "localhost";
$port = "3306";
$dbname = "sqlintro";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

$user = "root";
$password = "";

$db = new PDO(
    $connexionString,
    $user,
    $password
);

$query = $db->prepare("UPDATE users SET job =:job WHERE username = 'Spiderman'");
$parameters = [
    'job' => '1'
];
$query->execute($parameters);
$id = $db->lastInsertId();
?>