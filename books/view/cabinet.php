 <?php
     require_once '../controller/select_cabinet.php';
     require_once '../controller/delete.php';
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
