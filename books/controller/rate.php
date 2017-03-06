<?php 
 require_once '../model/select.class.php';
session_start();
/**
* 
*/
class AddRate extends Select
{
	
	function __construct()
	{
	}

	public function BookRateAddDb(){
		if ($_GET['star']) {
			$check_user = parent::selectAll("SELECT * FROM rate WHERE user_id = '{$_SESSION['user_id']}' AND book_id = '{$_GET['id']}'");
			if ($check_user[0]['rate']) {
				$update_rate = parent::update("UPDATE rate SET rate = '{$_GET['star']}' WHERE user_id = '{$_SESSION['user_id']}' AND book_id = '{$_GET['id']}'");				
				$id = $_GET['id'];
				header("Location: ../view/view.php?id=$id");
			} else {
				$ins_param = array(":bookid" => $_GET['id'], ":userid" => $_SESSION['user_id'], ":rate" => $_GET['star']);
				$ins_rate = parent::insert("INSERT INTO rate SET book_id = :bookid, user_id = :userid, rate = :rate", $ins_param);
				$id = $_GET['id'];
				header("Location: ../view/view.php?id=$id");
			}
		}
	}

}

$rate = new AddRate();
$addrate = $rate->BookRateAddDb();