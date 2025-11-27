<?php
require "Warrior.php";
require "Mage.php";
$character = new Character();
$character->setLife(100);
$character->setName("Jean");
$warrior = new Warrior(150,"John",100);
$mage = new Mage(80,"Jacques",100);
echo"Bonjour je m'appelle {$character->getName()}.<br>{$warrior->presentSelf()}<br>{$mage->presentSelf()}<br>";
?>