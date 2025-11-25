<?php

if(isset($_GET["route"]))
{
    $route = $_GET["route"];
    if($route === "delete")
    {
        header('Location: controllers/delete-user.php?user=' . $_GET["user"]);
        exit;
    }
}
else
{
    $route = "list";
}

require "templates/layout.phtml";

?>
