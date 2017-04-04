<?php
     require_once '../controller/admin.php';
?>
  <form id="create" class="clearfix"  method="post">
        <div class="clear"></div>
        <p style="color: red; font-weight: bolder; margin: 15px"><?=$add_err . $img_insert . $res_edit_user;?></p>
        <div class="s_row_2 clearfix">
          <label style="margin-left: 20px"><strong>Найти пользователя:</strong></label>
          <input name="user_search" type="text" size="30" maxlength="50"/>
          <input type="submit" name="search_user_submit" class="s_button_1 s_main_color_bgr left" style="margin-left: 20px" value="Найти">
        </div>
  </form>

  <?php if ($_GET['searchuser']) { ?>
      <?php if (empty($res_user)) { ?>
      <span class="s_main_color" style="margin-left: 35px">Пользователь не найден</span>
      <?php } else { ?> 
        <div class="user_cont" style="margin: 25px">      
          <p><h4 class="s_main_color">Найденные пользователи ::</h4></p>
          <?php for ($i=0; $i < count($res_user); $i++) { ?>
            <p><h4><a href="../view/admin.php?userid=<?=$res_user[$i]['user_id']?>"> <?=$res_user[$i]['user_login']?></a></h4></p>
          <?php } ?>
        </div>   
        <?php } ?>
  <?php } ?>


  <div id="content" class="container_12"> 
    <div id="order_history" class="grid_12">      
      <div class="s_listing s_grid_view clearfix"> 
        <?php if (!empty($_GET['userid'])) { ?> 

          <h3 class="s_main_color">Данные пользователя <?= $res_user_id[0]['user_login']?>:</h3>
          <form id="create" class="clearfix"  method="post">
            <div class="s_row_2 clearfix">
              <label><strong>Логин ::</strong></label>
              <input name="user_log" type="text" size="35" maxlength="50" value="<?= $res_user_id[0]['user_login']?>" />
            </div>
            <div class="s_row_2 clearfix">
              <label><strong>Пароль ::</strong></label>
              <input name="user_pwd" type="text" size="35" maxlength="50"/>
            </div>
            <div class="s_row_2 clearfix">
              <label><strong>E-mail ::</strong></label>
              <input name="user_email" type="text" size="35" maxlength="50" value="<?= $res_user_id[0]['email']?>"/>
            </div>
            <div class="s_row_2 clearfix">
              <label><strong>Статус пользователя :: </strong></label>
              <select name="user_stat"  size="1" style="width: 100px;">
                <option <?php if($res_user_id[0]['user_status'] == "admin") { ?> selected <?php } ?> value="admin">admin</option>
                <option <?php if($res_user_id[0]['user_status'] == "user") { ?> selected <?php } ?> value="user">user</option>
                <option <?php if($res_user_id[0]['user_status'] == "banned") { ?> selected <?php } ?> value="banned">banned</option>
              </select>
            </div>
            <p><input type="submit" name="user_save" class="s_button_1 s_main_color_bgr left " style="margin: 15px" value="Save edit">
            <input type="submit" name="user_del" class="s_button_1 s_main_color_bgr left " style="margin: 15px" value="Del user">
            </p>
          </form>
        
         <h3 class="s_main_color">Добавленные книги <?= $res_user_id[0]['user_login']?> :</h3>
        <?php }?>

        <?php if (!empty($_GET['userid']) && empty($res_sel_user)) { ?>
          <br />
          <br />
          <h4 class="s_main_color"><?= $res_user_id[0]['user_login']?> пока ничего не добавил/а</h4>        
        <?php } ?>

        <?php for ($i=0; $i < count($res_sel_user); $i++) { ?>
          <div class="grid_4">
            <div class="s_order clearfix">
              <?php if (strlen($res_sel_user[$i]['book_name'])>21) $res_sel_user[$i]['book_name'] =  substr($res_sel_user[$i]['book_name'],0,19)."..."; ?>  
                <p class="s_id"><span class="s_999">Name</span> <span class="s_main_color"><?=$res_sel_user[$i]['book_name']?></p>  
              <span class="clear"></span>
              <dl class="clearfix">
                <dt>Date Added::</dt>
                <dd><?=$res_sel_user[$i]['book_create_datetime']?></dd>
                    <?php if (strlen($res_sel_user[$i]['author'])>15) $res_sel_user[$i]['author'] =  substr($res_sel_user[$i]['author'],0,15)."..."; ?>  
                <dt>Author::</dt>
                <dd><?=$res_sel_user[$i]['author']?></dd>
                <dt>Genre::</dt>
                  <?php if (strlen($res_sel_user[$i]['genre_add_title'])>50) $res_sel_user[$i]['genre_add_title'] =  substr($res_sel_user[$i]['genre_add_title'],0,40)."..."; ?>  
                <dd><?=$res_sel_user[$i]['genre_add_title']?></dd>
                <dt>Рейтинг</dt>
                <dd>
                  <?php switch ($res_sel_user[$i]['rate']) {
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
     <a href="view.php?id=<?=$res_sel_user[$i]['book_id']?>" class="s_main_color right"><strong>Просмотр</strong></a>
     <a href="../view/add.php?edit=<?=$res_sel_user[$i]['book_id']?>" class="s_main_color" style="margin-left: 25px"><strong>Редактировать</strong></a>
     <a href="?bookdel=<?=$res_sel_user[$i]['book_id']?>" class="s_main_color left"><strong>Удалить</strong></a>
     
   </div>
 </div>
<?php } ?>
</div>
      
      <div class="clear"></div>
      <br />
      <br />
    </div>
  </div> 