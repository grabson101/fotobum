<form action="<?= Config::get('router')->generate('product_categories_create_path')?>" method="post">
 Nazwa:<br>
 <input type="text" name="product_category[name]" placeholder="Nazwa"><br>
 Opis:<br>
 <input type="text" name="product_category[description]" placeholder="Opis"><br><br>
 <input type="submit" class="submit" value="Wyślij">
</form>
