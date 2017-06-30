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
        http_response_code(201);
        return header("Location: ". Config::get('web_address').'/panel/product-categories');
      }
      else{
        http_response_code(422);
        return $this->render(['product_category' => $product_category],['path'=> 'app/views/product_categories/new.php']);
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
            http_response_code(202);
            return header("Location: ". Config::get('web_address').'/panel/product-categories');
        }
        else{
          http_response_code(422);
          $this->params['action'] = 'edit';
          return $this->render(['product_category' => $product_category]);
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
