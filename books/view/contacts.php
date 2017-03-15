<?php 
  require_once '../controller/contacts.php';
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
  $("#contact_form").validate();  
});
</script>  

  <!-- ********************** --> 
  <!--     I N T R O          -->
  <!-- ********************** --> 

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="">Главная</a>
          &gt;
          <a href="">Связаться с нами</a>
        </div>
        <h1>Связаться с нами</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->

  
  <!-- ********************** --> 
  <!--      C O N T E N T     -->
  <!-- ********************** --> 
  <div id="content" class="container_16">


    
    <div id="contacts" class="s_info_page grid_12">
     	
      <h2><span class="s_secondary_color">Мы находимся</span> рядом</h2>
      
      <p class="alpha grid_4"><strong>Books</strong><br /> 5 Books Blvd<br /> New York<br /> 1000</p>
      <p class="grid_4"><strong>Наш телефон:</strong><br /> +1 (0) 7007001</p>

      <br />
      <span class="clear border_ddd"></span>
      <br />      
      <p style="color: green; font-weight: bolder"><?=$emailSent;?> 
      <?php if ($emailSent) { ?>
        <a style="color: blue; font-weight: bolder" href="../index.php">→ назад на главную</a>
      <?php } ?>
      </p>
      <h2><span class="s_secondary_color">Отправить</span> сообщение</h2>

      <form id="contact_form" action="" method="post" enctype="multipart/form-data">
      	<div id="contact_form_icon"></div>        
        <div class="s_row_3 clearfix">
          <label><strong>Ваше имя:</strong> *</label>
          <input type="text" size="35" class="required" name="name_contact" placeholder="Введите имя"/>
        </div>
        <div class="s_row_3 clearfix">
          <label><strong>Ваш E-Mail:</strong> *</label>
          <input type="text" size="35" class="required email" name="e_mail_contact" placeholder="Введите E-Mail"/>
        </div>
        <div class="s_row_3 clearfix">
          <label><strong>Ваше сообщение:</strong> *</label>
          <div class="s_full">
            <textarea id="enquiry" style="width: 98%;" rows="10" class="required" name="text_contact" title="Enquiry must be between 10 and 3000 characters!"></textarea>
          </div>
        </div>
        <button class="s_button_1 s_main_color_bgr" type="submit" name="cont_contact"><span class="s_text">Отправить</span></button>
      </form>

    </div>
    
    <div id="right_col" class="grid_3">

    <?php
     require_once '../view/include/information.php';
    ?>

    </div>
    
    <div class="clear"></div>
   
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
