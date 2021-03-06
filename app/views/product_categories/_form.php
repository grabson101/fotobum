  <?= FormHelper::formTag($product_category, 'product_categories'); ?>
   <div class="form-group">
     <label for="name">Nazwa:</label>
     <input type="text" class="form-control" id="name" name="product_category[name]" value="<?= FormHelper::inputValue($product_category, 'name') ?>" placeholder="Nazwa"><br>
   </div>
   <div class="form-group">
     <label for="description">Opis:</label>
     <input type="text" class="form-control" id="description" name="product_category[description]" value="<?= FormHelper::inputValue($product_category, 'description') ?>" placeholder="Opis"><br><br>
   </div>
   <div class="radio">
     <label><input type="radio" name="product_category[status]" value="active" <?= FormHelper::radioTagSet($product_category, 'status', 'active') ?> >Active</label>
   </div>
   <div class="radio">
     <label><input type="radio" name="product_category[status]" value="inactive" <?= FormHelper::radioTagSet($product_category, 'status', 'inactive') ?> >Inactive</label>
   </div>
   <button type="submit" class="btn btn-primary submit">Wyślij</button>
  </form>
