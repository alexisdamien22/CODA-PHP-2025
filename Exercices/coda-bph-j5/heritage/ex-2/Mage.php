<?php
class Mage extends Character
{
    public function __construct(int $life, string $name, private int $mana)
    {
        $this->life = $life;
    	$this->name = $name;
    }

    public function getMana() : int
    {
        return $this->mana;
    }

    public function setMana(int $mana) : void
    {
        $this->mana = $mana;
    }

    public function presentSelf() : string
    {
        return "{$this->introduce()}, j'ai {$this->getLife()} PV et {$this->getMana()} points mana.";
    }
}
?>