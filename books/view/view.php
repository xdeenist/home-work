<?php
  require_once '../controller/select_one.php';
  require_once '../controller/delete.php';
  require_once '../controller/rate.php';
  require_once '../controller/comments.php';
  // var_dump($_SESSION);
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
          <a href="">Главная</a>
          &gt;
          <a href="">Просмотр</a>
        </div>
        <h1>Просмотр</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->

  
  <!-- ********************** --> 
  <!--      C O N T E N T     -->
  <!-- ********************** --> 
  <div id="content" class="product_view container_16">

    <div id="product" class="grid_12">
      <?php
        require_once '../view/include/one_select.php';
        require_once '../view/include/comments_view.php';
      ?>
    </div>

    
    <div id="right_col" class="grid_3">

      

      
      <div id="bestseller_side" class="s_box clearfix">

    <?php
     require_once '../view/include/bestsellers.php';
     require_once '../view/include/information.php';
    ?>

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
