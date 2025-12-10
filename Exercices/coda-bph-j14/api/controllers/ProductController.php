<?php

class ProductController extends AbstractController
{
    public function list() : void
    {
        $Pmanager = new ProductManager();
        $Rmanager = new ReviewManager();

        $products = $Pmanager->findAll();
        $arrayProducts = [];

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

        $this->render([
            "code" => 200,
            "products" => $arrayProducts,
            "average"=> $summOfReviews/$amountOfReviews
        ]);
    }

    public function details(int $id) : void
    {
        $Pmanager = new ProductManager();
        $Rmanager = new ReviewManager();
        $arrayProduct = [];
        $arrayReviews = [];
        $summOfReviews = 0;
        $amountOfReviews = 0;
        $product = $Pmanager->findById($id);
        $arrayProduct[] = $product->toArray();
        $reviews = $Rmanager->findByProduct($id);
        foreach($reviews as $review)
        {
            $arrayReview = $review->toArray();
            unset($arrayReview['product']);
            $summOfReviews = $summOfReviews + $arrayReview["starNumber"];
            $amountOfReviews++;
            $arrayReviews[] = $arrayReview;
        }
        $arrayProduct[] = $arrayReviews;
        $arrayPeoduct[] = $summOfReviews/$amountOfReviews;

        $this->render([
            "code" => 200,
            "product" => $arrayProduct
        ]);
    }
}