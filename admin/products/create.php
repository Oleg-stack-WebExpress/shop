<?php
$title = "Админка - Создание товара";
require_once('../../templates/header.php');
?>

<h1 class="mb-4">Создание товара</h1>

<form>
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" id="name" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Категория</label>
    <select class="form-select" id="category" required>
      <option value="">Выберите категорию</option>
      <option value="1">Категория 1</option>
      <option value="2">Категория 2</option>
      <option value="3">Категория 3</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Цена</label>
    <input type="number" class="form-control" id="price" step="0.01" required>
  </div>

  <div class="mb-3">
    <label for="quantity" class="form-label">Количество</label>
    <input type="number" class="form-control" id="quantity" required>
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