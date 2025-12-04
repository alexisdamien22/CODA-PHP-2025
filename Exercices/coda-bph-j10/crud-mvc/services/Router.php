<?php
class Router
{
    public function handleRequest(array $get) : void
    {
        $ctrl = new UserController;

        if(isset($get['route']))
        {
            if($get['route'] === "create_user")
            {
                $ctrl->create();
            }
            elseif($get['route'] === "check_create_user")
            {
                $ctrl->checkCreate();
            }
            elseif($get['route'] === "update_user")
            {
                $id = (int) $get['user'];
                $ctrl->update($id);
            }
            elseif($get['route'] === "check_update_user")
            {
                $id = (int) $get['user_id'];
                $ctrl->checkUpdate($id);
            }
            elseif($get['route'] === "delete_user")
            {
                $id = (int) $get['user'];
                $ctrl->delete($id);
            }
            elseif($get['route'] === "show_user")
            {
                $id = (int) $get['user'];
                $ctrl->show($id);
            }
            else
            {
                $ctrl->list();
            }
        }
        else
        {
            $ctrl = new UserController;
            $ctrl->list();
        }
    }
}