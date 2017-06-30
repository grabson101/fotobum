<?php
class DeleteButtonHelper
{
    public static function generateLink($model_object, $model_url, $button_text = "Usuń")
    {
      $html= '<form action=' . Config::get('router')->generate('delete_' . $model_url . '_path',['id'=>$model_object->id]) . ' method="post">';
      $html.='<input type="hidden" name="_method" value="delete">';
      $html.='<input type="submit" class="submit" value="' . $button_text .' ">';

      return $html;
    }

}