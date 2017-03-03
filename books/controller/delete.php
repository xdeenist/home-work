<?php 
require_once '../model/select.class.php';

/**
* 
*/
class Delete extends Select
{
	
	function __construct()
	{
		# code...
	}

	public function Delete($name, $folder){
		$filename = "../files/" . $folder . $name;
		if(file_exists($filename)){
			unlink($filename);
		}
	}
	public function DelImg(){
		if ($_POST{'myfile_img_del'}) {
			$id = $_GET['edit'];
			$img_name = parent::selectAll("SELECT book_img FROM books WHERE book_id  = '$id'");
			$del_file = $this->Delete($img_name[0]['book_img'], "img/");
			$param = array(":img_name" => "");
			$gel_img_db = parent::update("UPDATE books SET book_img = :img_name WHERE book_id = '$id'", $param);
		}
	}
}

$del = new Delete();
$del_img = $del->DelImg();