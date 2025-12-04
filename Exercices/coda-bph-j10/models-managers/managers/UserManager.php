<?php
class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        $users_return = [];
        foreach ($users as $i => $user)
        {
            $user_temp = new User("temp","temp","temp","temp","temp");
            $user_temp->setId($user["id"]);
            $user_temp->setFirstname($user["firstName"]);
            $user_temp->setLastName($user["lastName"]);
            $user_temp->setEmail($user["email"]);
            $user_temp->setPassword($user["password"]);
            $user_temp->setCreated_at($user["created_at"]);
            $users_return[] = $user_temp;
        }
        return $users_return;
    }

    public function findOne(int $id) : ?User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $user_temp = new User("temp","temp","temp","temp","temp");
        if($user === null)
        {
            return null;
        }
        else
        {
            $user_temp->setId($user["id"]);
            $user_temp->setFirstName($user["firstName"]);
            $user_temp->setLastName($user["lastName"]);
            $user_temp->setEmail($user["email"]);
            $user_temp->setPassword($user["password"]);
            $user_temp->setCreated_at($user["created_at"]);
            return $user_temp;
        }
    }

    public function create(User $user) : void
    {
        $query = $this->db->prepare("INSERT INTO users (id, username, password, email, role, created_at) VALUES (NULL, :firstName, :lastName, :email, :password, :created_at)");
        $parameters = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => $user->getCreated_at(),
        ];
        $query->execute($parameters);
        $user->setId($this->db->lastInsertId());
    }

    public function update(User $user) : void
    {
        $query = $this->db->prepare("UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email, password = :password, created_at = :created_at WHERE id = :id");
        $parameters = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => $user->getCreated_at(),
            'id' => $user->getId()
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
    }

    public function delete(int $id) : void
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
    }
}