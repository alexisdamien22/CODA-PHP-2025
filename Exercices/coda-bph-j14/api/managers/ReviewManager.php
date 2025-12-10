<?php

class ReviewManager extends AbstractManager
{
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT 
        reviews.*,
        products.id AS p_id, products.name AS p_name, products.description AS p_description, products.price AS p_price, products.image_url AS p_image_url, products.category_id AS p_category_id,
        product_categories.id AS pc_id, product_categories.name AS pc_name, product_categories.description AS pc_description 
        FROM reviews JOIN products ON products.id = reviews.product_id 
        JOIN product_categories ON products.category_id = product_categories.id');
        $parameters = [

        ];
        $query->execute($parameters);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $reviews = [];

        foreach ($results as $result)
        {
            $category = new ProductCategory($result['pc_name'], $result['pc_description'], $result['pc_id']);
            $product = new Product($result['p_name'], $result['p_description'], $result['p_price'], $result['p_image_url'], $category, $result['p_id']);
            $review = new Review($result['content'], $result['author'], $result['star_number'], $product, $result['id']);
            $reviews[] = $review;
        }

        return $reviews;
    }

    public function findById(int $id) : ? Review
    {
        $query = $this->db->prepare('SELECT 
        reviews.*,
        products.id AS p_id, products.name AS p_name, products.description AS p_description, products.price AS p_price, products.image_url AS p_image_url, products.category_id AS p_category_id,
        product_categories.id AS pc_id, product_categories.name AS pc_name, product_categories.description AS pc_description 
        FROM reviews JOIN products ON products.id = reviews.product_id 
        JOIN product_categories ON products.category_id = product_categories.id
        WHERE id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $category = new ProductCategory($result['pc_name'], $result['pc_description'], $result['pc_id']);
            $product = new Product($result['p_name'], $result['p_description'], $result['p_price'], $result['p_image_url'], $category, $result['p_id']);
            $review = new Review($result['content'], $result['author'], $result['star_number'], $product, $result['id']);

            return $review;
        }

        return null;
    }

    public function findByProduct(int $id) : ?array
    {
        $query = $this->db->prepare('SELECT 
        reviews.*,
        products.id AS p_id, products.name AS p_name, products.description AS p_description, products.price AS p_price, products.image_url AS p_image_url, products.category_id AS p_category_id,
        product_categories.id AS pc_id, product_categories.name AS pc_name, product_categories.description AS pc_description 
        FROM reviews JOIN products ON products.id = reviews.product_id 
        JOIN product_categories ON products.category_id = product_categories.id
        WHERE products.id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $reviews = [];

        foreach ($results as $result)
        {
            $category = new ProductCategory($result['pc_name'], $result['pc_description'], $result['pc_id']);
            $product = new Product($result['p_name'], $result['p_description'], $result['p_price'], $result['p_image_url'], $category, $result['p_id']);
            $review = new Review($result['content'], $result['author'], $result['star_number'], $product, $result['id']);
            $reviews[] = $review;
        }

        return $reviews;
    }
}