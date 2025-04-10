<?php
$title = "Админка - Категории";
require_once('../../templates/header.php');
?>

<h1 class="mb-4">Управление категориями</h1>

<div class="d-flex justify-content-between mb-4">
  <a href="create.php" class="btn btn-success">Добавить категорию</a>
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Поиск категорий...">
    <button class="btn btn-outline-success" type="submit">Найти</button>
  </form>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Название</th>
      <th>Описание</th>
      <th>Действия</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td>Категория <?php echo $i; ?></td>
        <td>Описание категории <?php echo $i; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $i; ?>" class="btn btn-sm btn-primary">Редактировать</a>
          <button class="btn btn-sm btn-danger">Удалить</button>
        </td>
      </tr>
    <?php endfor; ?>
  </tbody>
</table>


<?php require_once('../../templates/footer.php');  ?>