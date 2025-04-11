<?php
$title = "Авторизация";

require_once('services/commons.php');
require_once('services/auth.php');


//Ищет пользователя в сессии
if (isAuth()) {
  redirect('/admin/products');
}


//Находит ключи и отправляет в админку
$error = null;
if (array_key_exists('email', $_POST) && array_key_exists('password', $_POST)) {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  if (login($email, $password)) {
    redirect('/admin/products');
  } else {
    $error = 'Ошибка входа!';
  }
}

require_once('templates/header.php');

?>

<?php
if ($error) {
  showError($error);
}
?>

<!--Верстка-->
<div class="row justify-content-left">
  <div class="col-md-4">
    <h1 class="text-center mb-4">Вход на сайт</h1>

    <form method="POST" action="#">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-success w-99">Войти</button>
    </form>

    <div class="mt-2 text-center">
      <p>Не заведена учетная запись? <a href="register.php">Завести учетную запись</a></p>
    </div>
  </div>
</div>

<?php require_once('templates/footer.php') ?>