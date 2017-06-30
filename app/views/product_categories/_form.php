<?= FormHelper::formTag($product_category, 'product_categories'); ?>
 Nazwa:<br>
 <input type="text" name="product_category[name]" value="<?= FormHelper::inputValue($product_category, 'name') ?>" placeholder="Nazwa"><br>
 Opis:<br>
 <input type="text" name="product_category[description]" value="<?= FormHelper::inputValue($product_category, 'description') ?>" placeholder="Opis"><br><br>
 <input type="radio" name="product_category[status]" value="active" <?= FormHelper::radioTagSet($product_category, 'status', 'active') ?>> Active<br>
 <input type="radio" name="product_category[status]" value="inactive" <?= FormHelper::radioTagSet($product_category, 'status', 'inactive') ?>> Inactive<br>
 <input type="submit" class="submit" value="Wyślij">
</form>
