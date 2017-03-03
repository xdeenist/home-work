<?php 
require_once 'add_book.php';
require_once 'delete.php';

/**
* 
*/
class EditBook extends AddBook
{
	
	function __construct()
	{
		# code...
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
					} else {$get_book_name = $upload_name_book; }
					if (!$upload_name_img) {
						$get_img = parent::selectAll("SELECT book_img FROM books WHERE book_id = '$id'");
						$get_img_name = $get_img[0]['book_img'];
					} else {$get_img_name = $upload_name_img;}			
					
					if ($get_book_name) {
						$update_param = array(":book_n" => $_POST['book_name_edit'], ":book_ser" => $_POST['serial_edit'], ":auth" => $_POST['author_edit'], ":disc" => $_POST['discr_edit'], ":edition" => $_POST['edition_edit'], ":year" => $_POST['year_edit'], ":gen_add" => $select_genre_id[0]['genre_id'], ":i_file" => $get_img_name, ":b_file" => $get_book_name, ":genre_title" => $_POST['genre_add']);
						$update = parent::update("UPDATE books SET book_name = :book_n, book_serial = :book_ser, author = :auth, discr = :disc, edition_add = :edition, year_add = :year, genre_add_id = :gen_add, book_img = :i_file, book_file = :b_file, genre_add_title = :genre_title WHERE book_id = $id", $update_param );
					} else{ return $error_edit = "Вы неправильно загрузили книгу"; }
				} else { return $error_edit = "Вы неправильно ввели год"; }
			} else { return $error_edit = "Вы не заполнили все поля!"; }
		}
	}
}

$edit= new EditBook();
$edit_err = $edit->EditUpdate('../files/', '../files/img/');		