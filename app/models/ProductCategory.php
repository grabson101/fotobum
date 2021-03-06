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

  public static function relations()
  {
      return [
          'images'        => ['relation' => 'has_many', 'class' => 'ProductCategoryImage'],
      ];
  }

  public function changeCoverImage ($image_id)
  {
      $old_cover_image = $this->getCoverImage();
      $old_cover_image->cover = 0;
      $old_cover_image->save();

      $this->setCoverImage($image_id);
  }

  public function setCoverImage($image_id)
  {
      $cover_image = ProductCategoryImage::find($image_id);
      $cover_image->cover = 1;
      $cover_image->save();
  }

  public function getCoverImage()
  {
      return ProductCategoryImage::where("`product_category_id` = ? AND `cover` = 1", ['product_category_id' => $this->id])[0];
  }
}
