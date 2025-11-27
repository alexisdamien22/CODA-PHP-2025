<?php
require "User.php";
$admin = new User(1, "admin", "admin");
$user = new User(2, "user", "user");
$time = [$admin, $user];
$i = 0;
while($i < count($time))
{
    $id = $time[$i]->getId();
    $username = $time[$i]->getUsername();
    $password = $time[$i]->getPassword();
    echo "Bonjour je suis $username, Mon mot de passe est $password et mon id est $id.<br>";
    $i++;
}
