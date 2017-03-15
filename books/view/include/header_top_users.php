<?php 
	require_once '../controller/select_top_users.php'; ?>

  <h3>Топ добавляющих книги на сайт</h3>
	<?php for ($i=0; $i < count($top_books); $i++) { 
		if ($top_books[$i]['count'] > 0 ) { ?>
      <p><?=$i+1?>. <span class="s_main_color">User</span> :: <?=$top_books[$i]['user']?> | <span class="s_main_color">Count books</span> :: <?=$top_books[$i]['count']?></p>
    <?php } 
    }?>
  
  <span class="clear border_eee"></span>

  <h3>Топ активных комментаторов</h3>
  <?php for ($k=0; $k < count($top_comment); $k++) { 
    if ($top_comment[$k]['count'] > 0 ) { ?>
      <p><?=$k+1?>. <span class="s_main_color">User</span> :: <?=$top_comment[$k]['user']?> | <span class="s_main_color">Count comment</span> :: <?=$top_comment[$k]['count']?></p>
    <?php } 
  }?>

  <span class="clear border_eee"></span>

  <h3>Топ оценивающих</h3>
  <?php for ($l=0; $l < count($top_rate); $l++) { 
    if ($top_rate[$l]['count'] > 0 ) { ?>
      <p><?=$l+1?>. <span class="s_main_color">User</span> :: <?=$top_rate[$l]['user']?> | <span class="s_main_color">Count rate</span> :: <?=$top_rate[$l]['count']?></p>
    <?php } 
  }?>