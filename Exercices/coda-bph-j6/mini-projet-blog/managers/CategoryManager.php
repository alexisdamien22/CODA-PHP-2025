<?php
class CategoryManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchall(PDO::FETCH_ASSOC);
        $categories_return = [];
        $category_temp = new Category("temp","temp","temp");
        foreach ($categories as $i => $category)
        {
            $category_temp->setId($category["id"]);
            $category_temp->setTitle($category["title"]);
            $category_temp->setDescription($category["description"]);
            $categories_return[] = $category_temp;
        }
        return $categories_return;
    }

    public function findOne(int $id) : ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);
        $category_temp = new Category("temp","temp","temp",0,"temp");
        if($category === null)
        {
            return null;
        }
        else
        {
            $category_temp->setId($category["id"]);
            $category_temp->setTitle($category["title"]);
            $category_temp->setDescription($category["description"]);
            return $category_temp;
        }
    }

    public function create(Category $category) : void
    {
        $query = $this->db->prepare("INSERT INTO categories (id, title, description) VALUES (NULL, :title, :description)");
        $parameters = [
            'title' => $category->getTitle(),
            'description' => $category->getDescription(),
        ];
        $query->execute($parameters);
        $category->setId($this->db->lastInsertId());
    }

    public function update(Category $category) : void
    {
        $query = $this->db->prepare("UPDATE categories SET title = :title, description = :descriptiont WHERE id = :id");
        $parameters = [
            'title' => $category->getTitle(),
            'description' => $category->getDescription(),
            'id' => $category->getId()
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
    }

    public function delete(int $id) : void
    {
        $query = $this->db->prepare("DELETE FROM categories WHERE id = :id");
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
    }
}