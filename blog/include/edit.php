<?php
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);
require_once '/var/www/html/blog/include/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Редактировать запись</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/styless.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Редактировать запись</h1>
			<p class="nav">
				<a href="../index.php">на главную</a>
			</p>
			<p class="error" style="color: red; font-weight: bolder; text-align: center";><?=$error_tag;?></p>
			<div>
                <?php for($i=0;$i<count($res_select_update);$i++):?>
				<form action="" method="POST">
					<p><input name="time_edit" class="form-control" value="<?=$res_select_update[$i]['post_create_datetime']?>"></p>
					<p><input name="author_edit" class="form-control" value="<?=$res_select_update[$i]['post_title']?>"></p>
				    <?php if ($res_select_update[$i]['tags']) {   // выборка тегов?>
                            <p><input name="tag_edit" class="form-control" value="<?=$res_select_update[$i]['tags']?>"></p>
					     <!-- $value['tags'] = explode(',', $res_select_update[$i]['tags']); -->
                            
				     <?php } else {?> <p><input name="tag_edit" placeholder="можно добавить новые теги" class="form-control"></p><?php }?>
					<p>
                        <textarea placeholder="краткое содержание" class="form-control" name="up_min_article">
                             <?=$res_select_update[$i]['post_min_text']?>
                        </textarea>
                    </p>
                    <p>
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


			