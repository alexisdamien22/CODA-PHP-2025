<?php
class TeamManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT teams.*,media.url,media.alt FROM teams INNER JOIN media ON teams.logo = media.id');
        $query->execute();
        $teams = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams_return = [];
        foreach ($teams as $i => $team)
        {
            $team_temp = new Team();
            $team_temp->setId($team["id"]);
            $team_temp->setName($team["name"]);
            $team_temp->setDescription($team["description"]);
            $team_temp->setIdLogo($team["logo"]);
            $team_temp->setLogo($team["url"]);
            $team_temp->setAlt($team["alt"]);
            $teams_return[] = $team_temp;
        }
        return $teams_return;
    }

    public function findOne(int $id) : ?Team
    {
        $query = $this->db->prepare('SELECT teams.*,media.url,media.alt FROM teams INNER JOIN media ON teams.logo = media.id WHERE teams.id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $team = $query->fetch(PDO::FETCH_ASSOC);
        $team_temp = new Team();
        if($team === null)
        {
            return null;
        }
        else
        {
            $team_temp->setId($team["id"]);
            $team_temp->setName($team["name"]);
            $team_temp->setDescription($team["description"]);
            $team_temp->setIdLogo($team["logo"]);
            $team_temp->setLogo($team["url"]);
            $team_temp->setAlt($team["alt"]);
            return $team_temp;
        }
    }
}