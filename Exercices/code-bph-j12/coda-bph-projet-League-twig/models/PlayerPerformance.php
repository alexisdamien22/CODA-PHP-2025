<?php
class PlayerPerformance
{
    private ?int $id = null;
    private ?int $player = null;
    private ?int $game = null;
    private ?int $points = null;
    private ?int $assists = null;

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

    public function getPlayer() : ?int
    {
        return $this->player;
    }

    public function setPlayer(?int $player) : void
    {
        $this->player = $player;
    }

    public function getGame() : ?int
    {
        return $this->game;
    }

    public function setGame(?int $game) : void
    {
        $this->game = $game;
    }

    public function getPoints() : ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points) : void
    {
        $this->points = $points;
    }

    public function getAssists() : ?int
    {
        return $this->assists;
    }

    public function setAssists(?int $assists) : void
    {
        $this->assists = $assists;
    }
}