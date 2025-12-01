<?php
class UserManager
{
    private array $users = [];
    private PDO $db;

    public function __construct()
    {
        $host = "localhost";
        $port = "3306";
        $dbname = "coda_bph_j6_blog";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
        $user = "root";
        $password = "";
        $this->db = new PDO(
        $connexionString,
        $user,
        $password
        );
    }

    public function getUsers() : array
    {
        return $this->users;
    }

    public function setUsers(array $users) : void
    {
        $this->users = $users;
    }

    public function loadUsers() : void
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchall(PDO::FETCH_ASSOC);
        $users_return = [];
        $user = new User("temp","temp","temp","temp");
        foreach ($users as $i => $bdd)
        {
            $user->setId($bdd["id"]);
            $user->setUsername($bdd["username"]);
            $user->setPassword($bdd["password"]);
            $user->setEmail($bdd["email"]);
            $user->setRole($bdd["role"]);
            $users_return[] = $user;
        }
        $this->setUsers($users_return);
    }

    public function saveUser(User $user) : void
    {
        
    }

    public function deleteUser(User $user) : void
    {
        
    }
}