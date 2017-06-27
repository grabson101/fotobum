<?php
class ProductCategoryFactory
{
    public static function productCategory(Array $overwrite_params = [])
    {
        $product_category = new ProductCategory(['name' => 'Test', 'description' => 'jakis opis']);
        foreach ($overwrite_params as $key => $value) {
            $product_category->$key = $value;
        }
        return $product_category;
    }

    public static function populateProductCategoryTable()
    {
        $category1 = self::productCategory();
        $category1->save();
        $category2 = self::productCategory();
        $category2->save();
        $category3 = self::productCategory();
        $category3->save();
    }
}
