<?php
require "connexion.php";
$query = $db->prepare("UPDATE users SET username = :username, email = :email, job = :job WHERE id = :id");

$parameters = [
    'id' => $_GET['user_id'],
    'username' => $_POST['name'],
    'email' => $_POST['email'],
    'job' => $_POST['job']
];

$query->execute($parameters);
header('Location: ../index.php');
exit;
?>