<?php

require_once '/var/www/html/practice_blog/include/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Моя заметка номер 5</title>
		<link rel="stylesheet" href="../bootstrap3/css/bootstrap.css">
		<link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
		<div id="wrapper">
            <?php for($i=0;$i<count($res_select_update);$i++):?>
			<h1><?=$res_select_update[$i]['post_title']?></h1>
			<div>
				<p class="nav right">
					<a href="../index.php">на главную</a>
				</p>
				<p class="date"><?=$res_select_update[$i]['post_create_datetime']?>
				</p>
				<p>
                    <?=$res_select_update[$i]['post_text'];?>
                </p>
                <p>
                	<?php if ($res_select_update[$i]['tags']) {   // выборка тегов
					     $value['tags'] = explode(',', $res_select_update[$i]['tags']);
					        foreach ($value['tags'] as $tag) {
					     	    //print_r($tag);?>
                                <span class="print_tag">
                                    <a href='../include/posttotag.php?tag=<?=$tag?>'><?="#".$tag?></a>
                                  </span>
					     <?php  } ?>  
				<?php } ?>
                </p>
                <?php endfor;?>
			</div>
		</div>

	</body>
</html>


			