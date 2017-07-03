<?php
class RenameProductImagesTable
{
    public function up()
    {
        $query = "RENAME TABLE `product_images` TO `product_category_images`";
        return $query;
    }
    public function down() {
      $query = "RENAME TABLE `product_category_images` TO `product_images`";
      return $query;
    }
}
