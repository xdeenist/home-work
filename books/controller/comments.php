<?php 
require_once '../model/select.class.php';
// session_start();
/**
* 
*/
class Comments extends Select
{
	
	function __construct()
	{
	}

	public function EditCommSelect(){
		if (is_numeric(isset($_GET['comment_edit']))) {
			return $select_com_edit = parent::selectAll("SELECT comment_text FROM comment WHERE comment_id =" . $_GET['comment_edit']);
		}
	}

	public function EditCommIns(){
		if (isset($_POST['save_edit_comment'])) {
			if (!empty($_POST['comment_text_edit'])) {
				$update_param = array(":commenttext" => $_POST['comment_text_edit']);
				$res_update = parent::update("UPDATE comment SET comment_text = :commenttext WHERE comment_id =" . $_GET['comment_edit'], $update_param);
				$id = $_GET['id'];
				header("Location: ../view/view.php?id=$id");
			} else {return $err_edit  = "Это поле не может быть пустым";}
		} 
	}

	public function AddComment(){
		if ($_GET['comment'] == "mine") {
			$add_param = array(":bookid" => $_GET['id'], ":com_user" => $_SESSION['user'], ":commtext" => $_POST['comment_text']);
			$add_comment = parent::insert("INSERT INTO comment SET book_id = :bookid, comment_username = :com_user, comment_text = :commtext", $add_param);
			$id = $_GET['id'];
			header("Location: ../view/view.php?id=$id");
		} elseif (is_numeric($_GET['comment'])) {
			$add_param = array(":bookid" => $_GET['id'], ":comm_par_id" => $_GET['comment'], ":com_user" => $_SESSION['user'], ":commtext" => $_POST['comment_text']);
			$add_comment = parent::insert("INSERT INTO comment SET book_id = :bookid, comment_username = :com_user, comment_parent_id = :comm_par_id, comment_text = :commtext", $add_param);
			$id = $_GET['id'];
			header("Location: ../view/view.php?id=$id");
		}		
	}

	public function Comment(){
		if (isset($_POST['save_comment'])) {
			if (isset($_POST['comment_text'])) {
				$this->AddComment();
			}
		}
	}

	public function DelComment(){
		if (isset($_GET['comment_del'])) {
			$user = parent::selectAll("SELECT comment_username FROM comment WHERE comment_id=" . $_GET['comment_del']);
			if ($user[0]['comment_username'] == $_SESSION['user'] || $_SESSION['user'] == "admin") {
				$DelComment = parent::DeleteItem("DELETE FROM comment WHERE comment_id=" . $_GET['comment_del']);
				$id = $_GET['id'];
				header("Location: ../view/view.php?id=$id");
			}
		}
	}
}

$comment = new Comments();
$comm = $comment->Comment();
$err_edit = $comment->EditCommIns();
$select_com_edit = $comment->EditCommSelect();
$del = $comment->DelComment();

