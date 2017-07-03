<?php
  class ProductCategoryTest extends TesterCase
  {
      public $skip_database_clear_before = ['testShouldBeValid', 'testShouldRequireName', 'testShouldRequireStatusToBeLike'];

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

          $product_category = ProductCategoryFactory::productCategory(['status'=> 'active']);
          Assert::expect($product_category->isValid())->to_equal(true);

          $product_category = ProductCategoryFactory::productCategory(['status'=> 'qwerty']);
          Assert::expect($product_category->isValid())->to_equal(false);
          Assert::expect(count($product_category->errors))->to_equal(1);
      }

      public function testChangeCoverImage()
      {
          $product_category = ProductCategoryFactory::productCategory();
          $product_category->save();
          $product_category_images = ProductCategoryImageFactory::populateProductCategoryImageTable();

          Assert::expect($product_category->images()[0]->cover)->to_equal(1);
          Assert::expect($product_category->images()[1]->cover)->to_equal(0);
          Assert::expect($product_category->images()[2]->cover)->to_equal(0);

          $product_category->changeCoverImage(3);

          Assert::expect($product_category->images()[2]->cover)->to_equal(1);
          Assert::expect($product_category->images()[0]->cover)->to_equal(0);
          Assert::expect($product_category->images()[1]->cover)->to_equal(0);
      }
  }
