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
            if($_SESSION["role"] === "ADMIN")
            {
                $this->redirect('index.php?route=list');
            }
            else
            {
                $this->render('member/profile.html.twig', []);
            }
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
                if(isset($_POST["firstName"]) 
                && isset($_POST["lastName"])
                && isset($_POST["email"])
                && isset($_POST["password"])
                && isset($_POST["confirmPassword"]))
                {
                    $isEmailUsed = false;
                    $userMan = new UserManager;
                    $users = $userMan->findAll();
                    foreach($users as $user)
                    {
                        if($user->getEmail() === $_POST["email"])
                        {   
                            $isEmailUsed = true;
                        }
                    }
                    if($isEmailUsed === true)
                    {
                        $data=["Cet email est déjà utilisé"];
                        $this->render('admin/users/create.html.twig', ["data"=>$data]);
                    }
                    if($_POST["password"] === $_POST["confirmPassword"] && $isEmailUsed === false)
                    {
                        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
                        $newUser = new User(
                            $_POST["firstName"],
                            $_POST["lastName"],
                            $_POST["email"],
                            $hashedPassword);
                        $userMan->create($newUser);
                        $this->redirect('index.php?route=list');
                    }
                    elseif($isEmailUsed === false)
                    {
                        $data = ["Les mots de passe de correspondent pas..."];
                        $this->render('admin/users/create.html.twig', ["data"=>$data]);
                    }
                }
                else
                {
                    $this->render('admin/users/create.html.twig', []);
                }
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function update(int $id) : void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $ctrl = new UserManager;
                $user = $ctrl->findById($id);
                $data = [
                    "firstName" => $user->getFirstName(),
                    "lastName"  => $user->getLastName(),
                    "email"     => $user->getEmail(),
                    "role"      => $user->getRole(),
                    "id"        => $user->getId()
                ];
                $this->render('admin/users/update.html.twig', ["data"=>$data]);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function delete() : void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $this->redirect("index.php?route=list");
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
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
                $ctrl = new UserManager;
                $data = $ctrl->findAll();
                $this->render('admin/users/index.html.twig', ["data"=>$data]);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function show(int $id) : void
    {
        if(isset($_SESSION["firstName"])
        && isset($_SESSION["lastName"])
        && isset($_SESSION["email"])
        && isset($_SESSION["role"])
        && isset($_SESSION["id"]))
        {
            if($_SESSION["role"] === "ADMIN")
            {
                $ctrl = new UserManager;
                $user = $ctrl->findById($id);
                $data = [
                    "firstName" => $user->getFirstName(),
                    "lastName"  => $user->getLastName(),
                    "email"     => $user->getEmail(),
                    "role"      => $user->getRole(),
                    "id"        => $user->getId()
                ];
                $this->render('admin/users/show.html.twig', ["data"=>$data]);
            }
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }
}
