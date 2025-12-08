<?php
class PlayerPerformanceManager extends AbstractManager
{
    public function construct()
    {
        parent::construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM player_performance');
        $query->execute();
        $playerPerformances = $query->fetchAll(PDO::FETCH_ASSOC);
        $playerPerformances_return = [];
        foreach ($playerPerformances as $i => $playerPerformance)
        {
            $playerPerformance_temp = new Playerperformance;
            $playerPerformance_temp->setId($playerPerformance["id"]);
            $playerPerformance_temp->setPlayer($playerPerformance["player"]);
            $playerPerformance_temp->setGame($playerPerformance["game"]);
            $playerPerformance_temp->setPoints($playerPerformance["points"]);
            $playerPerformance_temp->setAssists($playerPerformance["assists"]);
            $playerPerformances_return[] = $playerPerformance_temp;
        }
        return $playerPerformances_return;
    }

    public function findOneByPlayer(int $id) : ?PlayerPerformance
    {
        $query = $this->db->prepare('SELECT * FROM player_performance WHERE player = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $playerPerformance = $query->fetch(PDO::FETCH_ASSOC);
        $playerPerformance_temp = new PlayerPerformance;
        if($playerPerformance === null)
        {
            return null;
        }
        else
        {
            $playerPerformance_temp->setId($playerPerformance["id"]);
            $playerPerformance_temp->setPlayer($playerPerformance["player"]);
            $playerPerformance_temp->setGame($playerPerformance["game"]);
            $playerPerformance_temp->setPoints($playerPerformance["points"]);
            $playerPerformance_temp->setAssists($playerPerformance["assists"]);
            return $playerPerformance_temp;
        }
    }

    public function findAllFromGame(int $id) : array
    {
        $query = $this->db->prepare('SELECT * FROM player_performance WHERE game = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $playerPerformances = $query->fetchAll(PDO::FETCH_ASSOC);
        $playerPerformances_return = [];
        foreach ($playerPerformances as $i => $playerPerformance)
        {
            $playerPerformance_temp = new Playerperformance;
            $playerPerformance_temp->setId($playerPerformance["id"]);
            $playerPerformance_temp->setPlayer($playerPerformance["player"]);
            $playerPerformance_temp->setGame($playerPerformance["game"]);
            $playerPerformance_temp->setPoints($playerPerformance["points"]);
            $playerPerformance_temp->setAssists($playerPerformance["assists"]);
            $playerPerformances_return[] = $playerPerformance_temp;
        }
        return $playerPerformances_return;
    }
}