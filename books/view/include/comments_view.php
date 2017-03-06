<?php 
   // require_once '../controller/comments.php';
// var_dump($select_com_edit);
?>



<div class="s_tabs grid_12 alpha omega">
  <ul class="s_tabs_nav clearfix">
    <li><a >Комментарии</a></li>
    <li><p><a href="../view/view.php?id=<?=$_GET['id']?>&comment=mine#comment">Оставить комментарий</a></p></li>
  </ul>
    <div class="s_tab_box">          
    <div id="product_reviews" class="s_listing">
    <?php 
      require '../controller/recursion_comment.php';
     ?>
      <!-- <div class="pagination"><div class="results">Showing 1 to 1 of 1 (1 Pages)</div></div> <--></-->
    <?php if ($_GET['comment'] == "mine" || is_numeric($_GET['comment'])) { ?>
    <h4 class="s_title_1"><span class="s_main_color">Оставить</span> Коментарий:</h4>
    <div id="review_title" class="clear"></div>
      <form method="post">
        <div class="s_row_3 clearfix">          
          <textarea style="width: 98%;" rows="3" name="comment_text" maxlength="255"></textarea>
        </div>
        <!-- <input type="submit" name="save_comment" class="s_button_1 s_main_color_bgr left " value="Отправить"><span class="clear"></span> -->
        <button class="s_button_1 s_main_color_bgr" type="submit" name="save_comment"><span class="s_text">Отправить</span></button><span class="clear"></span>
      </form>
      <div id="answer"></div>
      <div id="edit"></div>
      <div id="comment"></div>
    <?php } elseif($_GET['comment_edit']){ ?>
                  <p class="error" style="color: red; font-weight: bolder; text-align: center";><?=$err_edit;?></p>
                  <h4 class="s_title_1"><span class="s_main_color">Оставить</span> Коментарий:</h4>
                  <div id="review_title" class="clear"></div>
                    <form method="post">
                      <div class="s_row_3 clearfix">          
                        <textarea style="width: 98%;" rows="3" name="comment_text_edit" maxlength="255"><?=$select_com_edit[0]['comment_text']?></textarea>
                      </div>
                      <!-- <input type="submit" name="save_comment" class="s_button_1 s_main_color_bgr left " value="Отправить"><span class="clear"></span> -->
                      <button class="s_button_1 s_main_color_bgr" type="submit" name="save_edit_comment"><span class="s_text">Отправить</span></button><span class="clear"></span>
                    </form>
                    <div id="answer"></div>
                    <div id="edit"></div>
                    <div id="comment"></div>
    <?php } ?>
    </div>
  </div>
</div> 