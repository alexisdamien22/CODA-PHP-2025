<?php
require "Character.php";
$character = new Character("Ragnar");
$character->getWeapon()->setName("Sword");
$character->getWeapon()->setDamages(10);
echo "Je suis {$character->getName()}, J'utilise {$character->getWeapon()->getName()} comme arme qui fait {$character->getWeapon()->getDamages()} dégâts. <br>";
echo "{$character->fight()}";