<?php ?>



      <form id="create" class="clearfix"  method="post" enctype="multipart/form-data">
        <h2 class="s_title_1"><span class="s_secondary_color">Заполните все</span> поля</h2>
        <div class="clear"></div>
        <p style="color: red; font-weight: bolder"><?=$add_err . $img_insert;?></p>
        <div class="s_row_2 clearfix">
          <label><strong>Название</strong></label>
          <input name="book_name" type="text" size="90" maxlength="100"/>
        </div>

        <div class="s_row_2 clearfix">
          <label><strong>Серия</strong></label>
          <input name="serial" type="text" size="90" maxlength="100"/>
        </div>

        <div class="s_row_2 clearfix">
          <label class="required"><strong>Автор</strong></label>
          <input name="author" type="text" size="30" maxlength="100"/>
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
          <input name="year_add" type="text" size="30" maxlength="4"/>
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
