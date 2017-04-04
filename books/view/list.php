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
          <a href="">Все книги</a>
        </div>
          <?php if (isset($_GET['search'])) { ?>
            <h1>Результаты поиска</h1>
          <?php } else {?><h1>Все книги</h1><?php } ?>          
      </div>
    </div>
  </div>
  <!-- end of intro -->

  
  <!-- ********************** --> 
  <!--      C O N T E N T     -->
  <!-- ********************** --> 
  <div id="content" class="container_16">
<?php
     require_once '../controller/sort_get.php';
?>
    
    <div id="category" class="grid_12">     
      <div id="listing_options">
        <div id="listing_sort" class="s_switcher">
          <span class="s_selected">Default</span>
          <ul class="s_options" style="display: none;">
            <li><a href="<?=$get?>&sort=new">По времени ↑</a></li>
            <li><a href="<?=$get?>&sort=old">По времени ↓</a></li>
            <li><a href="<?=$get?>&rsort=b">По рейтингу ↑</a></li>
            <li><a href="<?=$get?>&rsort=s">По рейтингу ↓</a></li>
          </ul>
        </div>
        <div id="view_mode" class="s_nav">
          <ul class="clearfix">
            <!-- <li id="view_grid"><a href=""><span class="s_icon"></span>Grid</a></li> -->
            <li id="view_list" class="s_selected"><a href=""><span class="s_icon"></span>List</a></li>
          </ul>
        </div>
      </div>

      <div class="clear"></div>

      <div class="s_listing s_list_view clearfix">

        <div class="clear"></div>
        <?php
          require_once '../view/include/list_select_all.php';
          require_once '../view/include/search_result.php';
        ?>


        <div class="clear"></div>

      </div>
      
      <div class="pagination">
        <!-- <div class="results">Showing 1 to 6 of 6 (1 Pages)</div> -->
      </div>
      
    </div>
    
  
    <div id="right_col" class="grid_3">  
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
