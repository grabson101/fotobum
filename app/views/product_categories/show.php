<div>
  <h3 class="product-category-name" > <?= $product_category->name ?> </h3>
  <p class="product-category-description"><?= $product_category->description ?></p><br />
  <p class="product-category-status"><?= $product_category->status ?></p>
  <a class="update" href="<?= Config::get('router')->generate('edit_product_categories_path', ['id'=>$product_category->id])?>">Edytuj</a>
  <?= DeleteButtonHelper::generateLink($product_category, 'product_categories', "Usuń") ?>
</div>
