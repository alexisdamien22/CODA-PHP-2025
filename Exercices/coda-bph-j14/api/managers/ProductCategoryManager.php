<?php

class ProductCategoryManager extends AbstractManager
{
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT  
       product_categories.id AS pc_id, product_categories.name AS pc_name, 
       product_categories.description AS pc_description FROM product_categories');
        $parameters = [

        ];
        $query->execute($parameters);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];

        foreach ($results as $result)
        {
            $category = new ProductCategory($result['pc_name'], $result['pc_description'], $result['pc_id']);
            $categories[] = $category;
        }

        return $categories;
    }

    public function findById(int $id) : ? ProductCategory
    {
        $query = $this->db->prepare('SELECT 
       product_categories.id AS pc_id, product_categories.name AS pc_name, 
       product_categories.description AS pc_description 
FROM product_categories WHERE product_categories.id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $category = new ProductCategory($result['pc_name'], $result['pc_description'], $result['pc_id']);

            return $category;
        }

        return null;
    }
}