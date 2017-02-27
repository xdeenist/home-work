 <?php
     require_once '../controller/select_cabinet.php';
?>
  <!-- ********************** --> 
  <!--      H E A D E R       --> 
  <!-- ********************** -->
<?php
     require_once '../view/include/header.php';
?>
  <!-- end of header --> 
  

  <!-- ********************** --> 
  <!--     I N T R O          -->
  <!-- ********************** --> 
  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="index.html">Главная</a>
           &gt; <a href="cart.html">Кабинет</a>
        </div>
        <h1>Кабинет</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->
  
  
  <!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_12">
  
    <div id="order_history" class="grid_12">
      <h1>Добавленные книги:</h1>
      <div class="s_listing s_grid_view clearfix">

        <div class="grid_4">
          <div class="s_order clearfix">
            <p class="s_id"><span class="s_999">Название</span> <span class="s_main_color">ыфваыфафы ввыаываываываывасы ваывааыв авыаы ва</span></p>
            <span class="clear"></span>
            <dl class="clearfix">
              <dt>Date Added::</dt>
              <dd>07/04/2011</dd>
              <dt>Customer::</dt>
              <dd>Pinko Pinkov</dd>
              <dt>Рейтинг</dt>
              <dd>
                  <p class="s_rating s_rating_5"><span style="width: 100%;" class="s_percent"></span></p>
              </dd>
            </dl>
            <a href="view.php" class="s_main_color right"><strong>Просмотр</strong></a>
            <a href="view.php" class="s_main_color left"><strong>Удалить</strong></a>
          </div>
        </div>
        
        <?php
             require_once '../view/include/cabinet_select.php';
        ?>



      </div>

      <a href="add.php" class="s_button_1 s_main_color_bgr"><span class="s_text">Добавить книгу</span></a>
      <div class="clear"></div>
      <br />
      <br />
    </div>
  </div>
  <!-- end of content -->  
  
  
   <!-- ********************** --> 
  <!--   S H O P   I N F O    --> 
  <!-- ********************** --> 
<?php
     require_once '../view/include/shopinfo.php';
?>
  <!-- end of shop info --> 
  
  
  
  <!-- ********************** --> 
  <!--      F O O T E R       --> 
  <!-- ********************** --> 
<?php
     require_once '../view/include/footer.php';
?>
  <!-- end of FOOTER --> 
  
</div>
<?php
     require_once '../view/include/fb-root.php';
?>

</body>
</html>
