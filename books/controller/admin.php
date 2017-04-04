<?php 
require_once 'select_with_rate.php';
session_start();
/**
* 
*/
class Admin extends SelectWithRate
{
	
	function __construct()
	{
		if (!$_SESSION['login'] || $_SESSION['userstatus'] !== "admin") {
			header("Location: ../view/cabinet.php");
		}

		if (isset($_POST['search_user_submit'])) {
			if (!empty($_POST['user_search'])) {
				header("Location: ../view/admin.php?searchuser=" . "%" . $_POST['user_search'] . "%");
			}
		}
	}

	public function HashPwd(){	
		$salt = strlen($_POST['user_pwd']);
		$hashpass = md5($_POST['user_pwd']) . $salt;
		return $hashpass;
	}

	public function SearchUser(){
		if (!empty($_GET['searchuser'])) {
			return $res_user = parent::selectAll("SELECT * FROM users WHERE user_login LIKE " . "'" . $_GET['searchuser'] . "'");
		}
	}

	public function UserSelect(){
		if (!empty($_GET['userid'])) {
			return $res_sel_user = parent::selectAll("SELECT books.*, genre_list.genre_add_title FROM books LEFT JOIN genre_list ON (genre_list.genre_id = books.genre_add_id) WHERE user_id = '{$_GET['userid']}'");
		}
	}

	public function User(){
		if (!empty($_GET['userid'])) {
			return $res_from_user = parent::selectAll("SELECT * FROM users WHERE user_id = '{$_GET['userid']}'");
		}
	}

	public function AddRateUserSelect(){
		return $res_sel_user = parent::AddRate($this->UserSelect());
	}

	public function EditUser(){
		if (isset($_POST['user_save'])) {
			if (!empty($_POST['user_pwd'])) {
				$pwd = $this->HashPwd();
				$param = array(":login" => $_POST['user_log'], ":pwd" => $pwd, ":email" => $_POST['user_email'], ":status" => $_POST['user_stat']);
				parent::insert('UPDATE users SET user_login = :login, user_pass = :pwd, user_status = :status, email = :email WHERE user_id =' . $_GET['userid'], $param );
                return $true_s = "Данные сохранены";
			} else {
				$param = array(":login" => $_POST['user_log'], ":email" => $_POST['user_email'], ":status" => $_POST['user_stat']);
				parent::insert('UPDATE users SET user_login = :login, user_status = :status, email = :email WHERE user_id =' . $_GET['userid'], $param );
                return $true_s = "Данные сохранены";
			}
		}
	}

	public function DelUser(){
		if (isset($_POST['user_del'])) {
			parent::DeleteItem("DELETE FROM users WHERE user_id = " . $_GET['userid']);
			header("Location: ../view/cabinet.php");
		}
	}
}

$adm =  new Admin();
$res_user = $adm->SearchUser();
$res_user_id = $adm->User();
$res_sel_user = $adm->AddRateUserSelect();
$res_edit_user = $adm->EditUser();
$del_user = $adm->DelUser();
