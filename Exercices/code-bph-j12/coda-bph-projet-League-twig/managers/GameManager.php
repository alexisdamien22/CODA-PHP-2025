<?php
class GameManager extends AbstractManager
{
    public function construct()
    {
        parent::construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare("SELECT games.* FROM games ORDER BY date DESC");
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_ASSOC);
        $games_return = [];
        foreach ($games as $i => $game)
        {
            $game_temp = new Game;
            $game_temp->setId($game["id"]);
            $game_temp->setName($game["name"]);
            $date = new DateTime($game["date"]);
            $game_temp->setDate($date->format('Y-m-d'));
            $game_temp->setTeam_1($game["team_1"]);
            $game_temp->setTeam_2($game["team_2"]);
            $game_temp->setWinner($game["winner"]);
            $games_return[] = $game_temp;
        }
        return $games_return;
    }

    public function findOne(int $id) : ?Game
    {
        $query = $this->db->prepare('SELECT * FROM games WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $game = $query->fetch(PDO::FETCH_ASSOC);
        $game_temp = new Game;
        if($game === null)
        {
            return null;
        }
        else
        {
            $game_temp->setId($game["id"]);
            $game_temp->setName($game["name"]);
            $date = new DateTime($game["date"]);
            $game_temp->setDate($date->format('Y-m-d'));
            $game_temp->setTeam_1($game["team_1"]);
            $game_temp->setTeam_2($game["team_2"]);
            $game_temp->setWinner($game["winner"]);
            return $game_temp;
        }
    }

    public function findLastDate() : ?Game
    {
        $query = $this->db->prepare('SELECT * FROM games ORDER BY date desc LIMIT 1');
        $query->execute();
        $game = $query->fetch(PDO::FETCH_ASSOC);
        $game_temp = new Game;
        if($game === null)
        {
            return null;
        }
        else
        {
            $game_temp->setId($game["id"]);
            $game_temp->setName($game["name"]);
            $date = new DateTime($game["date"]);
            $game_temp->setDate($date->format('Y-m-d'));
            $game_temp->setTeam_1($game["team_1"]);
            $game_temp->setTeam_2($game["team_2"]);
            $game_temp->setWinner($game["winner"]);
            return $game_temp;
        }
    }
}