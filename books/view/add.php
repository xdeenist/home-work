
<?php
     require_once '../controller/add_book.php';
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
           &gt; <a href="add.php">Добавить книгу</a>
        </div>
        <h1>Добавить книгу</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->
  
  
  <!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_16">
  

    <div class="grid_16">

      <form id="create" class="clearfix"  method="post" enctype="multipart/form-data">
        <h2 class="s_title_1"><span class="s_secondary_color">Заполните все</span> поля</h2>
        <div class="clear"></div>
        <p style="color: red; font-weight: bolder"><?=$add_err . $img_insert;?></p>
        <div class="s_row_2 clearfix">
          <label><strong>Название</strong></label>
          <input name="book_name" type="text" size="90" />
        </div>

        <div class="s_row_2 clearfix">
          <label><strong>Серия</strong></label>
          <input name="serial" type="text" size="90" />
        </div>

        <div class="s_row_2 clearfix">
          <label class="required"><strong>Автор</strong></label>
          <input name="author" type="text" size="30" />
        </div>



        <div class="s_row_2 clearfix">
          <label><strong>Описание</strong></label>
          <textarea name="discr" rows="10" cols="93"></textarea>
        </div>

        <div class="s_row_2 clearfix">
          <label for="file"><strong>Добавить обложку (max 3mb; jpg, jpeg, png):</strong></label>
          <input type="file" name="myfile_img" >
        </div>

        <div class="s_row_2 clearfix">
          <label for="file"><strong>Добавить файл (max 3mb; FB2, MOBI, PDF, RTF, TXT, DOC, DOCX):</strong></label>
          <input type="file" name="myfile_book" >
        </div>
        
        <div class="s_row_2 clearfix">
          <label class="required"><strong>Издание</strong></label>
          <input name="edition_add" type="text" size="30" />
        </div>

        <div class="s_row_2 clearfix">
          <label class="required"><strong>Год</strong></label>
          <input name="year_add" type="text" size="30" />
        </div>
        
        <?php
             require_once '../view/include/add_genre.php';
        ?>
        
        <div class="s_row_2 clearfix">
          <label><strong>Выберите вашу оценку</strong></label>
          <select name="rate_add"  size="1" style="width: 50px;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <p><input type="submit" name="add_save" class="s_button_1 s_main_color_bgr left " value="Сохранить"></p>
        
      </form>
      
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
