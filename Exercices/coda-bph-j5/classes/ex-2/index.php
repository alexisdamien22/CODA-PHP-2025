<?php
require "Character.php";
$character = new Character(1);
echo "Bonjour je suis {$character->getFullName()} et mon id est {$character->getId()}.<br>";
$character->setFirstName("Sarah");
$character->setLastName("Connor");
echo "Bonjour je suis {$character->getFullName()} et mon id est {$character->getId()}.<br>";
