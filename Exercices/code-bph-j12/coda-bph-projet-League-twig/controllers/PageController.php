<?php
class PageController extends AbstractController
{
    public function home() : void
    {
        $ctrl = new GameManager;
        $ctrl2 = new PlayerManager;
        $ctrl3 = new TeamManager;
        $data = [
            "team"       => $ctrl3->findOne(1),
            "players"    => $ctrl2->findAllFromTeam(1),
            "highlightedPlayers" => [
                $ctrl2->findOne(3),
                $ctrl2->findOne(14),
                $ctrl2->findOne(12),
            ],
            "lastGame"   => [
                "game"   => $game = $ctrl->findLastDate(),
                "team_1" => $team_1 = $ctrl3->findOne($game->getTeam_1()),
                "team_2" => $team_2 = $ctrl3->findOne($game->getTeam_2()),
                "winner" => $winner = $ctrl3->findOne($game->getWinner())
            ],
        ];
        $this->render("home.html.twig", ["data"=>$data]);
    }

    public function match(int $id) : void
    {
        $i = 0;
        $ctrl = new GameManager;
        $ctrl2 = new TeamManager;
        $ctrl3 = new PlayerPerformanceManager;
        $ctrl4 = new PlayerManager;
        $data = [
            "game"         => $game = $ctrl->findOne($id),
            "team_1"       => $team_1 = $ctrl2->findOne($game->getTeam_1()),
            "team_2"       => $team_2 = $ctrl2->findOne($game->getTeam_2()),
            "winner"       => $winner = $ctrl2->findOne($game->getWinner()),
            "performances" => [
                "perfs"    => $performances = $ctrl3->findAllFromGame($id),
                "players"  => [],
            ],
        ];
        while($i<count($data["performances"]["perfs"]))
            {
                $data["performances"]["players"][$i] = $ctrl4->findOne($data["performances"]["perfs"][$i]->getPlayer());
                $i++;
            }
        $this->render("match.html.twig", ["data"=>$data]);
    }

    public function matchs() : void
    {
        $ctrl  = new GameManager;
        $ctrl2 = new TeamManager;
        $games = $ctrl->findAll();
        $data = [];
        foreach ($games as $game) {
            $data[] = [
                "game"   => $game,
                "team_1" => $ctrl2->findOne($game->getTeam_1()),
                "team_2" => $ctrl2->findOne($game->getTeam_2()),
                "winner" => $ctrl2->findOne($game->getWinner())
            ];
        }
        $this->render("matchs.html.twig", ["data"=>$data]);
    }

    public function player(int $id) : void
    {
        $i = 0;
        $ctrl = new GameManager;
        $ctrl2 = new TeamManager;
        $ctrl3 = new PlayerPerformanceManager;
        $ctrl4 = new PlayerManager;
        $data = [
            "player"       => $ctrl4->findOne($id),
            "players"      => [],
            "performances" => [
                "perfs"    => [$ctrl3->findOneByPlayer($id)],
                "game"     => [],
                "team_1"   => [],
                "team_2"   => [],
                "winner"   => [],
                "players"  => [],
            ],
        ];
        $data["players"] = $ctrl4->findAllFromTeam($data["player"]->getIdTeam());
        while($i<count($data["performances"]["perfs"]))
            {
                $data["performances"]["game"][$i]    = $game   = $ctrl->findOne($data["performances"]["perfs"][$i]->getGame());
                $data["performances"]["team_1"][$i]  = $team_1 = $ctrl2->findOne($game->getTeam_1());
                $data["performances"]["team_2"][$i]  = $team_2 = $ctrl2->findOne($game->getTeam_2());
                $data["performances"]["winner"][$i]  = $winner = $ctrl2->findOne($game->getWinner());
                $i++;
            }
        $this->render("player.html.twig", ["data"=>$data]);
    }

    public function players() : void
    {
        $ctrl = new PlayerManager;
        $data[] = $ctrl->findAllAlphabetical();
        $this->render("players.html.twig", ["data"=>$data]);
    }

    public function team(int $id) : void
    {
        $ctrl = new GameManager;
        $ctrl2 = new PlayerManager;
        $ctrl3 = new TeamManager;
        $data = [
            "team"       => $ctrl3->findOne($id),
            "players"    => $ctrl2->findAllFromTeam($id),
        ];
        $this->render("team.html.twig", ["data"=>$data]);
    }

    public function teams() : void
    {
        $ctrl = new TeamManager;
        $data = $ctrl->findAll();
        $this->render("teams.html.twig", ["data"=>$data]);
    }

    public function notFound() : void
    {
        $this->render("404.html.twig", ["data"=>$data]);
    }
}