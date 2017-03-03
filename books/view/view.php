  
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
      <div id="product_images" class="grid_6 alpha">
      	<a id="product_image_preview" rel="prettyPhoto[gallery]" href="images/dummy/pic_1.jpg"><img id="image" src="images/dummy/pic_1.jpg" title="Leica M7" alt="Leica M7" /></a>
      </div>
      <div id="product_info" class="grid_6 omega">
        <dl class="clearfix">
          <dt>Рейтинг</dt>
          <dd>
            <p class="s_rating s_rating_5"><span style="width: 100%;" class="s_percent"></span></p>
          </dd>
        </dl>
        <div id="product_share" class="clearfix">
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style ">
          <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
          <a class="addthis_button_tweet"></a>
          <a class="addthis_counter addthis_pill_style"></a>
          </div>
          <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4de0eff004042e7a"></script>
          <!-- AddThis Button END -->
        </div>
        <div id="product_options">
          <h3>Описание книги: </h3>
            <a href="../view/add.php?edit=<?=$result_select[$i]['book_id']?>" class="s_main_color" style="margin-left: 25px"><strong>Редактировать</strong></a>
            <a href="?bookdel=<?=$result_select[$i]['book_id']?>" class="s_main_color left"><strong>Удалить</strong></a>
        </div>
      </div>
      <div class="clear"></div>



      <div id="product_tags" class="grid_12 alpha omega">
        <h2 class="s_title_1"><span class="s_main_color">Жанр</span> </h2>
        <div class="clear"></div>
        <ul class="clearfix">
          <li><a href="#">Centrino</a></li>
          <li><a href="#">Intel</a></li>
          <li><a href="#">VAIO</a></li>
          <li><a href="#">laptop</a></li>
          <li><a href="#">notebook</a></li>
        </ul>
      </div>



      <div class="s_tabs grid_12 alpha omega">
        <ul class="s_tabs_nav clearfix">
          <li><a href="">Полное описание</a></li>
          
        </ul>
        <div class="s_tab_box">
        
          <div id="product_description">
            <div class="cpt_product_description ">
              Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines brand new technologies with advanced features inherited from Nikon&#39;s newly announced D3 professional digital SLR camera to offer serious photographers remarkable performance combined with agility.<br />
              <br />
              Similar to the D3, the D300 features Nikon&#39;s exclusive EXPEED Image Processing System that is central to driving the speed and processing power needed for many of the camera&#39;s new features. The D300 features a new 51-point autofocus system with Nikon&#39;s 3D Focus Tracking feature and two new LiveView shooting modes that allow users to frame a photograph using the camera&#39;s high-resolution LCD monitor. The D300 shares a similar Scene Recognition System as is found in the D3; it promises to greatly enhance the accuracy of autofocus, autoexposure, and auto white balance by recognizing the subject or scene being photographed and applying this information to the calculations for the three functions.<br />
              <br />
              The D300 reacts with lightning speed, powering up in a mere 0.13 seconds and shooting with an imperceptible 45-millisecond shutter release lag time. The D300 is capable of shooting at a rapid six frames per second and can go as fast as eight frames per second when using the optional MB-D10 multi-power battery pack. In continuous bursts, the D300 can shoot up to 100 shots at full 12.3-megapixel resolution. (NORMAL-LARGE image setting, using a SanDisk Extreme IV 1GB CompactFlash card.)<br />
              <br />
              The D300 incorporates a range of innovative technologies and features that will significantly improve the accuracy, control, and performance photographers can get from their equipment. Its new Scene Recognition System advances the use of Nikon&#39;s acclaimed 1,005-segment sensor to recognize colors and light patterns that help the camera determine the subject and the type of scene being photographed before a picture is taken. This information is used to improve the accuracy of autofocus, autoexposure, and auto white balance functions in the D300. For example, the camera can track moving subjects better and by identifying them, it can also automatically select focus points faster and with greater accuracy. It can also analyze highlights and more accurately determine exposure, as well as infer light sources to deliver more accurate white balance detection.
            </div>
            <!-- cpt_container_end -->
          </div>
        </div>
      </div>


      <div class="s_tabs grid_12 alpha omega">
        <ul class="s_tabs_nav clearfix">
          <li><a href="">Комментарии</a></li>
        </ul>
         <div class="s_tab_box">
          
          <div id="product_reviews" class="s_listing">
            <div class="s_review last">
              <p class="s_author"><strong>Shoppica</strong><small>(29/03/2011)</small></p>
              <div class="right">
              </div>
              <div class="clear"></div>
              <p>Vestibulum molestie tellus rhoncus nulla cursus quis dictum orci laoreet! metus. Vestibulum molestie tellus rhoncus nulla cursus quis dictum orci laoreet! metus.</p>
            </div>
            <div class="pagination"><div class="results">Showing 1 to 1 of 1 (1 Pages)</div></div>
            <h2 class="s_title_1"><span class="s_main_color">Write</span> Review</h2>
            <div id="review_title" class="clear"></div>
            <div class="s_row_3 clearfix">
              <label><strong>Your Name:</strong></label>
              <input type="text" />
            </div>
            <div class="s_row_3 clearfix">
              <label><strong>Your Review:</strong></label>
              <textarea style="width: 98%;" rows="8"></textarea>
              <p class="s_legend"><span style="color: #FF0000;">Note:</span> HTML is not translated!</p>
            </div>
            <div class="s_row_3 clearfix">
              <label><strong>Rating</strong></label>
              <span class="clear"></span> <span>Bad</span>&nbsp;
              <input type="radio" />
              &nbsp;
              <input type="radio" />
              &nbsp;
              <input type="radio" />
              &nbsp;
              <input type="radio" />
              &nbsp;
              <input type="radio" />
              &nbsp; <span>Good</span>
            </div>
            <span class="clear border_ddd"></span>
            <a class="s_button_1 s_main_color_bgr"><span class="s_text">Continue</span></a> <span class="clear"></span>
          </div>
        </div>
      </div> 




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
