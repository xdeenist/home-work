<?php 
	require_once '../controller/select_most_popular.php'; 

	for ($i=0; $i < count($resule_most_popular); $i++) { 
		if ($resule_most_popular[$i]['rate'] > 0 ) { ?>
              <ul class="s_list_1 clearfix">
                <p><?=$i + 1 . "). "?>Author :: <?=$resule_most_popular[$i]['book_name']?></p>
                <li><a href="../view/view.php?id=<?=$resule_most_popular[$i]['book_id']?>"><?=$resule_most_popular[$i]['book_name']?></a></li>

              </ul>
              <span class="clear border_eee"></span>

    <?php } 
    }?>
