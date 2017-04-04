<?php
     require_once '../controller/select_cabinet.php';
     // var_dump($result_select);
?>
  <div id="content" class="container_12"> 
      <?php if ($_SESSION['userstatus'] == "admin") { ?>
      <a href="../view/admin.php" class="s_button_1 s_main_color_bgr left" style="margin: 15px"><span class="s_text">User control</span></a>
   <?php } ?> 
    <div id="order_history" class="grid_12">
      <h1>Добавленные книги:</h1>
      <div class="s_listing s_grid_view clearfix">  
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
</div>
      <a href="add.php" class="s_button_1 s_main_color_bgr"><span class="s_text">Добавить книгу</span></a>
      <div class="clear"></div>
      <br />
      <br />
    </div>
  </div>
  <!-- end of content -->  



















