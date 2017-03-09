<?php 
	require_once '../controller/select_top_users.php'; ?>

  <h3>Топ добавляющих книги на сайт</h3>
	<?php for ($i=0; $i < count($top_books); $i++) { 
		if ($top_books[$i]['count'] > 0 ) { ?>
      <p> User :: <?=$top_books[$i]['user']?> | Count books :: <?=$top_books[$i]['count']?></p>
    <?php } 
    }?>
  
  <span class="clear border_eee"></span>

  <h3>Топ активных комментаторов</h3>
  <?php for ($i=0; $i < count($top_comment); $i++) { 
    if ($top_comment[$i]['count'] > 0 ) { ?>
      <p> User :: <?=$top_comment[$i]['user']?> | Count comment :: <?=$top_comment[$i]['count']?></p>
    <?php } 
  }?>

  <span class="clear border_eee"></span>

  <h3>Топ оценивающих</h3>
  <?php for ($i=0; $i < count($top_rate); $i++) { 
    if ($top_rate[$i]['count'] > 0 ) { ?>
      <p> User :: <?=$top_rate[$i]['user']?> | Count rate :: <?=$top_rate[$i]['count']?></p>
    <?php } 
  }?>