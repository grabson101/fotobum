<?php
class ChangeStringToBooleanProductImages
{
    public function up()
    {
        $query = "ALTER TABLE `product_category_images` MODIFY COLUMN `cover` tinyint(1)  NOT NULL";
        return $query;
    }
    public function down() {
      $query = "ALTER TABLE `product_category_images` MODIFY COLUMN `cover` varchar(191) NOT NULL";
      return $query;
    }
}
