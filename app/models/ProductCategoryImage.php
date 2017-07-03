<?php
class ProductCategoryImage extends Model
{
  public function fields()
  {
      return [
          'id'                  => ['type' => 'integer'],
          'order'               => ['type' => 'integer', 'validations'=>['required']],
          'cover'               => ['type' => 'string', 'default' => 'false', 'validations'=>['required', 'in:true,false']],
          'product_category_id' => ['type' => 'integer', 'validations'=>['required']],
          'created_at'          => ['type' => 'datetime'],
          'updated_at'           => ['type' => 'datetime'],
      ];
  }

  public static function relations()
  {
      return [
          'product_category'        => ['relation' => 'belongs_to', 'class' => 'ProductCategory'],
      ];
  }

}
