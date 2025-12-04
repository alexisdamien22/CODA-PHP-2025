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
            $user_temp = new User("temp","temp","temp");
            $user_temp->setId($user["id"]);
            $user_temp->setFirstname($user["first_name"]);
            $user_temp->setLastName($user["last_name"]);
            $user_temp->setEmail($user["email"]);
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
        $user_temp = new User("temp","temp","temp");
        if($user === null)
        {
            return null;
        }
        else
        {
            $user_temp->setId($user["id"]);
            $user_temp->setFirstName($user["first_name"]);
            $user_temp->setLastName($user["last_name"]);
            $user_temp->setEmail($user["email"]);
            return $user_temp;
        }
    }

    public function create(User $user) : void
    {
        $query = $this->db->prepare("INSERT INTO users (id, first_name, last_name, email) VALUES (NULL, :firstName, :lastName, :email)");
        $parameters = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
        ];
        $query->execute($parameters);
        $user->setId($this->db->lastInsertId());
    }

    public function update(User $user) : void
    {
        $query = $this->db->prepare("UPDATE users SET first_name = :firstName, last_name = :lastName, email = :email WHERE id = :id");
        $parameters = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
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