<?php 
	require_once '../controller/select_one.php';
?>

      <form id="create" class="clearfix"  method="post" enctype="multipart/form-data">
        <h2 class="s_title_1"><span class="s_secondary_color">Заполните все</span> поля</h2>
        <div class="clear"></div>
        <p style="color: red; font-weight: bolder"><?=$edit_err;?></p>
        <div class="s_row_2 clearfix">
          <label><strong>Название</strong></label>
          <input name="book_name_edit" type="text" size="90" maxlength="100" value="<?=$result_sel_one[0]['book_name']?>" />
        </div>

        <div class="s_row_2 clearfix">
          <label><strong>Серия</strong></label>
          <input name="serial_edit" type="text" size="90" maxlength="100" value="<?=$result_sel_one[0]['book_serial']?>"/>
        </div>

        <div class="s_row_2 clearfix">
          <label class="required"><strong>Автор</strong></label>
          <input name="author_edit" type="text" size="30" maxlength="100" value="<?=$result_sel_one[0]['author']?>"/>
        </div>

        <div class="s_row_2 clearfix">
          <label><strong>Описание</strong></label>
          <textarea name="discr_edit" rows="10" cols="93"><?=$result_sel_one[0]['discr']?></textarea>
        </div>

        <div class="s_row_2 clearfix">
          <label for="file"><strong>Обложка:</strong></label>
          <input type="submit" class="s_button_1 s_main_color_bgr left " value="Удалить" name="myfile_img_del" >
          <img src="../files/img/<?=$result_sel_one[0]['book_img']?>" title="" alt="нет" style="width: 50px; height: 50px;">      
        </div>

        <div class="s_row_2 clearfix">
          <label for="file"><strong>Добавить обложку (max 3mb; jpg, jpeg, png):</strong></label>
          <input type="file" name="myfile_img" >
        </div>

        <div class="s_row_2 clearfix">
          <label for="file"><strong>Добавить файл (max 3mb; FB2, MOBI, PDF, RTF, TXT, DOC, DOCX):</strong></label>
          <input type="file" name="myfile_book" >
          <input class="s_button_1 s_main_color_bgr left " value="<?=$result_sel_one[0]['book_file']?>" >
        </div>
        
        <div class="s_row_2 clearfix">
          <label class="required"><strong>Издание</strong></label>
          <input name="edition_edit" type="text" size="30" value="<?=$result_sel_one[0]['edition_add']?>" />
        </div>

        <div class="s_row_2 clearfix">
          <label class="required"><strong>Год</strong></label>
          <input name="year_edit" type="text" size="30" maxlength="4" value="<?=$result_sel_one[0]['year_add']?>" />
        </div>
        
        <?php
             require_once '../view/include/add_genre.php';
        ?>
        <p><input type="submit" name="edit_save" class="s_button_1 s_main_color_bgr left " value="Сохранить"></p>
        
      </form>
