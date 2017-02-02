<?php
session_start();
// require_once'/var/www/html/blog/include/note.php';


//рекурсивная функция изъятия комментариев
function comment($row){ ?>
        <div style="margin-left: 30px">
	        <div class="date"><?=$row['comment_username'] . " " . $row['comment_datetime'] ?></div>
	        <div class="text"><?=$row['comment_text']?></div>
	        <a href='?id=<?=$_GET['id']?>&comment=<?=$row['comment_id']?>'>Ответить</a> 
        <?php if ($_SESSION['logined']) { ?>
    	    | <a href='?id=<?=$_GET['id']?>&comment_del=<?=$row['comment_id']?>'>Удалить</a> 
        <?php }

        
        try {
             $link = new PDO('mysql:host=localhost;dbname=blog', 'level', 'pass');
            } catch (PDOException $e) {
             print "Error!: " . $e->getMessage() . "<br/>";
            die();
        } 

		$res = $link ->query("SELECT * FROM comment WHERE comment_parent_id=".$row['comment_id']);

		if ( $res->rowCount() > 0) {
			      while ($res_com = $res ->fetch(PDO::FETCH_ASSOC)) {
			      	    comment($res_com);
			      }
		}?>
	    </div>
	    <?php
}
?>
