<?php

class UserController extends AbstractController
{
    public function profile() :void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            $this->render('member/profile.html.twig', []);
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function create() :void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $this->render('admin/users/create.html.twig', []);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function update() : void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $this->render('admin/users/update.html.twig', []);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function delete() : void
    {
        $this->redirect("index.php?route=list");
    }

    public function list() : void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $this->render('admin/users/index.html.twig', []);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function show() : void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $this->render('admin/users/show.html.twig', []);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }
}
