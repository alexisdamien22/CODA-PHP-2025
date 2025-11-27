<?php
require "Weapon.php";
class Character {
    private Weapon $weapon;

    public function __construct(private string $name)
    {
        $this->weapon = new Weapon(0, "");
    }

    public function getWeapon() : Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(weapon $weapon) : void
    {
        $this->weapon = $weapon;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

        public function fight() : string
    {
        return $this->getWeapon()->strike();
    }
}
?>