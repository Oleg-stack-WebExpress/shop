<?php
require_once(dirname(__DIR__, 2) . '/utils/paths.php');
require_once(getRootPath('templates/header.php'));
require_once(getRootPath('services/auth.php'));
require_once(getRootPath('services/products.php'));
require_once(getRootPath('services/categories.php'));

if (!isAuth()) {
  redirect('/');
}

$title = "Админка - Редактирование продукта";
$error = null;

// Предполагаем, что ID товара передается через GET параметр
$product_id = $_GET['id'] ?? null;
if ($product_id == null) {
  redirect('/admin/products');
}

$product = getProduct($product_id);

if (array_key_exists('name_products', $_POST)){
  if (!empty($_POST['name_categories'])){
    
  $name_products = htmlspecialchars($_POST['name_products']);
  $name_categories = htmlspecialchars($_POST['name_categories']);
  $price = htmlspecialchars($_POST['price']);
  $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null;
}

if (updateProduct($product_id, $name_products, $name_categories, $price, $description)){
  redirect('/admin/products');
} else {
  $error = 'Ошибка при редактировании продукта';
}
}else{
  $error = 'Заполните все данные';
}
?>

<h1 class="mb-4">Редактирование продукта #<?php echo $product_id; ?></h1>

<?php
if ($error) {
  showError($error);
}
?>

<form action="#" method="POST">
  <div class="mb-3">
    <label for="name_products" class="form-label">Название</label>
    <input type="text" class="form-control" id="name_products" name = "name_products" value="<?= $product['name_products']; ?>" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Категория</label>
    <select class="form-select" id="category" name="category" required>
      <option value="">Выберите категорию</option>
      <option value="1" selected>Запчасти</option>
      <option value="2">Цветмет</option>
      <option value="3">Транспорт б/у</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Цена</label>
    <input type="number" class="form-control" id="price" name="price" value="<?= $price['price']; ?>" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea class="form-control" id="description" name="description" rows="3"><?= $product['description']; ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Сохранить</button>
  <a href="/admin/products" class="btn btn-secondary">Отмена</a>
</form>

<?php require_once(getRootPath('templates/footer.php')); ?>