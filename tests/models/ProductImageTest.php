<?php
  class ProductImageTest extends TesterCase
  {
      public $skip_database_clear_before = ['all'];

      public function testShouldBeValid()
      {
          $product_imag = ProductCategoryFactory::productCategory();
          Assert::expect($product_image->isValid())->to_equal(true);
      }

      public function testShouldRequireOrder()
      {
        $product_image = ProductCategoryFactory::productCategory(['order'=> null]);
        Assert::expect($product_image->isValid())->to_equal(false);
        Assert::expect(count($product_image->errors))->to_equal(1);
      }

      public function testShouldRequireCoverToBeLike()
      {
        $product_image = ProductCategoryFactory::productCategory();
        Assert::expect($product_image->isValid())->to_equal(true);

        $product_image = ProductCategoryFactory::productCategory(['cover'=> 'true']);
        Assert::expect($product_image->isValid())->to_equal(true);

        $product_image = ProductCategoryFactory::productCategory(['cover'=> 'qwerty']);
        Assert::expect($product_image->isValid())->to_equal(false);
        Assert::expect(count($product_image->errors))->to_equal(1);
      }

  }
