<?php
//etape3
require "connexion.php";
require "User.php";
$superman = [
	"first_name" => "Clark",
	"last_name" => "Kent",
	"email" => "clark.kent@test.fr"
];
$user_php = new User($superman["first_name"], $superman["last_name"], $superman["email"]);
//etape4
$query = $db->prepare('SELECT * FROM users WHERE id = 1');
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
$user_BDD = new User($user["first_name"], $user["last_name"], $user["email"]);
//etape5
$query = $db->prepare('SELECT * FROM users');
$query->execute();
$user = $query->fetchall(PDO::FETCH_ASSOC);
$user_array = [];
$t = 0;
foreach($user as $i => $users)
{
    $user_array[$t] = new User($users["first_name"], $users["last_name"], $users["email"]);
    $t++;
}
//etape6
$query = $db->prepare("INSERT INTO users (id, first_name, last_name, email) VALUES (NULL, :first_name, :last_name, :email)");
$parameters = [
    'first_name' => $user_php->getFirstName(),
    'last_name' => $user_php->getLastName(),
    'email' => $user_php->getEmail()
];
$query->execute($parameters);
$id = $db->lastInsertId();