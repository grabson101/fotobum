<?php
class ProductCategoriesController extends ApplicationController
{
    public function index()
    {
        $product_categories = ProductCategory::all();
        // return $this->render($product_categories);
        return $this->render(['product_categories' => $product_categories]);
    }
}
