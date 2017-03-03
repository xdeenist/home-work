<?php
require_once '../controller/genre.php';
?>

<div class="s_row_2 clearfix">
  <label><strong>Выберите жанр</strong></label>
  <select size="8" style="width: 350px;" name="genre_add">
        <?php for ($i=0; $i < count($result); $i++) { 
                  if (is_null($result[$i]['genre_parent_id'])) { ?>
                      <optgroup label="<?=$result[$i]['genre_text']?>">
                   <?php } ?>
            <?php for ($k=0; $k < count($result); $k++) { 
                      if ($result[$k]['genre_parent_id'] == $result[$i]['genre_id'] ) { 
                          if ($result[$k]['genre_text'] == $defaultgenre[0]['genre_add_title']){ ?>
                             <option selected><?=$result[$k]['genre_text']?></option>
                          <?php } else {?> <option><?=$result[$k]['genre_text']?></option>  <?php } ?>                      
                <?php }
                    } ?>
        <?php } ?>
                      </optgroup>      
  </select>
</div>



