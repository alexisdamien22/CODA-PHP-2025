<?php
class PageController
{
    public function home()
    {
        require "templates/home.phtml";
    }

    public function tarifs()
    {
        require "templates/nos-tarifs.phtml";
    }
}