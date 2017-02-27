<?php
require_once '../model/add.class.php';
session_start(); 
/**
* 
*/
class AddBook extends Add
{
	public $blacklist;
	public $img_type;
	public $book_type;
	
	function __construct()
	{
		if (!$_SESSION['login']) {
			header("Location: ../index.php");
		}
	}

	public function AddDbFileImg($uploaddir_img){
		if ($_FILES['myfile_img']['error'] == 0) {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$im_type = $this->img_type;
				if (parent::FileSecure($im_type, "myfile_img")) {					
					if ($_FILES["myfile_img"]["size"] > 1024*3*1024) {
						return $error_add = "Размер изображения превышает 3 мегабайта";
						exit;
						}
						$file_ex = new SplFileInfo(basename($_FILES['myfile_img']['name']));
						$file_extension = $file_ex->getExtension();	
								$uploadfile = $uploaddir_img . basename($_FILES['myfile_img']['tmp_name']  . "." . $file_extension);
						if (copy($_FILES['myfile_img']['tmp_name'], $uploadfile)) {
							$upload_name = basename($_FILES['myfile_img']['tmp_name']  . "." . $file_extension);
							return $upload_img_name = $upload_name;
						} else  { 
			    			    return $error_add = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; 
			    			    exit; 
			   				    }
				} else { return $add_img = false; }			
			}
		}
	}

	public function AddDbFileBook($uploaddir){
		if ($_FILES['myfile_book']['error'] == 0) {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$b_type = $this->book_type;
				if ($_FILES["myfile_img"]["size"] > 1024*3*1024) {
					return $add_img = false;
				exit;
				}
				if (parent::FileSecure($b_type, "myfile_book")) {					
					$file_ex = new SplFileInfo(basename($_FILES['myfile_book']['name']));
					$file_extension = $file_ex->getExtension();	
					$uploadfile = $uploaddir . basename($_FILES['myfile_book']['tmp_name']  . "." . $file_extension);
					if (copy($_FILES['myfile_book']['tmp_name'], $uploadfile)) {
						$upload_name = basename($_FILES['myfile_book']['tmp_name']  . "." . $file_extension);
						return $upload_book_name = $upload_name;
					} else  { 
			    		    return $error_add = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; 
			    		    exit; 
			   				}
				} else { return $add_img = false; }			
			}
		}
	}

	public function AddDb($uploaddir, $uploaddir_img){
		if (isset($_POST['add_save'])) {
		    if (isset($_POST['book_name']) && isset($_POST['serial']) && isset($_POST['author']) && isset($_POST['discr']) && isset($_POST['edition_add']) && isset($_POST['year_add']) && isset($_POST['genre_add'])) {
			    if (is_numeric($_POST['year_add'])) {
			    	$datetime = date('Y-m-d H:i:s');
			    	$upload_name_img = $this->AddDbFileImg($uploaddir_img);
			    	$upload_name_book = $this->AddDbFileBook($uploaddir);
			    	if ($upload_name_book) {
			    		$arr_exec = array(":book_n" => $_POST['book_name'], ":book_ser" => $_POST['serial'], ":auth" => $_POST['author'], ":disc" => $_POST['discr'], ":edition" => $_POST['edition_add'], ":year" => $_POST['year_add'], ":gen_add" => $_POST['genre_add'], ":create_datetime" => $datetime, ":i_file" => $upload_name_img, ":b_file" => $upload_name_book, ":us_id" => $_SESSION['user_id']);
			   	    	$ins = parent::insert('INSERT INTO books SET book_name = :book_n, book_serial = :book_ser, author = :auth, discr = :disc, edition_add = :edition, year_add = :year, genre_add = :gen_add, book_create_datetime = :create_datetime, book_img = :i_file, book_file = :b_file, user_id = :us_id', $arr_exec);
			   	    	if (isset($_POST['rate_add'])) {
			   	    		$last = parent::LastInsert();
			   	    		$ins_rate = array(":rate" => $_POST['rate_add'], ":book_id" => $last, ":user_id" => $_SESSION['user_id']);
			   	    		$inser = parent::insert('INSERT INTO rate SET book_id = :book_id, user_id = :user_id, rate = :rate ', $ins_rate);
			   	    	}
			   	    	header("Location: ../view/cabinet.php");
			   	    } else {return $error_add = "Вы неправильно загрузили книгу";}
			    } else {return $error_add = "Вы неправильно ввели год";}
		    } else {return $error_add = "Вы не заполнили все поля!";}
		} 
	}
}

$add = new AddBook();
$add->img_type = array("jpg", "jpeg", "png");
$add->book_type = array("FB2", "MOBI", "PDF", "RTF", "TXT", "DOC", "DOCX", "doc", "fb2", "mobi", "pdf", "rtf", "txt", "docx");
$add_err = $add->AddDb('../files/', '../files/img/');