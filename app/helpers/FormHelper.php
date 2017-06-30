<?php
class FormHelper
{
    public static function formTag($model_object, $model_url)
    {
        if ($model_object->id) {
          $html= '<form action=' . Config::get('router')->generate('update_' . $model_url . '_path',['id'=>$model_object->id]) . ' method="post">';
          $html.='<input type="hidden" name="_method" value="put">';
          $html.='<input type="hidden" name="return_path" value="' . $_SERVER['REQUEST_URI'] . '">';
      }
        else {
          $html= '<form action=' . Config::get('router')->generate('create_' . $model_url . '_path') . ' method="post">';
          $html.='<input type="hidden" name="return_path" value="' . $_SERVER['REQUEST_URI'] . '">';
      }

      return $html;
    }

    public static function inputValue($model_object, $input_name)
    {
      return $model_object->{$input_name};
    }

    public static function radioTagSet($model_object, $input_name, $value_name)
    {
      if(self::inputValue($model_object, $input_name) == $value_name){
          return "checked";
      }
    }
}
