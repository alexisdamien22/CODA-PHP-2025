<?php
require "Character.php";
$character = new Character(1);
$id = $character->getId();
$firstName = $character->getFirstName();
$lastName = $character->getLastName();
echo "Bonjour je suis $firstName $lastName et mon id est $id.<br>";
$character->setFirstName("Sarah");
$character->setLastName("Connor");
$firstName = $character->getFirstName();
$lastName = $character->getLastName();
echo "Bonjour je suis $firstName $lastName et mon id est $id.<br>";
