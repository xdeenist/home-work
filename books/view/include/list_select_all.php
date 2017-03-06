<?php  
    require_once '../controller/select_list.php'; ?>

  <?php if (empty($select_res_rate)) { ?>
        <h1 class="s_main_color">Здесь пока ничего нет</h1>
  <?php } ?>

<?php for ($i=0; $i < count($select_res_rate) ; $i++) { 
?>
<div class="s_item clearfix">
  <div class="grid_3 alpha"> <a class="s_thumb" href="../view/view.php?id=<?=$select_res_rate[$i]['book_id']?>"><img src="../files/img/<?=$select_res_rate[$i]['book_img']?>" title="<?=$select_res_rate[$i]['book_name']?>" /></a> </div>
  <div class="grid_9 omega">
    <h3><a href="../view/view.php?id=<?=$select_res_rate[$i]['book_id']?>"><?=$select_res_rate[$i]['book_name']?></a></h3>
    <p class="s_model">Date Added:: <?=$select_res_rate[$i]['book_create_datetime']?></p>
    <p class="s_model">Author:: <?=$select_res_rate[$i]['author']?></p>
    <p class="s_model">Genre:: <?=$select_res_rate[$i]['genre_add_title']?></p>
       <?php switch ($select_res_rate[$i]['rate']) {
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
      <?php if (strlen($select_res_rate[$i]['discr'])>250) $select_res_rate[$i]['discr'] =  substr($select_res_rate[$i]['discr'],0,250)."..."; ?> 
      <p class="s_description"><?=$select_res_rate[$i]['discr']?></p>
    <?php if ($_SESSION['login']) { ?>
       <a class="s_button_add_to_cart" href="../view/view.php?id=<?=$select_res_rate[$i]['book_id']?>"><span class="s_icon_16">Просмотр</span></a>
            <?php if ($_SESSION['userstatus'] == "admin") { ?>
                  <a class="s_button_add_to_cart" href="<?=$get?>&bookdel=<?=$select_res_rate[$i]['book_id']?>"><span class="s_icon_16">Удалить</span></a>
            <?php } ?>
    <?php } else { ?>
       <p class="s_button_add_to_cart" ><span class="s_icon_16">Просмаривать могут только зарегистрированные пользователи</span></p>
    <?php }?>
  </div>
</div>
<?php } ?>


<!--     <ul class="rating twostar">
    <li class="one"><a href="#" title="1 Star">1</a></li>
    <li class="two"><a href="#" title="2 Stars">2</a></li>
    <li class="three"><a href="#" title="3 Stars">3</a></li>
    <li class="four"><a href="#" title="4 Stars">4</a></li>
    <li class="five"><a href="#" title="5 Stars">5</a></li>
  </ul> -->