<?php 
    require_once '../controller/search.php';

if ($_GET['search']) { ?>
  <div class="s_item clearfix">
    <div class="grid_9 omega">
    <?php if (!empty($res_sel_book) && !empty($res_sel_author) && !empty($res_sel_serial) && !empty($res_sel_edition)) { ?>
    <span class="s_main_color">Просмаривать книги могут только зарегистрированные пользователи</span>
    <?php } else {?><span class="s_main_color">Извините, ничего не найдено :(</span><?php } ?>
  
      <?php if (!empty($res_sel_book[0]['book_name'])) { ?>
        <p><h3 class="s_main_color">Найденные книги ::</h3></p>
        <?php for ($i=0; $i < count($res_sel_book); $i++) { ?>
          <p><h4><a href="../view/view.php?id=<?=$res_sel_book[$i]['book_id']?>"> <?=$res_sel_book[$i]['book_name']?></a></h4></p>
        <?php } ?>
      <?php } ?>
  
      <?php if (!empty($res_sel_author[0]['author'])) { ?>
        <p><h3 class="s_main_color">Найденные авторы ::</h3></p>
        <?php for ($k=0; $k < count($res_sel_author); $k++) { ?>
          <p><h4><a href="../view/list.php?author=<?=$res_sel_author[$k]['author']?>"> <?=$res_sel_author[$k]['author']?></a></h4></p>
        <?php } ?>
      <?php } ?>
  
      <?php if (!empty($res_sel_serial[0]['book_serial'])) { ?>
        <p><h3 class="s_main_color">Найденные серии ::</h3></p>
        <?php for ($l=0; $l < count($res_sel_serial); $l++) { ?>
          <p><h4><a href="../view/list.php?serial=<?=$res_sel_serial[$l]['book_serial']?>"> <?=$res_sel_serial[$l]['book_serial']?></a></h4></p>
        <?php } ?>
      <?php } ?>
  
      <?php if (!empty($res_sel_edition[0]['edition_add'])) { ?>
        <p><h3 class="s_main_color">Найденные издания ::</h3></p>
        <?php for ($m=0; $m < count($res_sel_book); $m++) { ?>
          <p><h4><a href="../view/list.php?edition=<?=$res_sel_edition[$m]['edition_add']?>"> <?=$res_sel_edition[$m]['edition_add']?></a></h4></p>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
<?php } ?>