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
        $product_category = new ProductCategory();
        return $this->render(['product_category' => $product_category]);
    }

    public function create()
    {
      $product_category = new ProductCategory($this->params['product_category']);

      if($product_category->save())
      {
        return header("Location: ". Config::get('web_address').'/panel/product-categories');
      }
      else{
        return header("Location: ". Config::get('web_address').$this->params['return_path']);
      }
    }

    public function show()
    {
        $product_category = $this->product_category();

        return $this->render(['product_category' => $product_category]);
    }

    public function edit()
    {
        $product_category = $this->product_category();

        return $this->render(['product_category' => $product_category]);
    }

    public function update()
    {
        $product_category = $this->product_category();

        if ($product_category->update($this->params['product_category'])) {
            return header("Location: ". Config::get('web_address').'/panel/product-categories');
        }
        else{
          return header("Location: ". Config::get('web_address').$this->params['return_path']);
        }
    }

    public function delete()
    {
        $product_category = $this->product_category();
        if($product_category->destroy())
        {
          return header("Location: ". Config::get('web_address').'/panel/product-categories');
        }
        else{
          return header("Location: ". Config::get('web_address').$this->params['return_path']);
        }
    }

    private function product_category()
    {
        return ProductCategory::find($this->params['id']);
    }
}
