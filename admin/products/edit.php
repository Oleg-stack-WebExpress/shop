<?php
$title = "Админка - Редактирование товара";
require_once('../../templates/header.php');

// Предполагаем, что ID товара передается через GET параметр
$product_id = $_GET['id'] ?? 0;
?>

<h1 class="mb-4">Редактирование товара #<?php echo $product_id; ?></h1>

<form>
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" id="name" value="Товар <?php echo $product_id; ?>" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Категория</label>
    <select class="form-select" id="category" required>
      <option value="">Выберите категорию</option>
      <option value="1" selected>Категория 1</option>
      <option value="2">Категория 2</option>
      <option value="3">Категория 3</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Цена</label>
    <input type="number" class="form-control" id="price" value="<?php echo rand(100, 1000); ?>" step="0.01" required>
  </div>

  <div class="mb-3">
    <label for="quantity" class="form-label">Количество</label>
    <input type="number" class="form-control" id="quantity" value="<?php echo rand(0, 50); ?>" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea class="form-control" id="description" rows="3">Описание товара <?php echo $product_id; ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Сохранить</button>
  <a href="index.php" class="btn btn-secondary">Отмена</a>
</form>

<?php require_once('../../templates/footer.php'); ?>