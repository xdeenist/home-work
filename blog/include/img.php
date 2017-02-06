<?php
require_once '/var/www/html/blog/include/db.php';
//добавление картинки
if ($_POST['add_save']) {
	if ($_FILES['myfile']['error'] == 0) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if($_FILES["myfile"]["size"] > 1024*3*1024) {
   		 		$error_img_load = "Размер изображения превышает три мегабайта";
    			exit;
    			}
			if ($insert_post_id) {
				//расширение картинки
				$img_inf = new SplFileInfo(basename($_FILES['myfile']['name']));
    			$img_info = $img_inf->getExtension();
    			//Каталог, в который мы будем принимать файл:
   				$uploaddir = '/var/www/html/blog/upload_img/'; 
				$uploadfile = $uploaddir.basename($_FILES['myfile']['tmp_name']. "." . $img_info);
				 // var_dump($uploadfile);
				// print_r($_FILES['myfile']['type']);
				//Копируем файл из каталога для временного хранения файлов:
				if (copy($_FILES['myfile']['tmp_name'], $uploadfile)) {
					$image_name = basename($_FILES['myfile']['tmp_name']. "." . $img_info);				
					$img_ins = $link->query("INSERT INTO images SET image = '$image_name', post_id = '$insert_post_id'");	
					} else { 
			    			$error_img_load = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; 
			    			exit; 
			   				}
			} else {$error_img_load = "Нельзя добавить изображение без текста"; }


		}
	}
}


//удаление картинки
if ($_POST['img_del']) {
 	$get_name = $link ->query("SELECT image FROM images WHERE post_id =" . $_GET['id']);
 	$get_name_res = $get_name -> fetch(PDO::FETCH_ASSOC);
 	$img_del_file = $get_name_res['image'];
 	$filename = "../upload_img/$img_del_file";
 		if (file_exists($filename)) {
 			unlink("../upload_img/$img_del_file");
 		} 	
 		// var_dump($get_name_res);
 	$img_del = $link ->query("DELETE FROM images WHERE post_id =" . $_GET['id']);
}


//изменение картинки
if ($_POST['save']) {
	$get_name = $link ->query("SELECT image FROM images WHERE post_id =" . $_GET['id']);
 	$get_name_res = $get_name -> fetch(PDO::FETCH_ASSOC);
 	$img_del_file = $get_name_res['image'];
 	$filename = "../upload_img/$img_del_file";
 	if (file_exists($filename)) {
 		unlink("../upload_img/$img_del_file");
 	} 	
 	$img_del = $link ->query("DELETE FROM images WHERE post_id =" . $_GET['id']);
 	if ($_FILES['myfile_up']['error'] == 0) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if($_FILES["myfile_up"]["size"] > 1024*3*1024) {
   		 		$error_img_load = "Размер изображения превышает три мегабайта";
    			exit;
    			}
				//Каталог, в который мы будем принимать файл:
				$img_inf = new SplFileInfo(basename($_FILES['myfile_up']['name']));
    			$img_info = $img_inf->getExtension();
    			//Каталог, в который мы будем принимать файл:
   				$uploaddir = '/var/www/html/blog/upload_img/'; 
				$uploadfile = $uploaddir.basename($_FILES['myfile_up']['tmp_name']. "." . $img_info);
				//Копируем файл из каталога для временного хранения файлов:
				if (copy($_FILES['myfile_up']['tmp_name'], $uploadfile)) {
					$image_name = basename($_FILES['myfile_up']['tmp_name']. "." . $img_info);					
					$img_ins = $link->query("INSERT INTO images SET image = '$image_name', post_id = " . $_GET['id']);
					} else { 
			    			$error_img_load = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; 
			    			exit; 
			   				}
		}
	}
}

if($_GET['del']) {
    $delete = $link->query("DELETE FROM post WHERE post_id=" . $_GET['del']);
    header("Location:index.php");
}



?>