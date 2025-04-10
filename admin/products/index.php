<?php
$title = "Админка - Товары";
require_once('../../templates/header.php');
?>

<h1 class="mb-4">Управление товарами</h1>

<div class="d-flex justify-content-between mb-4">
  <div>
    <a href="create.php" class="btn btn-success">Добавить товар</a>
    <a href="categories.php" class="btn btn-success">Список категорий</a>
  </div>

  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Поиск товаров...">
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
      <th>Количество</th>
      <th>Действия</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 1; $i <= 10; $i++): ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td>Товар <?php echo $i; ?></td>
        <td>Категория <?php echo rand(1, 3); ?></td>
        <td><?php echo rand(100, 1000); ?> руб.</td>
        <td><?php echo rand(0, 50); ?></td>
        <td>
          <a href="edit.php?id=<?php echo $i; ?>" class="btn btn-sm btn-primary">Редактировать</a>
          <button class="btn btn-sm btn-danger">Удалить</button>
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

<?php require_once('../../templates/footer.php');  ?>