<?php

class AuthController extends AbstractController
{
    public function home() : void
    {
        $this->render('home/home.html.twig', []);
    }

    public function login() : void
    {
        $isEmailUsed = false;
        if(isset($_POST["email"])
        && isset($_POST["password"]))
        {
            $userMan = new UserManager;
            $users = $userMan->findAll();
            foreach($users as $user)
            {
                if($user->getEmail() === $_POST["email"])
                {   
                    if(password_verify($user->getPassword(), $_POST["password"]))
                    { 
                        $isEmailUsed === true;
                        $_SESSION["firstName"] = $user->getFirstName();
                        $_SESSION["lastName"] = $user->getLastName();
                        $_SESSION["email"] = $user->getEmail();
                        $_SESSION["role"] = $user->getRole();
                        $_SESSION["id"] = $user->getId();
                    }
                    else
                    {
                        $data=["Mot de passe invalide"];
                        $this->render('auth/login.html.twig', ["data"=>$data]);
                    }
                }
            }
            if($isEmailUsed === false)
            {
                $data=["Il n'existe pas d'utilisateur avec cette adresse mail"];
                $this->render('auth/login.html.twig', ["data"=>$data]);
            }
        }
        elseif(isset($_POST["email"])
        XOR isset($_POST["password"]))
        {
            $data=["Remplissez tous les champs"];
            $this->render('auth/login.html.twig', ["data"=>$data]);
        }
        else
        {
            $this->render('auth/login.html.twig', []);
        }
    }

    public function logout() : void
    {
        session_destroy();
        $this->redirect('index.php');
    }

    public function register() : void
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
                $this->render('auth/register.html.twig', ["data"=>$data]);
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
                $this->render('auth/login.html.twig', []);
            }
            elseif($isEmailUsed === false)
            {
                $data = ["Les mots de passe de correspondent pas..."];
                $this->render('auth/register.html.twig', ["data"=>$data]);
            }
        }
        else
        {
            $this->render('auth/register.html.twig', []);
        }
    }

    public function notFound() : void
    {
        $this->render('error/notFound.html.twig', []);
    }
}