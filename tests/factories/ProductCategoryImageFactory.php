<?php
class ProductCategoryImageFactory
{
    public static function productCategoryImage(Array $overwrite_params = [])
    {
        $product_image = new ProductCategoryImage(['order' => '1', 'product_category_id' => 1]);
        foreach ($overwrite_params as $key => $value) {
            $product_image->$key = $value;
        }
        return $product_image;
    }

    public static function populateProductCategoryImageTable()
    {
        $image1 = self::productCategoryImage(['order' => 1, 'product_category_id' => 1, 'cover' => 1]);
        $image1->save();
        $image2 = self::productCategoryImage(['order' => 2, 'product_category_id' => 1]);
        $image2->save();
        $image3 = self::productCategoryImage(['order' => 3, 'product_category_id' => 1]);
        $image3->save();
    }
}
