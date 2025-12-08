<?php
class Router
{
    public function handleRequest(array $get) : void
    {
        $ctrl = new PageController;

        if(isset($get['route']))
        {
            if($get['route'] === "home")
            {
                $ctrl->home();
            }
            elseif($get['route'] === "match")
            {
                $ctrl->match($get["id"]);
            }
            elseif($get['route'] === "matchs")
            {
                $ctrl->matchs();
            }
            elseif($get['route'] === "player")
            {
                $ctrl->player($get["id"]);
            }
            elseif($get['route'] === "players")
            {
                $ctrl->players();
            }
            elseif($get['route'] === "team")
            {
                $ctrl->team($get["id"]);
            }
            elseif($get['route'] === "teams")
            {
                $ctrl->teams();
            }
            else
            {
                $ctrl->notFound();
            }
        }
        else
        {
            $ctrl->home();
        }
    }
}