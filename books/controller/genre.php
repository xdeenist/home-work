<?php
require_once '../model/genre.class.php';

/**
* 
*/
class DefaultGenre extends Genre
{
	
	function __construct()
	{
		# code...
	}

	public function GetDefaultGenre(){
		if ($_GET['edit']) {
			$id = $_GET['edit'];
			return $defaultgenre = parent::selectAll("SELECT genre_add_title FROM books LEFT JOIN genre_list ON (genre_list.genre_id = books.genre_add_id) WHERE book_id = '$id'");
		}
	}
}


$sections = new Genre();
$result = $sections->selectAll("SELECT * FROM genre_list");
$get = new DefaultGenre();
$defaultgenre = $get->GetDefaultGenre();

