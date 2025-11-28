<?php
require "AbstractManager.php";
class PostManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM posts');
        $query->execute();
        $posts = $query->fetchall(PDO::FETCH_ASSOC);
        $posts_return = [];
        $post_temp = new Post("temp","temp","temp",0,"temp");
        foreach ($posts as $i => $post)
        {
            $post_temp->setId($post["id"]);
            $post_temp->setTitle($post["title"]);
            $post_temp->setExcerpt($post["excerpt"]);
            $post_temp->setContent($post["content"]);
            $post_temp->setAuthor($post["author"]);
            $post_temp->setTime($post["created_at"]);
            $posts_return[] = $post_temp;
        }
        return $posts_return;
    }

    public function findOne(int $id) : ?Post
    {
        $query = $this->db->prepare('SELECT * FROM posts WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $post = $query->fetch(PDO::FETCH_ASSOC);
        $post_temp = new Post("temp","temp","temp",0,"temp");
        if($post === null)
        {
            return null;
        }
        else
        {
            $post_temp->setId($post["id"]);
            $post_temp->setTitle($post["title"]);
            $post_temp->setExcerpt($post["excerpt"]);
            $post_temp->setContent($post["content"]);
            $post_temp->setAuthor($post["author"]);
            $post_temp->setTime($post["created_at"]);
            return $post_temp;
        }
    }

    public function create(Post $post) : void
    {
        $query = $this->db->prepare("INSERT INTO posts (id, title, excerpt, content, author, created_at) VALUES (NULL, :title, :excerpt, :content, :author, :time)");
        $parameters = [
            'title' => $post->getTitle(),
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor(),
            'time' => $post->getTime()
        ];
        $query->execute($parameters);
        $post->setId($this->db->lastInsertId());
    }

    public function update(Post $post) : void
    {
        $query = $this->db->prepare("UPDATE posts SET title = :title, excerpt = :excerpt, content = :content, author = :author, created_at = :time WHERE id = :id");
        $parameters = [
            'title' => $post->getTitle(),
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor(),
            'time' => $post->getTime(),
            'id' => $post->getId()
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
    }

    public function delete(int $id) : void
    {
        $query = $this->db->prepare("DELETE FROM posts WHERE id = :id");
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
    }
}