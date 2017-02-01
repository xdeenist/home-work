<?php
session_start();
require_once'/var/www/html/blog/include/db.php';
require_once'/var/www/html/blog/include/note.php';
function comment($row){
	echo "<p class=\"comment\">";
	echo "<div class=\"date\">". $row['comment_username']. " " . $row['comment_datetime'] ."</div>";
	echo "<div class=\"text\">" . $row['comment_text'] . "</div>";
	echo "<a href='?id=" . $_GET['id'] . "&comment=" . $row['comment_id'] . "'>Ответить</a> ";
    if ($_SESSION['logined']) {
    	echo " | <a href='?id=" . $_GET['id'] . "&comment_del=" . $row['comment_id'] . "'>Удалить</a> ";
    }



    $link = new PDO('mysql:host=localhost;dbname=blog', 'level', 'pass');




		$res = $link ->query("SELECT * FROM comment WHERE comment_parent_id=".$row['comment_id']);

		if ( $res->rowCount() > 0) {
			echo "<ul>";
			      while ($res_com = $res ->fetch(PDO::FETCH_ASSOC)) {
			      	    comment($res_com);
			      }

			     	 
			     
			echo "</ul>";
		}
	echo "</p>";
}




?>
