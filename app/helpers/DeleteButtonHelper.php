<?php
class DeleteButtonHelper
{
    public static function generateLink($model_object, $model_url, $button_text = "Usuń")
    {
      $html= '<form action=' . Config::get('router')->generate('delete_' . $model_url . '_path',['id'=>$model_object->id]) . ' method="post">';
      $html.='<input type="hidden" name="_method" value="delete">';
      $html.='<input type="hidden" name="return_path" value="' . $_SERVER['REQUEST_URI'] . '">';
      $html.='<input class="delete btn btn-danger" type="submit" value="' . $button_text .' ">';

      return $html;
    }

}
