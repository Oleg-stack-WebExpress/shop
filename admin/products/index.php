<?php
require_once(dirname(__DIR__, 2) . '/utils/paths.php');
require_once(getRootPath('templates/header.php'));
require_once(getRootPath('services/auth.php'));
require_once(getRootPath('services/products.php'));
require_once(getRootPath('services/categories.php'));


if (!isAuth()) {
  redirect('/');
}

$s = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : null;

$title = "Админка - Продукты";
$products = getProducts($s);
$categories = getCategories($s);
?>

<h1 class="mb-4">Управление продуктами</h1>


<div class="d-flex justify-content-between mb-4">
  <div>
    <a href="create.php" class="btn btn-success">Добавить продукт</a>
    <a href="../categories" class="btn btn-success">Список категорий</a>
  </div>

  <form action="#" method="GET" class="d-flex">
    <input class="form-control me-2" type="search" name="s" placeholder="Поиск продуктов..." value="<?= $s ?>">
    <button class="btn btn-outline-success" type="submit">Найти</button>
  </form>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Название</th>
      <th>Категория</th>
      <th>Цена</th>
      <th>Описание</th>
      <th>Действия</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($products); $i++): ?>
      <tr>
        <td><?= $products[$i]['id'] ?></td>
        <td><?= $products[$i]['name_products'] ?></td>
        <td><?= $categories[$i]['name_categories'] ?></td>
        <td><?= $products[$i]['price'] ?></td>
        <td><?= $products[$i]['description'] ?></td>
        <td>
          <a href="/admin/products/edit.php?id=<?= $products[$i]['id'] ?>"
            class="btn btn-sm btn-primary">Редактировать</a>
          <a href="/admin/products/remove.php?id=<?= $products[$i]['id'] ?>" class="btn btn-sm btn-danger">Удалить</a>
        </td>
      </tr>
    <?php endfor; ?>
  </tbody>
</table>

<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Назад</a>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Вперед</a>
    </li>
  </ul>
</nav>

<?php require_once(getRootPath('templates/footer.php')); ?>