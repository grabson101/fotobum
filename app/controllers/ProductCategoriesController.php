<?php
class ProductCategoriesController extends ApplicationController
{
    public function index()
    {
        $product_categories = ProductCategory::all();

        return $this->render(['product_categories' => $product_categories]);
    }

    public function new()
    {
        return $this->render();
    }

    public function create()
    {
      $product_category = new ProductCategory($this->params['product_category']);

      if($product_category->save())
      {
        return header("Location: ". Config::get('web_address').'/panel/product-categories');
      }
    }

    public function show()
    {
        $product_category = $this->product_category();

        return $this->render(['product_category' => $product_category]);
    }


    private function product_category()
    {
        return ProductCategory::find($this->params['id']);
    }
}
