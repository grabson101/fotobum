<?php
class CreateProductCategoriesTable
{
    public function up()
    {
        $query = "CREATE TABLE `product_categories` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(191) NOT NULL,
            `description` text DEFAULT NULL,
            `status` varchar(191) NOT NULL,
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
