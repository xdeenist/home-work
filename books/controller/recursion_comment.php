<?php 
require_once '../model/select.class.php';
// session_start();
/**
* 
*/
class RecursionCom extends Select
{
	
	function __construct()
	{
	}

	public function SelectCommentNoParrent(){
		$result_comment = parent::selectAll("SELECT * FROM comment WHERE book_id = '{$_GET['id']}'and comment_parent_id is NULL");
		for ($i=0; $i < count($result_comment); $i++) { 
			$this->SelectCommentParrent($result_comment[$i]);
		}
	}

	public function SelectCommentParrent($arr){ ?>
		<div style="margin-left: 20px; margin-bottom: 10px; margin-top: 10px">
		<div class="s_review last">
        	<p class="s_author"><strong><?=$arr['comment_username']?></strong><small>(<?=$arr['comment_datetime']?>)</small></p>
        	<div class="clear"></div>
        	<H4><?=$arr['comment_text']?></H4>
        	<a href="../view/view.php?id=<?=$_GET['id']?>&comment=<?=$arr['comment_id']?>#answer" class="s_main_color left" style=""><strong>Ответить</strong></a>
        	<?php if ($_SESSION['userstatus'] == "admin" || $arr['comment_username'] == $_SESSION['user']) { ?>
        		<a href="../view/view.php?id=<?=$_GET['id']?>&comment_edit=<?=$arr['comment_id']?>#edit" class="s_main_color" style="margin-left: 25px;"><strong>Редактировать</strong></a>
        		<a href="../view/view.php?id=<?=$_GET['id']?>&comment_del=<?=$arr['comment_id']?>" class="s_main_color left" style="margin-left: 25px"><strong>Удалить</strong></a>
        	<?php } ?>
			</div> <?php

		$result_comment_par = parent::selectAll("SELECT * FROM comment WHERE book_id = '{$_GET['id']}'and comment_parent_id =" . $arr['comment_id']);
		for ($i=0; $i < count($result_comment_par); $i++) { 
			 $this->SelectCommentParrent($result_comment_par[$i]);
		}
		?> 		
		</div> 
		<?php
	}
}
$selcom = new RecursionCom();
$selcom->SelectCommentNoParrent();
