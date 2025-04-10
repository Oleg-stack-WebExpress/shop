<?

require_once('services/auth.php');

?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?? 'Магазин'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>


    <!--Верстка-->
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <div class="container">
            <a class="navbar-brand" href="index.php">Магазин</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Главная</a>
                    </li>

                    <!--вставка php для включения алгоритмов администратора-->
                    <?php if (isset($is_admin) && $is_admin): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                                data-bs-toggle="dropdown">
                                Админка
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin/products">Товары</a></li>
                                <li><a class="dropdown-item" href="admin/categories">Категории</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>
                <ul class="navbar-nav">


                    <!--проверяет авторизирован ли пользователь-->
                    <?php if (isAuth()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout.php">Выйти</a>
                        </li>
                        <!--показывает войти и регистрацию, если пользователь неавторизован-->
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="auth.php">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Регистрация</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">