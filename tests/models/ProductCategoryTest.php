<?php
  class ProductCategoryTest extends TesterCase
  {
      public $skip_database_clear_before = ['all'];

      public function testShouldBeValid()
      {
          $product_category = ProductCategoryFactory::productCategory();
          Assert::expect($product_category->isValid())->to_equal(true);
      }

      public function testShouldRequireName()
      {
        $product_category = ProductCategoryFactory::productCategory(['name'=> null]);
        Assert::expect($product_category->isValid())->to_equal(false);
        Assert::expect(count($product_category->errors))->to_equal(1);
      }

      public function testShouldRequireStatusToBeLike()
      {
        $product_category = ProductCategoryFactory::productCategory();
        Assert::expect($product_category->isValid())->to_equal(true);

        $product_category = ProductCategoryFactory::productCategory(['status'=> 'inactive']);
        Assert::expect($product_category->isValid())->to_equal(true);

        $product_category = ProductCategoryFactory::productCategory(['status'=> 'qwerty']);
        Assert::expect($product_category->isValid())->to_equal(false);
        Assert::expect(count($product_category->errors))->to_equal(1);
      }

  }
