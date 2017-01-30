<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
session_start();
require_once '/var/www/html/practice_blog/include/db.php';
require_once '/var/www/html/practice_blog/include/valid.php';
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
            <?php for($i=0;$i<count($res_select);$i++):?>
			<div class="note">
				<p>
					<span class="date"><?=$res_select[$i]['post_create_datetime'];?></span>
					<a href="include/note.php?id=<?=$res_select[$i]['post_id']?>"><?=$res_select[$i]['post_title'];?></a>
				</p>
				<p>
					<?=$res_select[$i]['post_min_text'];?>
				</p>
				<?php if ($res_select[$i]['tags']) {   // выборка тегов
					     $value['tags'] = explode(',', $res_select[$i]['tags']);
					     foreach ($value['tags'] as $tag) {
					     	    //print_r($tag);?>
                                  <span class="print_tag">
                                        <a href='include/posttotag.php?tag=<?=$tag?>'><?="#".$tag?></a>
                                  </span>
					     <?php  } ?>  
				<?php } ?>
                <?php if($_SESSION['logined']): //кнопки удалить и редактировать?> 
				<p class="nav">
					<a href="index.php?page=<?=$res_select[$i]['post_id']?>&del=<?=$res_select[$i]['post_id']?>">удалить</a> |
					<a href="include/edit.php?id=<?=$res_select[$i]['post_id']?>">редактировать</a>
				</p>
                <?php endif;?>
			</div>
            <?php endfor;?>

            <?php if($_SESSION['logined']): ?>
			<div>
				<a href="include/add.php" class="btn btn-danger btn-block">Добавить запись</a>
			</div>
            <?php endif; ?>
		</div>

	</body>
</html>


			