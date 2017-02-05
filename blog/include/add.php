<?php
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);
require_once '/var/www/html/blog/include/db.php';
require_once '/var/www/html/blog/include/img.php';

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Новая запись</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/styless.css">
	</head>
	<body>
	    
		<div id="wrapper">
			<h1>Новая запись</h1>
			<?php
			     require_once '/var/www/html/blog/include/img.php';
			?>
			<p class="nav">
				<a href="../index.php">на главную</a>
			</p>
			<p class="error" style="color: red; font-weight: bolder; text-align: center";><?=$error_post;?>
			<p class="error" style="color: red; font-weight: bolder; text-align: center";><?=$error_img_load;?>	
			<div>
				<form action="" method="post" enctype="multipart/form-data">
					<p><input name="post_title_add" class="form-control" placeholder="Название записи"></p>
					<p><input name="tag_add" class="form-control" placeholder="Теги (через запятую, без '#')"></p>
					<p><textarea name="post_min_text_add" placeholder="Краткое содержание статьи" class="form-control" cols="10" rows="20"></textarea></p>
					<p><textarea name="post_text_add" class="form-control" placeholder="Текст записи"></textarea></p>
                    <label for="file">Добавить изображение:</label>
    				<input type="file" name="myfile" id="file"><br>
					<p><input type="submit" name="add_save" class="btn btn-danger btn-block" value="Сохранить"></p>
				</form>
			</div>
			
		</div>

	</body>
</html>


			