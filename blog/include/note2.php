<?php
 // error_reporting(E_ALL);
 // ini_set('display_errors', 1);
session_start();
require_once '/var/www/html/blog/include/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Моя заметка № <?=$_GET['id']; ?></title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/styless.css">
	</head>
	<body>
		<div id="wrapper">
            <?php for($i=0;$i<count($res_select_update);$i++):?>
			<h1><?=$res_select_update[$i]['post_title']?></h1>
			<div>
				<p class="nav right">
					<a href="../index.php">на главную</a>
				</p>
				<p class="date"><?=$res_select_update[$i]['post_create_datetime']?>
				</p>
				<p>
                    <?=$res_select_update[$i]['post_text'];?>
                </p>
                <p>
                	<?php if ($res_select_update[$i]['tags']) {   // выборка тегов
					     $value['tags'] = explode(',', $res_select_update[$i]['tags']);
					        foreach ($value['tags'] as $tag) {
					     	    //print_r($tag);?>
                                <span class="print_tag">
                                    <a href='../include/posttotag.php?tag=<?=$tag?>'><?="#".$tag?></a>
                                  </span>
					     <?php  } ?>  
				<?php } ?>
                </p>
                <a href='?id=<?=$_GET['id']?>&comment=mine'>Оставить комментарий</a>
                <h4>Комментарии:</h4>
            <?php endfor;
                function recurcion($select_comment){
                    for ($k=0; $k < count($select_comment); $k++) { 
                                   if(is_null($select_comment[$k]['comment_parent_id'])){?>
                                      <div class="comment">
                          <p class="date"><?=$select_comment[$k]['comment_username'] . " " . $select_comment[$k]['comment_datetime']?> </p>
                          <p><?=$select_comment[$k]['comment_text']?></p>
                          <a href='?id=<?=$_GET['id']?>&comment=<?=$select_comment[$k]['comment_id']?>'>Ответить</a> 
                          <?php  if ($_SESSION['logined']){?> 
                          | <a href='?id=<?=$_GET['id']?>&comment_del=<?=$select_comment[$k]['comment_id']?>'>Удалить</a>
                          <?php }?>
                        </div>
                                  <?php } else { for ($i =0; $i < count($select_comment); $i++){
                                  
                                                if($select_comment[$i]['comment_id'] == $select_comment[$i]['comment_parent_id']){ 

                                                ?>

                                                  <div class="comment">
                                                  <p class="date"><?=$select_comment[$i]['comment_username'] . " " . $select_comment[$i]['comment_datetime']?> </p>
                                                  <p><?=$select_comment[$i]['comment_text']?></p>
                                                  <a href='?id=<?=$_GET['id']?>&comment=<?=$select_comment[$k]['comment_id']?>'>Ответить</a> 
                                                  <?php  if ($_SESSION['logined']){?> 
                                                  | <a href='?id=<?=$_GET['id']?>&comment_del=<?=$select_comment[$k]['comment_id']?>'>Удалить</a>
                                               <?php }
                                       }
                                     }
                                  } 
                                  ?>


                    <?php }}recurcion($select_comment);
                if (!empty($_GET['comment'])) {
                    ?>
                    <form method="POST">
                            <p>
                                <input name="comment_name" placeholder="ваше имя" class="form-control">
                            </p>
                            <p>
                                <textarea placeholder="  ваш коментарий" name="comment_text" cols="77" rows="5"></textarea>
                            </p>
                            <p>
                                <input name="save_comment" type="submit" class="btn btn-danger btn-block" value="Отправить">
                            </p>
                    </form>
                 <?php }?>
			</div>
		</div>

	</body>
</html>

