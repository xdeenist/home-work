
<!-- <div id="wrapper">  -->
  
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
<?php
     require_once '../view/include/slider.php';
     
?>
  <!-- end of intro --> 
  
  
  <!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_12">
  
    <div id="welcome" class="grid_12">
      <h2>Welcome to Hell</h2>
      <p> <a href="">Books</a> One of the main features is to choose different types of slideshows for every category, so you can personalise every part of your store. Shoppica allows you to customize product listing size, column position and layout type, giving you the power to easy adapt the theme to your produc or service. With the color themer tool you can change site&#39;s elements and make your store unique and stand out of the crowd</p>
      <p> One of the main features is to choose different types of slideshows for every category, so you can personalise every part of your store. Shoppica allows you to customize product listing size, column position and layout type, giving you the power to easy adapt the theme to your produc or service. With the color themer tool you can change site&#39;s elements and make your store unique and stand out of the crowd.</p>
    </div>
    
    <div class="clear"></div>
    
    <div id="special_home" class="grid_12">
      <h2 class="s_title_1"><span class="s_main_color">Последние</span> добавленные</h2>
      <div class="clear"></div>
      <div class="s_listing s_grid_view clearfix">

        <?php 
          require_once '../view/include/last_add.php'; 
        ?>

        <div class="clear"></div>
      </div>
    </div>
    
    <div id="latest_home" class="grid_12">
      <h2 class="s_title_1"><span class="s_main_color">Самые популярные</span> книги</h2>
      <div class="clear"></div>
      <div class="s_listing s_grid_view clearfix">
        <?php 
          require_once '../view/include/most_popular.php'; 
        ?>
        <div class="clear"></div>
      </div>
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
