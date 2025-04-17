<?php
require_once(dirname(__DIR__, 2) . '/utils/paths.php');
require_once(getRootPath('templates/header.php'));
require_once(getRootPath('services/auth.php'));
require_once(getRootPath('services/products.php'));
require_once(getRootPath('services/categories.php'));

if (!isAuth()) {
  redirect('/');
}

$categories = getCategories();
$title = "Админка - Создание продукта";
$error = null;

if (array_key_exists('name_products', $_POST)) {
  if (!empty($_POST['name_categories'])) {

    $name_products = htmlspecialchars($_POST['name_products']);
    $name_categories = htmlspecialchars($_POST['name_categories']);
    $price = htmlspecialchars($_POST['price']);
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null;
  }

  if (addProduct($name_products, $name_categories, $price, $description)) {
    redirect('/admin/products');
  } else {
    $error = 'Ошибка при создании продукта';
  }
} else {
  $error = 'Заполните все данные';
}

?>

<h1 class="mb-4">Создание продукта</h1>

<?php
if ($error) {
  showError($error);
}
?>

<form action="#" method="POST">

  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" id="name_products" name="name_products" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Категория</label>
    <select class="form-select" id="category" name="name_categories" required>
      <option value="">Выберите категорию</option>
      <?php
      for ($i = 0; $i < count($categories); $i++) { ?>
        ?>
        <option value="<?= $categories[$i]['id'] ?>"><?= $categories[$i]['name_categories'] ?></option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Цена</label>
    <input type="number" class="form-control" id="price" name="price" step="0.01" required >
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Создать</button>
  <a href="/admin/products/" class="btn btn-secondary">Отмена</a>
</form>

<?php
require_once(getRootPath('templates/footer.php'));
?>