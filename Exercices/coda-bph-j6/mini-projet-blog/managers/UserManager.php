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
        $users = $query->fetchall(PDO::FETCH_ASSOC);
        $users_return = [];
        $user_temp = new User("temp","temp","temp","temp","temp");
        foreach ($users as $i => $user)
        {
            $user_temp->setId($user["id"]);
            $user_temp->setUsername($user["username"]);
            $user_temp->setPassword($user["password"]);
            $user_temp->setEmail($user["email"]);
            $user_temp->setRole($user["role"]);
            $user_temp->setTime($user["created_at"]);
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
            $user_temp->setUsername($user["username"]);
            $user_temp->setPassword($user["password"]);
            $user_temp->setEmail($user["email"]);
            $user_temp->setRole($user["role"]);
            $user_temp->setTime($user["created_at"]);
            return $user_temp;
        }
    }

    public function create(User $user) : void
    {
        $query = $this->db->prepare("INSERT INTO users (id, username, password, email, role, created_at) VALUES (NULL, :username, :password, :email, :role, :time)");
        $parameters = [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'time' => $user->getTime()
        ];
        $query->execute($parameters);
        $user->setId($this->db->lastInsertId());
    }

    public function update(User $user) : void
    {
        $query = $this->db->prepare("UPDATE users SET username = :username, password = :password, email = :email, role = :role, created_at = :time WHERE id = :id");
        $parameters = [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'time' => $user->getTime(),
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