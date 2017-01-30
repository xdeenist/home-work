<?php
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);
require_once '/var/www/html/practice_blog/include/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Редактировать запись</title>
		<link rel="stylesheet" href="../bootstrap3/css/bootstrap.css">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div id="wrapper">
			<h1>Редактировать запись</h1>
			<p class="nav">
				<a href="../index.php">на главную</a>
			</p>

			<div>
                <?php for($i=0;$i<count($res_select_update);$i++):?>
				<form action="" method="POST">
					<p><input name="time_edit" class="form-control" value="<?=$res_select_update[$i]['post_create_datetime']?>"></p>
					<p><input name="author_edit" class="form-control" value="<?=$res_select_update[$i]['post_title']?>"></p>
					<p><input name="tag_edit" placeholder="можно добавить новые теги" class="form-control"></p>
					<p>
                        <textarea placeholder="краткое содержание" class="form-control" name="up_min_article">
                             <?=$res_select_update[$i]['post_min_text']?>
                        </textarea>
					<textarea name="full_edit" class="form-control">
                        <?=$res_select_update[$i]['post_text']?>
		        	</textarea>
					</p>
					<p><input name="save" type="submit" class="btn btn-danger btn-block" value="Сохранить"></p>
				</form>
                <?php endfor;?>
			</div>
			
		</div>

	</body>
</html>


			