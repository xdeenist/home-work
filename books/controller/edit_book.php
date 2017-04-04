<?php 
require_once 'add_book.php';
require_once 'delete.php';
if (!isset($_SESSION)) {
	session_start();
}

// var_dump($_SESSION);
/**
* 
*/
class EditBook extends AddBook
{
	
	function __construct()
	{
		if (isset($_GET['edit'])) {		
			$user = parent::selectAll("SELECT user_id FROM books WHERE book_id=" . $_GET['edit']);
			if ($user[0]['user_id'] == $_SESSION['user_id'] || $_SESSION['userstatus'] == "admin") {
			} else {header("Location: ../index.php");}
		}
	}

	public function DelItem($name, $folder){
		$filename = "../files/" . $folder . $name;
		if ($name) {
			if(file_exists($filename)){
			unlink($filename);
			}
		}
	}

	public function EditUpdate($uploaddir, $uploaddir_img){
		if (isset($_POST['edit_save'])) {
			if (isset($_POST['book_name_edit']) && isset($_POST['serial_edit']) && isset($_POST['author_edit']) && isset($_POST['discr_edit']) && isset($_POST['edition_edit']) && isset($_POST['year_edit']) && isset($_POST['genre_add'])) {
				if (is_numeric($_POST['year_edit'])) {
					$upload_name_img = parent::AddDbFileImg($uploaddir_img);
					$upload_name_book = parent::AddDbFileBook($uploaddir);
					$select_genre_id = parent::GetGenreId($_POST['genre_add']);
					$id = $_GET['edit'];
					if (!$upload_name_book) {
						$get_book = parent::selectAll("SELECT book_file FROM books WHERE book_id = '$id'");
						$get_book_name = $get_book[0]['book_file'];
					} else {
						$get_book_name = $upload_name_book; 
						$get_book_for_del = parent::selectAll("SELECT book_file FROM books WHERE book_id = '$id'");
						$delfile = $this->DelItem($get_book_for_del[0]['book_file'],"");
					}
					if (!$upload_name_img) {
						$get_img = parent::selectAll("SELECT book_img FROM books WHERE book_id = '$id'");
						$get_img_name = $get_img[0]['book_img'];
						
					} else {
						$get_img_name = $upload_name_img;
						$get_img_for_del = parent::selectAll("SELECT book_img FROM books WHERE book_id = '$id'");
						$delfile = $this->DelItem($get_img_for_del[0]['book_img'],"img/");
					}			
					
					if ($get_book_name) {
						$update_param = array(":book_n" => $_POST['book_name_edit'], ":book_ser" => $_POST['serial_edit'], ":auth" => $_POST['author_edit'], ":disc" => $_POST['discr_edit'], ":edition" => $_POST['edition_edit'], ":year" => $_POST['year_edit'], ":gen_add" => $select_genre_id[0]['genre_id'], ":i_file" => $get_img_name, ":b_file" => $get_book_name);
						$update = parent::update("UPDATE books SET book_name = :book_n, book_serial = :book_ser, author = :auth, discr = :disc, edition_add = :edition, year_add = :year, genre_add_id = :gen_add, book_img = :i_file, book_file = :b_file WHERE book_id = $id", $update_param );
						header("Location: ../view/cabinet.php");
					} else{ return $error_edit = "Вы неправильно загрузили книгу"; }
				} else { return $error_edit = "Вы неправильно ввели год"; }
			} else { return $error_edit = "Вы не заполнили все поля!"; }
		}
	}
}

$edit= new EditBook();
$edit_err = $edit->EditUpdate('../files/', '../files/img/');		