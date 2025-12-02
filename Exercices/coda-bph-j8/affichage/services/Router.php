<?php
class Router
{
    public function handleRequest(array $get) : void
    {
        $ctrl = new BlogController;

        if(isset($get['path']))
        {
            $url = explode("/", $get['path']);
            $id = $url[2];
            $path = $url[1];
            if($get['path'] === null)
            {
                $ctrl->index();
            }
            elseif($path === "articles" && $id !== null)
            {
                $ctrl->article($id);
            }
            elseif($path === "articles")
            {
                $ctrl->index();
            }
            else
            {
                $ctrl->notFound();
            }
        }
        else
        {
            $ctrl = new BlogController;
            $ctrl->index();
        }
    }
}