<?php
require_once '../controller/select_bestsellers.php';
// var_dump($result_bestsel );

?>
<div id="bestseller_side" class="s_box clearfix">
  <h2>Лучшие</h2>
  <?php for ($i=0; $i < count($result_bestsel); $i++) {  
    if ($result_bestsel[$i]['rate'] > 0) {  ?>
        <div class="s_item s_size_1 clearfix">
          <a class="s_thumb" ><img src="../files/img/<?=$result_bestsel[$i]['book_img']?>" width="38" height="38" alt="<?=$result_bestsel[$i]['book_name']?>" /></a>
          <?php if (strlen($result_bestsel[$i]['book_name']) > 15) { $result_bestsel[$i]['book_name'] = substr($result_bestsel[$i]['book_name'], 0, 15) . "..."; } ?>
          <h3><a href="../view/view.php?id=<?=$result_bestsel[$i]['book_id']?>"><?=$result_bestsel[$i]['book_name']?></a></h3>
          <?php if (strlen($result_bestsel[$i]['author']) > 8) { $result_bestsel[$i]['author'] = substr($result_bestsel[$i]['author'], 0, 8) . "..."; } ?>
          <p class="s_model">Author:: <?=$result_bestsel[$i]['author']?></p>
          <?php switch ($result_bestsel[$i]['rate']) {
              case 1:
                $r = 20;
                break;
              case 2:
                $r = 40;
                break;
              case 3:
                $r = 60;
                break;
              case 4:
                $r = 80;
                break;
              case 5:
                $r = 100;
                break;           
              default:
                $r = 0;
                break;
          } ?>
          <div class="s_rating_holder clearfix"><p class="s_rating s_rating_small s_rating_5 left"><span style="width: <?=$r?>%;" class="s_percent"></span></p></div>
        </div>
      <?php } 
  }?>
</div>






