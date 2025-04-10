<?php
$title = "Админка - Редактирование категории";
require_once('../../templates/header.php');

$category_id = $_GET['id'] ?? 0;
?>

<h1 class="mb-4">Редактирование категории #<?php echo $category_id; ?></h1>

<form>
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" id="name" value="Категория <?php echo $category_id; ?>" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea class="form-control" id="description" rows="3">Описание категории <?php echo $category_id; ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Сохранить</button>
  <a href="index.php" class="btn btn-secondary">Отмена</a>
</form>

<?php require_once('../../templates/footer.php'); ?>