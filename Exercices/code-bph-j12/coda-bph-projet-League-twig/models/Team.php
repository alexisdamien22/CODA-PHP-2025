<?php
class Team
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?int $idLogo = null;
    private ?string $logo = null;
    private ?string $alt = null;
    
    public function __construct()
    {

    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(?string $name) : void
    {
        $this->name = $name;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }

    public function getIdLogo() : ?int
    {
        return $this->idLogo;
    }

    public function setIdLogo(?int $idLogo) : void
    {
        $this->idLogo = $idLogo;
    }

    public function getLogo() : ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo) : void
    {
        $this->logo = $logo;
    }

    public function getAlt() : ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt) : void
    {
        $this->alt = $alt;
    }
}