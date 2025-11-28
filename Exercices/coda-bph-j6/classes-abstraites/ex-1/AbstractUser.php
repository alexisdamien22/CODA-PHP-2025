<?php
abstract class AbstractUser
{
    protected PDO $db;
    protected ?int $id = null;

    public function __construct(protected string $username, protected string $password,protected string $role)
    {
        // initialiser la base de données
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function setPassword(string $passsword) : void
    {
        $this->password = $password;
    }
}