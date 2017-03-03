
<?php
     require_once '../controller/add_book.php';
     require_once '../controller/edit_book.php';
?>
  <!-- ********************** --> 
  <!--      H E A D E R       --> 
  <!-- ********************** -->
<?php
     require_once '../view/include/header.php';
?>
  <!-- end of header --> 
    <script type="text/javascript" src="../js/jquery/jquery-1.2.6.min.js"></script>
    <script type="text/javascript" src="../js/jquery/jquery.rater.js"></script>
    <script type="text/javascript">
      $(function() {
        $('#testRater').rater({ postHref: 'http://jvance.com/TestRater.aspx' });
      });
      $(function() {
        $('#errorRater').rater({ postHref: 'http://jvance.com/TestRater.aspx?error=true' });
      });
    </script>  

  <!-- ********************** --> 
  <!--     I N T R O          -->
  <!-- ********************** --> 
  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="index.php">Главная</a>
           &gt; <a href="cabinet.php">Кабинет</a>
           <?php if ($_GET['edit']) { ?>
             &gt; <a href="add.php">Редактировать книгу</a>
           <?php } else { ?> &gt; <a href="add.php">Добавить книгу</a> <?php } ?>             
        </div>
        <?php if ($_GET['edit']) { ?>
        <h1>Редактировать книгу</h1>
        <?php } else { ?> <h1>Добавить книгу</h1> <?php } ?>   
      </div>
    </div>
  </div>
  <!-- end of intro -->
  
  
  <!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_16">
  

    <div class="grid_16">

        <?php
          if (!$_GET['edit']) {
             require_once '../view/include/add_form.php';
           } else { require_once '../view/include/add_form_for_edit.php';}
        ?>      
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



<script type="text/javascript" src="js/jquery.rating.js"></script>
</body>
</html>
