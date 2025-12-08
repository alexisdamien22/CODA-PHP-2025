<?php
class Player
{
    private ?int $id = null;
    private ?string $nickname = null;
    private ?string $bio = null;
    private ?int $idPortrait = null;
    private ?string $portrait = null;
    private ?string $alt = null;
    private ?string $idTeam = null;
    private ?string $team = null;
    
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

    public function getNickname() : ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname) : void
    {
        $this->nickname = $nickname;
    }

    public function getBio() : ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio) : void
    {
        $this->bio = $bio;
    }

    public function getIdPortrait() : ?int
    {
        return $this->idPortrait;
    }

    public function setIdPortrait(?int $idPortrait) : void
    {
        $this->idPortrait = $idPortrait;
    }

    public function getPortrait() : ?string
    {
        return $this->portrait;
    }

    public function setPortrait(?string $portrait) : void
    {
        $this->portrait = $portrait;
    }

    public function getAlt() : ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt) : void
    {
        $this->alt = $alt;
    }

    public function getIdTeam() : ?int
    {
        return $this->idTeam;
    }

    public function setIdTeam(?int $idTeam) : void
    {
        $this->idTeam = $idTeam;
    }

    public function getTeam() : ?string
    {
        return $this->team;
    }

    public function setTeam(?string $team) : void
    {
        $this->team = $team;
    }
}