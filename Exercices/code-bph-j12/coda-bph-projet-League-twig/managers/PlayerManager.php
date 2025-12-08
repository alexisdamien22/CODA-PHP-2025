<?php
class PlayerManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT players.*,media.url,media.alt,teams.name FROM players INNER JOIN media ON players.portrait = media.id JOIN teams ON players.team = teams.id');
        $query->execute();
        $players = $query->fetchAll(PDO::FETCH_ASSOC);
        $players_return = [];
        foreach ($players as $i => $player)
        {
            $player_temp = new Player();
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setIdPortrait($player["portrait"]);
            $player_temp->setPortrait($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $player_temp->setIdTeam($player["team"]);
            $player_temp->setTeam($player["name"]);
            $players_return[] = $player_temp;
        }
        return $players_return;
    }

    public function findAllAlphabetical() : array
    {
        $query = $this->db->prepare('SELECT players.*,media.url,media.alt,teams.name FROM players INNER JOIN media ON players.portrait = media.id JOIN teams ON players.team = teams.id ORDER BY nickname ASC');
        $query->execute();
        $players = $query->fetchAll(PDO::FETCH_ASSOC);
        $players_return = [];
        foreach ($players as $i => $player)
        {
            $player_temp = new Player();
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setIdPortrait($player["portrait"]);
            $player_temp->setPortrait($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $player_temp->setIdTeam($player["team"]);
            $player_temp->setTeam($player["name"]);
            $players_return[] = $player_temp;
        }
        return $players_return;
    }

    public function findOne(int $id) : ?Player
    {
        $query = $this->db->prepare('SELECT players.*,media.url,media.alt,teams.name FROM players INNER JOIN media ON players.portrait = media.id JOIN teams ON players.team = teams.id WHERE players.id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $player = $query->fetch(PDO::FETCH_ASSOC);
        $player_temp = new Player();
        if($player === null)
        {
            return null;
        }
        else
        {
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setIdPortrait($player["portrait"]);
            $player_temp->setPortrait($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $player_temp->setIdTeam($player["team"]);
            $player_temp->setTeam($player["name"]);
            return $player_temp;
        }
    }

    public function findAllFromTeam(int $id) : array
    {
        $query = $this->db->prepare('SELECT players.*,media.url,media.alt,teams.name FROM players JOIN media ON players.portrait = media.id JOIN teams ON players.team = teams.id WHERE teams.id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $players = $query->fetchAll(PDO::FETCH_ASSOC);
        $players_return = [];
        foreach ($players as $i => $player)
        {
            $player_temp = new Player();
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setIdPortrait($player["portrait"]);
            $player_temp->setPortrait($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $player_temp->setIdTeam($player["team"]);
            $player_temp->setTeam($player["name"]);
            $players_return[] = $player_temp;
        }
        return $players_return;
    }
}