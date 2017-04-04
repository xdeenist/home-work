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
          <?php if (isset($_SESSION['userstatus']) &&  $_SESSION['userstatus'] != "admin") { ?>
          <a href="">Связаться с нами</a>
        </div>
        <h1>Связаться с нами</h1>
        <?php } else { ?>
        <a href="">Обратная связь</a>
        </div>
        <h1>Ответы из формы</h1>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- end of intro -->

  
  <!-- ********************** --> 
  <!--      C O N T E N T     -->
  <!-- ********************** --> 
  <div id="content" class="container_16">


    
    <div id="contacts" class="s_info_page grid_12">

    <?php if (isset($_SESSION) || $_SESSION['userstatus'] != "admin") { ?>
     	
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
            <textarea id="enquiry" style="width: 98%;" rows="10" class="required" name="text_contact" maxlength="350" title="Enquiry must be more 10 characters!"></textarea>
          </div>
        </div>
        <button class="s_button_1 s_main_color_bgr" type="submit" name="cont_contact"><span class="s_text">Отправить</span></button>
      </form>

    <?php } else { ?>
      <?php if (isset($_GET['r'])) { ?>
        <form id="contact_form" action="" method="post">
          <div class="s_row_3 clearfix">
            <p>Ответить пользователю:</p>
            <input type="text" name="ans" class="required" value="<?=$_GET['r']?>">
          </div>
          <div class="s_row_3 clearfix">
            <textarea id="enquiry" style="width: 98%;" rows="10" class="required" name="ans_text_contact" maxlength="350"></textarea>
          </div>
          <button class="s_button_1 s_main_color_bgr" type="submit" name="ans_contact"><span class="s_text">Отправить</span></button>
        </form>
      <?php } ?>
      <p style="color: green; font-weight: bolder"><?=$emailSent;?>
      <?php if (!empty($sel_unreed)) {  ?>
        <h4><a href="contacts.php?read=read">Прочитанные</a> :: <a href="contacts.php">Непрочитанные</a></h4> 
       <?php } ?>
      <?php if (!empty($sel_unreed)) {  ?>
        <table border="1" width="690">
          <caption><strong><?php if (isset($_GET['read'])) { ?>Прочитанные <?php } else { ?> Непрочитанные <?php } ?>сообщения:</strong></caption>
            <tr>
              <th>User Name</th>
              <th>E-mail</th>
              <th>Text</th>
              <th>Time</th>
              <th>Control</th>
            </tr>
          <?php for ($i=0; $i < count($sel_unreed); $i++) { ?>          
            <tr>
              <th><?=$sel_unreed[$i]['name']?></th>
              <th><?=$sel_unreed[$i]['mail']?></th>
              <th><a href="contacts.php?r=<?=$sel_unreed[$i]['name']?>&em=<?=$sel_unreed[$i]['mail']?>"><?=$sel_unreed[$i]['message']?></a></th>
              <th><?=$sel_unreed[$i]['messageTime']?></th>
              <th><a href="contacts.php?reed=<?=$sel_unreed[$i]['contact_id']?>">Проч </a>::<a href="contacts.php?del=<?=$sel_unreed[$i]['contact_id']?>"> Del</a></th>
            </tr>
            <?php } ?>
        </table>
      <?php } ?>
    <?php } ?>

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
