<?php
session_start();

$title = "Главная";
require_once('services/products.php');
require_once('templates/header.php');
?>


<!--Верстка-->
<h1 class="mb-3">Продукты</h1>

<div class="row mb-3">
    <div class="col-md-3">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Поиск продуктов...">
            <button class="btn btn-outline-success" type="submit">Найти</button>
        </form>
    </div>
</div>

<div class="row">

    <!--Вставка php, которая задает нужное количество карточек продуктов по номерам-->
    <?php for ($i = 1; $i <= 8; $i++): ?>
        <div class="col-md-3 mb-3">
            <div class="card h-55">
                <div class="card-body">
                    <h5 class="card-title">Продукт <?php echo $i; ?></h5>
                    <p class="card-text">Текст продукта <?php echo $i; ?>. Что такое продукт? Зачем нужен продукт?
                    </p>
                    <p class="text-muted">Цена: <?php echo rand(1000, 20000); ?> руб.</p>
                    <a href="#" class="btn btn-success">В корзину</a>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>


<!--Верстка переключателя страниц-->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item ">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

<?php require_once('templates/footer.php') ?>