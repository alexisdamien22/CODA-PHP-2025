<?php
require "User.php";
$admin = new User(1, "admin", "admin");
$user = new User(2, "user", "user");
$time = [$admin, $user];
$i = 0;
while($i < count($time))
{
    echo "Bonjour je suis {$time[$i]->getUsername()}, Mon mot de passe est {$time[$i]->getPassword()} et mon id est {$time[$i]->getId()}.<br>";
    $i++;
}
