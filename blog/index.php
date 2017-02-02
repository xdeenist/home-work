<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
session_start();
require_once '/var/www/html/blog/include/db.php';
require_once '/var/www/html/blog/include/valid.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Список записей</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/styless.css">
	</head>
	<body>
    <?php  if (!$_SESSION['logined']):?>
        <p class="error"><?=$error_login;?></p>
    <form action="" method="post" class="admin">
        <input type="text" name="name" placeholder="Введите имя">
        <input type="password" name="password" placeholder="Введите пароль" class="pass">
        <input name="sub" type="submit" value="Отправить">
    </form>
    <?php else: echo "Welcome " . $_SESSION['user']. " ! ";?>
        <a href='?exit' class="ex">Выход</a>
    <?php endif; ?>
		<div id="wrapper">
			<h1>Список записей</h1>
                 <?php
                 require_once '/var/www/html/blog/include/pagination.php';
                 ?>
            <?php if($_SESSION['logined']): ?>
			<div>
				<a href="include/add.php" class="btn btn-danger btn-block">Добавить запись</a>
			</div>
            <?php endif; ?>
		</div>
	</body>
</html>


			