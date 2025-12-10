<?php

class ProductCategoryController extends AbstractController
{
    public function list() : void
    {
        $manager = new ProductCategoryManager();
        $Pmanager = new ProductManager();
        $Rmanager = new ReviewManager();

        $categories = $manager->findAll();
        $arrayCategories = [];

        foreach($categories as $category)
        {
            $arrayProduct = [];
            $arrayCategory[] = $category->toArray();
            $products = $Pmanager->findByCategory($category->getId());
            foreach($products as $product)
            {
                $arrayProduct = [];
                $arrayReviews = [];
                $summOfReviews = 0;
                $amountOfReviews = 0;
                $arrayProduct[] = $product->toArray();
                $reviews = $Rmanager->findByProduct($product->getId());
                foreach($reviews as $review)
                {
                    $arrayReview = $review->toArray();
                    unset($arrayReview['product']);
                    $summOfReviews = $summOfReviews + $arrayReview["starNumber"];
                    $amountOfReviews++;
                    $arrayReviews[] = $arrayReview;
                }
                $arrayProduct[] = $arrayReviews;
                $arrayProducts[] = $arrayProduct;
                $arrayProducts[] = $summOfReviews/$amountOfReviews;
            }
            $arrayCategory[] = $arrayProducts;
            $arrayCategories[] = $arrayCategory;
        }

        $this->render([
            "code" => 200,
            "categories" => $arrayCategories
        ]);

    }

    public function details(int $id) : void
    {
        $PCmanager = new ProductCategoryManager();
        $Pmanager = new ProductManager();
        $Rmanager = new ReviewManager();
        $arrayCategory = [];
        $arrayProducts = [];
        $category = $PCmanager->findById($id);
        $arrayCategory[] = $category->toArray();
        $products = $Pmanager->findByCategory($id);
        foreach($products as $product)
        {
            $arrayProduct = [];
            $arrayReviews = [];
            $summOfReviews = 0;
            $amountOfReviews = 0;
            $arrayProduct[] = $product->toArray();
            $reviews = $Rmanager->findByProduct($product->getId());
            foreach($reviews as $review)
            {
                $arrayReview = $review->toArray();
                unset($arrayReview['product']);
                $summOfReviews = $summOfReviews + $arrayReview["starNumber"];
                $amountOfReviews++;
                $arrayReviews[] = $arrayReview;
            }
            $arrayProduct[] = $arrayReviews;
            $arrayProduct[] = $summOfReviews/$amountOfReviews;
            $arrayCategory[] = $arrayProduct;
        }
        $category = $PCmanager->findById($id);

        $this->render([
            "code" => 200,
            "category" => $arrayCategory
        ]);
    }
}