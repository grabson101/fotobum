<?php
  class ProductCategoryImageTest extends TesterCase
  {
      public $skip_database_clear_before = ['all'];

      public function testShouldBeValid()
      {
          $product_category_image = ProductCategoryImageFactory::productCategoryImage();
          Assert::expect($product_category_image->isValid())->to_equal(true);
      }

      public function testShouldRequireOrder()
      {
        $product_category_image = ProductCategoryImageFactory::productCategoryImage(['order'=> null]);
        Assert::expect($product_category_image->isValid())->to_equal(false);
        Assert::expect(count($product_category_image->errors))->to_equal(1);
      }

      public function testShouldRequireCoverToBeLike()
      {
        $product_category_image = ProductCategoryImageFactory::productCategoryImage();
        Assert::expect($product_category_image->isValid())->to_equal(true);

        $product_category_image = ProductCategoryImageFactory::productCategoryImage(['cover' => 0]);
        Assert::expect($product_category_image->isValid())->to_equal(true);


        $product_category_image = ProductCategoryImageFactory::productCategoryImage(['cover'=> 'qwerty']);
        Assert::expect($product_category_image->isValid())->to_equal(false);
        Assert::expect(count($product_category_image->errors))->to_equal(1);
      }
  }
