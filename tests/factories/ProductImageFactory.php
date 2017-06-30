<?php
class ProductImageFactory
{
    public static function productimage(Array $overwrite_params = [])
    {
        $product_image = new ProductImage(['order' => 'Test']);
        foreach ($overwrite_params as $key => $value) {
            $product_image->$key = $value;
        }
        return $product_image;
    }

    public static function populateProductImageTable()
    {
        $image1 = self::productImage();
        $image1->save();
        $image2 = self::productImage();
        $image2->save();
        $image3 = self::productImage();
        $image3->save();
    }
}