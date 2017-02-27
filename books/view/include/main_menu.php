<?php
require_once '/var/www/html/books/controller/genre.php';
?>

<li> <a href="">Жанры</a>
  <div class="s_submenu">
    <h3>Жанры</h3>
    <span class="clear border_eee"></span>
    <ul class="s_list_1 clearfix">
      <?php for ($i=0; $i < count($result); $i++) { 
                if (is_null($result[$i]['genre_parent_id'])) { ?>
                    <li><a href="../view/list.php"><?=$result[$i]['genre_text']?></a>
            <?php } ?>
                    
                    <ul class="s_list_1 clearfix">
            <?php for ($k=0; $k < count($result); $k++) { 
                  if ($result[$k]['genre_parent_id'] == $result[$i]['genre_id'] ) { ?>
                    <li><a href="../view/list.php"><?=$result[$k]['genre_text']?></a></li>
                    
            <?php  }
                } ?>
                    </ul>
      <?php } ?>
                    </li>
      <span class="clear border_eee"></span>
    </ul>          
  </div>
</li>