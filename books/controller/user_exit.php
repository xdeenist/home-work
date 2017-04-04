<?php 

/**
*  User exit class
*/
class UserEx
{
	
	function __construct()
	{

	}

	public function ExitUser(){
		if (isset($_GET['exit'])) {
			if ($_GET['exit'] == true) {
				session_destroy(); 
            	header('Location: ../index.php');
			}
			
		}
	}
}

$us = new UserEx();
$us->ExitUser();


