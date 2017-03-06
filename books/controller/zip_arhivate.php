<?php
     require_once '../controller/select_one.php';

/**
* 
*/
class ZipFile 
{
	
	function __construct()
	{
	}

	public function ZipFileD($folder, $filename){
		$ZipName= time().'.zip';
		$zip = new ZipArchive();
		if($zip->open($ZipName, ZipArchive::CREATE)===TRUE){
			$zip -> addFile($folder.$filename, $filename); 
			$zip->close();
			# send the file to the browser as a download
			header('Content-disposition: attachment; filename="' . $ZipName . '"');
			header('Content-type: application/zip');
			readfile($ZipName);
			unlink($ZipName);
		}else{
    		die ('Произошла ошибка при создании архива');
		}

	}
}

$zipf = new ZipFile();
$zipdown = $zipf->ZipFileD("../files/", $result_sel_one[0]['book_file']);