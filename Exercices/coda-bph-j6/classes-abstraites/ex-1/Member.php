<?php
class Member extends AbstractUser
{
    private array $favorites = [];

    public function __construct(string $username, string $password, private string $biography)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = "MEMBER";
    }

    public function getBiography() : string
    {
        return $this->biography;
    }

    public function setBiography(string $biography) : void
    {
        $this->biography = $biography;
    }

    public function getFavorites() : array
    {
        return $this->favorites;
    }

    public function setFavorites(array $favorites) : void
    {
        $this->favorites = $favorites;
    }
}