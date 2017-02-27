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
                      if ($result[$k]['genre_parent_id'] == $result[$i]['genre_id'] ) { ?>        
                         <option><?=$result[$k]['genre_text']?></option>
                <?php }
                    } ?>
        <?php } ?>
                      </optgroup>      
  </select>
</div>



