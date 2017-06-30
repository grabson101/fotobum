<?php
class ProductCategory extends Model
{
  public function fields()
  {
      return [
          'id'              => ['type' => 'integer'],
          'name'            => ['type' => 'string', 'validations' => ['required', 'max_length:190']],
          'description'     => ['type' => 'string'],
          'status'          => ['type' => 'string', 'default' => 'inactive', 'validations'=>['required', 'in:active,inactive']],
          'created_at'      => ['type' => 'datetime'],
          'updated_at'      => ['type' => 'datetime'],
      ];
  }
}
