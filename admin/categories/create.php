<?php
$title = "Админка - Создание категории";
require_once('../../templates/header.php');
?>

<h1 class="mb-4">Создание категории</h1>

<form>
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" id="name" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea class="form-control" id="description" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Создать</button>
  <a href="index.php" class="btn btn-secondary">Отмена</a>
</form>

<?php
require_once('../../templates/footer.php');
?>