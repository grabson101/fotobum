<?php if (empty($product_categories)): ?>
  <div class="error" >
    Brak kategorii w bazie
  </div>
<?php else:?>
  <table class="table">
    <thead>
      <tr>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Status</th>
        <th>Edycja</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($product_categories as $product_category) { ?>
        <tr>
          <td class="product-category"><a href="<?= Config::get('router')->generate('show_product_categories_path', ['id'=>$product_category->id])?>"> <?= $product_category->name ?> </a></td>
          <td><?= $product_category->description ?></td>
          <td><?= $product_category->status ?></td>
          <td><a href="<?= Config::get('router')->generate('edit_product_categories_path', ['id'=>$product_category->id])?>">Edycja</a></td>
        </tr>
      <? } ?>
    </tbody>
  </table>
<?php endif; ?>
<br>
<a class="create btn btn-primary" type="button" name="create" href="<?= Config::get('router')->generate('new_product_categories_path')?>"> Dodaj nową</a>
