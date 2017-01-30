<?php
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);
require_once '/var/www/html/practice_blog/include/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Новая запись</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Новая запись</h1>
			<p class="nav">
				<a href="../index.php">на главную</a>
			</p>
			<!-- 
			
				После сохранения перебрасывает 
				на список записей
				с помощью header location
			
			-->
			<div>
				<form action="" method="POST">
					<p><input name="post_title_add" class="form-control" placeholder="Название записи"></p>
					<p><input name="tag_add" class="form-control" placeholder="Теги (через запятую, без '#')"></p>
					<p><textarea name="post_min_text_add" placeholder="Краткое содержание статьи" class="form-control" cols="10" rows="20"></textarea></p>
					<p><textarea name="post_text_add" class="form-control" placeholder="Текст записи"></textarea></p>
					<p><input type="submit" class="btn btn-danger btn-block" value="Сохранить"></p>
				</form>
			</div>
			
		</div>

	</body>
</html>


			