<?php 
	require_once '../controller/select_most_popular.php'; 
	// var_dump($resule_most_popular);
?>
<?php for ($i=0; $i < count($resule_most_popular); $i++) { ?>
	      <div class="s_item grid_2"> <a class="s_thumb"><img src="../files/img/<?=$resule_most_popular[$i]['book_img']?>" title="<?=$resule_most_popular[$i]['book_name']?>" alt="<?=$resule_most_popular[$i]['book_name']?>" /></a>
          <?php if (strlen($resule_most_popular[$i]['book_name']) > 20) { $resule_most_popular[$i]['book_name'] = substr($resule_most_popular[$i]['book_name'], 0, 20) . "..."; } ?>
          <h3><a href="../view/view.php?id=<?=$resule_most_popular[$i]['book_id']?>"><?=$resule_most_popular[$i]['book_name']?></a></h3>
          <?php if (strlen($resule_most_popular[$i]['author']) > 15) { $resule_most_popular[$i]['author'] = substr($resule_most_popular[$i]['author'], 0, 15) . "..."; } ?>
          <?php if (strlen($resule_most_popular[$i]['author']) > 15) { $resule_most_popular[$i]['author'] = substr($resule_most_popular[$i]['author'], 0, 15) . "..."; } ?>
          <p class="s_model">Author:: <?=$resule_most_popular[$i]['author']?></p>

        <?php switch ($resule_most_popular[$i]['rate']) {
        case 1:
          $r = "rating onestar";
          break;
        case 2:
          $r = "rating twostar";
          break;
        case 3:
          $r = "rating threestar";
          break;
        case 4:
          $r = "rating fourstar";
          break;
        case 5:
          $r = "rating fivestar";
          break;           
        default:
          $r = "rating nostar";
          break;
       } ?>
           <ul class="s_rating <?=$r;?>">
            <li class="one"><a title="1 Star">1</a></li>
            <li class="two"><a title="2 Stars">2</a></li>
            <li class="three"><a title="3 Stars">3</a></li>
            <li class="four"><a title="4 Stars">4</a></li>
            <li class="five"><a title="5 Stars">5</a></li>
          </ul>

        </div>
<?php } ?>


