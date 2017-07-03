<?php
class ProductImage extends Model
{
  public function fields()
  {
      return [
          'id'                  => ['type' => 'integer'],
          'order'               => ['type' => 'integer', 'validations'=>['required']],
          'cover'               => ['type' => 'string', 'default' => 'true', 'validations'=>['required', 'in:true,false']],
          'product_category_id' => ['type' => 'integer', 'validations'=>['required']],
          'created_at'          => ['type' => 'datetime'],
          'updated_at'           => ['type' => 'datetime'],
      ];
  }


}
