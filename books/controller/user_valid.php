<?php
require_once '../model/user.class.php';
session_start(); 
/**
*  User validation class. Register & Login 
*  Hash password - md5 + salt
*/
class UserValid extends User
{
	public $name;
	public $password;
	public $repassword;
	public $email;
	public $salt;

	function __construct(){
	}

	public function FormValid(){

	}

	public function HashPwd(){	
		$salt = strlen($_POST['pwd']);
		$hashpass = md5($_POST['pwd']) . $salt;
		return $hashpass;
	}

	public function UserIns(){
		if (isset($_POST['cont_reg'])) {
			if (!$this->UserSelect()) {
				if (strlen($_POST['pwd']) >= 6) {
					if (preg_match("/^[a-zA-Z0-9]+$/", $_POST['pwd'])) {						
			    		if ($_POST['pwd'] == $_POST['repwd']) {
				    		$username = $_POST['name_user'];
				    		$pwd = $this->HashPwd();
				    		$user_stat = 'user';
				    		$mail = $_POST['e_mail'];
				    		$r = array(":name" => $username, ":pass" => $pwd, ":status" => $user_stat, ":email" => $mail);
                			parent::insert('INSERT INTO users SET user_login = :name, user_pass = :pass, user_status = :status, email = :email', $r );
                			return $true_l = "Теперь вы можете зайти на сайт";
			    		} else return $error_l = "Пароли не совпадают";
			    	} else return $error_l = "Пароль должен содержать только <br /> цифры и латинские буквы";
			    } else return $error_l = "Пароль должен быть не менее 6 символов";
			} else return $error_l = "Вы уже зарегистрированы";
		}
	}

	public function UserSelect(){
			$res_sel = parent::selectAll("SELECT * FROM users WHERE email = '{$_POST['e_mail']}' ");
			if ($res_sel) {
				return $res_sel;
			}			
	}

	public function UserValidation(){
		if (isset($_POST['log_sub'])) {
			$UsSel = $this->UserSelect();
            if ($UsSel) {
            	if ($this->HashPwd() == $UsSel[0]['user_pass']) {
            		$_SESSION['login'] = true;
            		if ($UsSel[0]['user_status'] == 'admin') {
            			$_SESSION['userstatus'] = "admin";
            		} else $_SESSION['userstatus'] = "user";
            		$_SESSION['user'] = $UsSel[0]['user_login'];
            		$_SESSION['user_id'] = $UsSel[0]['user_id'];
            		header("Location:../view/cabinet.php");
            	} else return $error_login = "Неправильный логин/пароль";
            } 
		}		
	}

}
$UV = new UserValid();
$error_login = $UV->UserValidation();
$error_reg = $UV->UserIns();





















// $user = new User();
// $result_user = $user->selectAll("SELECT * FROM users");
// $azaza = $user->insert('INSERT INTO users SET user_login = :name, user_pass = :pass, user_status = :status, email = :email' , array(":name" => "vasa", ":pass" => "ovno", ":status" => "admin", ":email" => "email"));
// var_dump($result_user);

// $this->insert('INSERT INTO users SET user_login = :name, user_pass = :pass, user_status = :status, email = :email' , array	(":name" => $_POST['name_user'], ":pass" => $_POST['pwd'], ":status" => "admin", ":email" => "email"));