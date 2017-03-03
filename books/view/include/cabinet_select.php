<?php
     require_once '../controller/select_cabinet.php';
     // var_dump($result_select);
?>
  <?php if (empty($result_select)) { ?>
        <br />
        <br />
        <h1 class="s_main_color">Вы пока ничего не добавили</h1>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  <?php } ?>
<?php for ($i=0; $i < count($result_select); $i++) { ?>
 <div class="grid_4">
   <div class="s_order clearfix">
   <?php if (strlen($result_select[$i]['book_name'])>21) $result_select[$i]['book_name'] =  substr($result_select[$i]['book_name'],0,19)."..."; ?>  
     <p class="s_id"><span class="s_999">Name</span> <span class="s_main_color"><?=$result_select[$i]['book_name']?></p>  
     <span class="clear"></span>
     <dl class="clearfix">
       <dt>Date Added::</dt>
       <dd><?=$result_select[$i]['book_create_datetime']?></dd>
      <?php if (strlen($result_select[$i]['author'])>15) $result_select[$i]['author'] =  substr($result_select[$i]['author'],0,15)."..."; ?>  
       <dt>Author::</dt>
       <dd><?=$result_select[$i]['author']?></dd>
       <dt>Genre::</dt>
       <?php if (strlen($result_select[$i]['genre_add_title'])>50) $result_select[$i]['genre_add_title'] =  substr($result_select[$i]['genre_add_title'],0,40)."..."; ?>  
       <dd><?=$result_select[$i]['genre_add_title']?></dd>
       <dt>Рейтинг</dt>
       <dd>
       <?php switch ($result_select[$i]['rate']) {
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
           <ul class="<?=$r;?>">
            <li class="one"><a title="1 Star">1</a></li>
            <li class="two"><a title="2 Stars">2</a></li>
            <li class="three"><a title="3 Stars">3</a></li>
            <li class="four"><a title="4 Stars">4</a></li>
            <li class="five"><a title="5 Stars">5</a></li>
          </ul>
       </dd>
     </dl>
     <a href="view.php?id=<?=$result_select[$i]['book_id']?>" class="s_main_color right"><strong>Просмотр</strong></a>
     <a href="../view/add.php?edit=<?=$result_select[$i]['book_id']?>" class="s_main_color" style="margin-left: 25px"><strong>Редактировать</strong></a>
     <a href="?bookdel=<?=$result_select[$i]['book_id']?>" class="s_main_color left"><strong>Удалить</strong></a>
     
   </div>
 </div>
<?php } ?>





















<!--  <div class="grid_4">
   <div class="s_order clearfix">
     <p class="s_id"><span class="s_999">Название</span> <span class="s_main_color">ыфваыфафы ввыаываываываывасы ваывааыв авыspan></p>
     <span class="clear"></span>
     <dl class="clearfix">
       <dt>Date Added::</dt>
       <dd>07/04/2011</dd>
       <dt>Customer::</dt>
       <dd>Pinko Pinkov</dd>
       <dt>Рейтинг</dt>
       <dd>
           <ul class="rating fourstar">
            <li class="one"><a href="?rate=1" title="1 Star">1</a></li>
            <li class="two"><a href="?rate=2" title="2 Stars">2</a></li>
            <li class="three"><a href="?rate=3" title="3 Stars">3</a></li>
            <li class="four"><a href="?rate=4" title="4 Stars">4</a></li>
            <li class="five"><a href="?rate=5" title="5 Stars">5</a></li>
          </ul>
       </dd>
     </dl>
     <a href="view.php" class="s_main_color right"><strong>Просмотр</strong></a>
     <a href="view.php" class="s_main_color left"><strong>Удалить</strong></a>
   </div>
 </div> -->