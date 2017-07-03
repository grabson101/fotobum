<?php
class CreateProductImagesTable
{
    public function up()
    {
        $query = "CREATE TABLE `product_images` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `order` int(11) NOT NULL,
            `cover` varchar(191) NOT NULL,
            `product_category_id` int(11) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        )";
        return $query;
    }
    public function down() {
      $query = "DROP TABLE `product_categories`";
      return $query;
    }
}
