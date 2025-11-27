<?php
class Weapon {
    public function __construct(private int $damages, private string $name)
    {

    }

    public function getDamages() : int
    {
        return $this->damages;
    }

    public function setDamages(int $damages) : void
    {
        $this->damages = $damages;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function strike() : string
    {
        return "Mais aïeuh! <br>";
    }
}
?>