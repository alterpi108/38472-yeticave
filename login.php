<?php
require_once './functions.php';
require_once './userdata.php';

$errors = [];

if (isset($_POST)) {
  $errors = validateForm($_POST);
}

if (!empty($_POST) && !$errors) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($user = searchUserByEmail($email, $users)) {
    if (password_verify($password, $user['password'])) {
      session_start();
      $_SESSION['user'] = $user;
      header("Location: /index.php");
    }
    else {
      $errors['password'] = 'Вы ввели неверный пароль';
    }
  } else {
    $errors['email'] = 'Почта не найдена';
  }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?= includeTemplate('templates/header.php') ?>
<?= includeTemplate('templates/login.php', ['errors' => $errors]) ?>
<?= includeTemplate('templates/footer.php') ?>

</body>
</html>