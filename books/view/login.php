<?php
     require '../controller/user_valid.php';
?>
 
  <!-- ********************** --> 
  <!--      H E A D E R       --> 
  <!-- ********************** -->
<?php
     require_once '../view/include/header.php';
?>
  <!-- end of header -->  
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  jQuery.validator.setDefaults({
      errorElement: "p",
      errorClass: "s_error_msg",
      errorPlacement: function(error, element) {
          error.insertAfter(element);
      },
      highlight: function(element, errorClass, validClass) {
          $(element).addClass("error_element").removeClass(validClass);
          $(element).parent("div").addClass("s_error_row");
      },
      unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass("error_element").addClass(validClass);
          $(element).parent("div").removeClass("s_error_row");
      }
  });
  $("#reg").validate();

});
</script>
<script type="text/javascript">
$(document).ready(function () {

  jQuery.validator.setDefaults({
      errorElement: "p",
      errorClass: "s_error_msg",
      errorPlacement: function(error, element) {
          error.insertAfter(element);
      },
      highlight: function(element, errorClass, validClass) {
          $(element).addClass("error_element").removeClass(validClass);
          $(element).parent("div").addClass("s_error_row");
      },
      unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass("error_element").addClass(validClass);
          $(element).parent("div").removeClass("s_error_row");
      }
  });
  $("#login_1").validate();

});
</script> 

  <!-- ********************** --> 
  <!--     I N T R O          -->
  <!-- ********************** --> 
  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="index.php">Home</a>
           <!-- &gt; <a href="cart.html">Basket</a> -->
        </div>
        <h1>Мой аккаунт</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->
  
  
  <!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_16">
  

    <div id="login_page" class="grid_16">
            
      <div class="grid_8 alpha">
        <h2 class="s_title_1"><span class="s_secondary_color">Я новый</span> пользователь.</h2>
        <div class="clear"></div>
        <form id="reg" action="" method="post">
        <p style="color: red; font-weight: bolder"><?=$error_reg;?></p>
          <div class="s_row_3 clearfix">
            <label><strong>E-Mail адрес:</strong></label>
            <input type="text" size="35" class="required email" name="e_mail" placeholder="Введите E-Mail"/>
            <br />
            <br />
            <label><strong>Имя:</strong></label>
            <input type="text" size="35" class="required" name="name_user" placeholder="Введите имя"/>
            <br />
            <br />
            <label><strong>Пароль:</strong></label>   
            <input type="password" size="35" class="required" name="pwd" placeholder="Введите пароль"/>
            <br />
            <br />
            <label><strong>Повторите пароль:</strong></label>  
            <input type="password" size="35" class="required" name="repwd" placeholder="Повторите пароль"/>
            <br />
          </div>
          <span class="clear border_ddd"></span>
          <br />
          <button class="s_button_1 s_main_color_bgr" type="submit" name="cont_reg"><span class="s_text">Продолжить</span></button>
        </form>
      </div>

      <div class="grid_8 omega">
        <h2 class="s_title_1"><span class="s_secondary_color">Я</span> зарегистрирован</h2>

        <div class="clear"></div>
        <form id="login_1" action="" method="post">
        <p style="color: red; font-weight: bolder"><?=$error_login;?></p>
          <div class="s_row_3 clearfix">
           <br />
            <br />
            <label><strong>E-Mail адрес:</strong></label>
            <input type="text" size="35" class="required email" name="e_mail" placeholder="Введите E-Mail" />
            <br />
            <br />
            <label><strong>Пароль:</strong></label>
            <input type="password" size="35" class="required" name="pwd" placeholder="Введите пароль" />
            <br />
          </div>
            <br />
            <br />
          <span class="clear border_ddd"></span>
          <br />
          <div class="s_nav s_size_2 left">
<!--             <ul class="clearfix">
              <li><a href="#">Forgotten Password</a></li>
            </ul> -->
          </div>
          <button class="s_button_1 s_main_color_bgr" type="submit" name="log_sub"><span class="s_text">Login</span></button>
        </form>
      </div>

      <div class="clear"></div>

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
