<?php
     require_once '../controller/select_one.php';
     session_start();
?>

      <div id="product_images" class="grid_6 alpha">
      	<a id="product_image_preview"  href=""><img id="image" style="width: 320px; height: 320px;" src="../files/img/<?=$result_sel_one[0]['book_img']?>" title="../files/img/<?=$result_sel_one[0]['book_name']?>" alt="<?=$result_sel_one[0]['book_name']?>" /></a>
      </div>
      <div id="product_info" class="grid_6 omega">
      <h3 class="s_main_color"><?=$result_sel_one[0]['book_name']?></h3>
        <dl class="clearfix">
          <dt>Рейтинг :: </dt>
          <dd>
            <?php switch ($result_sel_one[0]['rate']) {
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
            <li class="one"><a href="../view/view.php?id=<?=$_GET['id']?>&star=1" title="1 Star">1</a></li>
            <li class="two"><a href="../view/view.php?id=<?=$_GET['id']?>&star=2" title="2 Stars">2</a></li>
            <li class="three"><a href="../view/view.php?id=<?=$_GET['id']?>&star=3" title="3 Stars">3</a></li>
            <li class="four"><a href="../view/view.php?id=<?=$_GET['id']?>&star=4" title="4 Stars">4</a></li>
            <li class="five"><a href="../view/view.php?id=<?=$_GET['id']?>&star=5" title="5 Stars">5</a></li>
          </ul>
          </dd>
        </dl>
        <div id="product_share" class="clearfix">
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style ">
          <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
          <a class="addthis_button_tweet"></a>
          <a class="addthis_counter addthis_pill_style"></a>
          </div>
          <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4de0eff004042e7a"></script>
          <!-- AddThis Button END -->
        </div>
        <div id="product_options">
          <h3>Описание книги: </h3>
        <dl class="clearfix">
          <dt>Автор :: </dt>
          <dd><?=$result_sel_one[0]['author']?></dd>
          <dt>Жанр :: </dt>
          <dd><?=$result_sel_one[0]['genre_add_title']?> </dd>
          <dt>Издание :: </dt>
          <dd><?=$result_sel_one[0]['edition_add']?></dd>
          <dt>Год выпуска:: </dt>
          <dd><?=$result_sel_one[0]['year_add']?> г.</dd>
          <dt>Добавлена :: </dt>
          <dd><?=$result_sel_one[0]['book_create_datetime']?> </dd>
          <dt>Скачать :: </dt>
          <!-- <dd><p><a href="../files/<?=$result_sel_one[0]['book_file']?>" download>Скачать файл</a></dd> -->
          <?php $n = substr($result_sel_one[0]['book_file'], -4);?>
          <!-- <dd><a href="../controller/zip_arhivate.php" class="s_button_3 s_main_color_bgr"><span class="s_text"><?=$n?></span></a></dd> -->
          <dd><a href="../controller/zip_arhivate.php" class="s_button_3 s_main_color_bgr"><span class="s_text">Скачать *.zip</span></a></dd>
        </dl>
        <?php if ($_SESSION['userstatus'] == "admin" || $result_sel_one[0]['user_id'] == $_SESSION['user_id']) { ?>
            <a href="../view/add.php?edit=<?=$result_sel_one[0]['book_id']?>" class="s_main_color" style="margin-left: 25px"><strong>Редактировать</strong></a>
            <a href="?bookdel=<?=$result_sel_one[0]['book_id']?>" class="s_main_color left"><strong>Удалить</strong></a>
        <?php } ?>
        </div>
      </div>
      <div class="clear"></div>

      <div id="product_info" class="grid_6 omega">
        <div id="product_options">
        <dl class="clearfix">
          <p>Последнее изменение :: <?=$result_sel_one[0]['book_update_datetime']?></p>
        </dl>
        </div>
      </div>

      <div class="s_tabs grid_12 alpha omega">
        <ul class="s_tabs_nav clearfix">
          <li><a >Полное описание</a></li>          
        </ul>
        <div class="s_tab_box">        
          <div id="product_description">
            <div class="cpt_product_description ">
              <p><?=$result_sel_one[0]['discr']?></p>
            </div>
            <!-- cpt_container_end -->
          </div>
        </div>
      </div>

      