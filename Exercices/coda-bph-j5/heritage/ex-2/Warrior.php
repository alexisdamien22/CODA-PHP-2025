<?php
require "Character.php";
class Warrior extends Character
{
    public function __construct(int $life, string $name, private int $energy)
    {
        $this->life = $life;
    	$this->name = $name;
    }

    public function getEnergy() : int
    {
        return $this->energy;
    }

    public function setEnergy(int $energy) : void
    {
        $this->energy = $energy;
    }

    public function presentSelf() : string
    {
        return "{$this->introduce()}, j'ai {$this->getLife()} PV et {$this->getEnergy()} points énergie.";
    }
}
?>