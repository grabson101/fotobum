<?php if (empty($product_categories)): ?>
  <div>
    Brak kategorii w bazie
  </div>
<?php else:?>
  <?php foreach ($product_categories as $product_category) { ?>
    <div class="product-category">
      <a href="<?= Config::get('router')->generate('product_categories_show_path', ['id'=>$product_category->id])?>"> <?= $product_category->name ?> </a>
    </div>
  <? } ?>
<?php endif; ?>
<br>
<a class="create" name="create" href="<?= Config::get('router')->generate('product_categories_new_path')?>"> Dodaj nową</a>
