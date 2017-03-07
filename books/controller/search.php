<?php 
	require_once '../model/select.class.php';

/**
* 
*/
class Search extends Select
{
	
	function __construct()
	{
		if (isset($_POST['search_submit'])) {
			if (!empty($_POST['search'])) {
				header("Location: ../view/list.php?search=" . "%" . $_POST['search'] . "%");
			}
		}
	}

	public function SearchBook(){
		if (!empty($_GET['search'])) {
			return $res_sel_book = parent::selectAll("SELECT book_name, book_id FROM books WHERE book_name LIKE " . "'" . $_GET['search'] . "'");
		}
	}

	public function SearchAuthor(){
		if (!empty($_GET['search'])) {
			return $res_sel_author = parent::selectAll("SELECT DISTINCT author FROM books WHERE author LIKE ". "'" . $_GET['search']. "'");
		}
	}

	public function SearchSerial(){
		if (!empty($_GET['search'])) {
			return $res_sel_serial = parent::selectAll("SELECT DISTINCT book_serial FROM books WHERE book_serial LIKE ". "'" . $_GET['search']. "'");
		}
	}

	public function SearcEdition(){
		if (!empty($_GET['search'])) {
			return $res_sel_edition = parent::selectAll("SELECT DISTINCT edition_add FROM books WHERE edition_add LIKE ". "'" . $_GET['search']. "'");
		}
	}
}

$serch = new Search();
$res_sel_book = $serch->SearchBook();
$res_sel_author = $serch->SearchAuthor();
$res_sel_serial = $serch->SearchSerial();
$res_sel_edition = $serch->SearcEdition();
