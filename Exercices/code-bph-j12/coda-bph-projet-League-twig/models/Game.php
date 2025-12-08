<?php
class Game
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $date = null;
    private ?int $team_1 = null;
    private ?int $team_2 = null;
    private ?int $winner = null;

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

    public function getDate() : ?string
    {
        return $this->date;
    }

    public function setDate(?string $date) : void
    {
        $this->date = $date;
    }

    public function getTeam_1() : ?int
    {
        return $this->team_1;
    }

    public function setTeam_1(?int $team_1) : void
    {
        $this->team_1 = $team_1;
    }
    public function getTeam_2() : ?int
    {
        return $this->team_2;
    }

    public function setTeam_2(?int $team_2) : void
    {
        $this->team_2 = $team_2;
    }

    public function getWinner() : ?int
    {
        return $this->winner;
    }

    public function setWinner(?int $winner) : void
    {
        $this->winner = $winner;
    }
}