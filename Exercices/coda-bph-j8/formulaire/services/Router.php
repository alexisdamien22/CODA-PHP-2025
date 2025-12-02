<?php
class Router
{
    public function handleRequest(array $get) : void
    {
        $ctrl = new AuthController;

        if(isset($get['path']))
        {
            $ctrl->notFound();
        }
        else
        {
            $ctrl = new AuthController;
            $ctrl->login();
        }
    }
}