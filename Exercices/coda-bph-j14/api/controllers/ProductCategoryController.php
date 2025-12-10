<?php

class ProductCategoryController extends AbstractController
{
    public function list() : void
    {
        $manager = new ProductCategoryManager();

        $categories = $manager->findAll();
        $arrayCategories = [];

        foreach($categories as $category)
        {
            $arrayCategories[] = $category->toArray();
        }

        $this->render([
            "code" => 200,
            "categories" => $arrayCategories
        ]);

    }

    public function details(int $id) : void
    {
        $manager = new ProductCategoryManager();

        $category = $manager->findById($id);

        $this->render([
            "code" => 200,
            "categry" => $category->toArray()
        ]);
    }
}