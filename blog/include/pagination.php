<?php
session_start();
require_once '/var/www/html/blog/include/db.php';
require_once '/var/www/html/blog/include/valid.php';
// Объект предоставляющий методы для работы БД
// например объект класса PDO
// $pdo      = new PDO('mysql:dbname=... ;');
 
// Результирующий массив с элементами, выбранными с учётом LIMIT:
$items    = array();
 
// Число вообще всех элементов ( без LIMIT ) по нужным критериям.
$allItems = 0;
 
// HTML - код постраничной навигации.
$html     = NULL;
 
// Количество элементов на странице. 
// В системе оно может определяться например конфигурацией пользователя: 
$limit    = 4;
 
// Количество страничек, нужное для отображения полученного числа элементов:
$pageCount = 0;
 
// Содержит наш GET-параметр из строки запроса. 
// У первой страницы его не будет, и нужно будет вместо него подставить 0!!!
$start    = isset($_GET['page'])   ? intval( $_GET['page'] )   : 0 ;
 
// Некий критерий выборки - показан для естественности примера 
// В реальности может быть идентификатором какой нибудь категории:
// $critery  = isset($_GET['critery']) ? intval( $_GET['critery'] ) : 0 ;
 
// Запрос для выборки целевых элементов:
$sql = $link->query("SELECT post.* , group_concat(tag.tag_title) as tags FROM post LEFT JOIN post_to_tag USING (post_id) LEFT JOIN tag USING (tag_id) group by post.post_id DESC LIMIT $start,$limit ");

$res_select = $sql->fetchAll(PDO::FETCH_ASSOC);
 
if( is_array($items) ) {
     
    for($i=0;$i<count($res_select);$i++) { ?>
         
        	<div class="note">
				<p>
					<span class="date"><?=$res_select[$i]['post_create_datetime'];?></span>
					<a href="include/note.php?id=<?=$res_select[$i]['post_id']?>"><?=$res_select[$i]['post_title'];?></a>
				</p>
				<p>
					<?=$res_select[$i]['post_min_text'];?>
				</p>
				<?php if ($res_select[$i]['tags']) {   // выборка тегов
					     $value['tags'] = explode(',', $res_select[$i]['tags']);
					     foreach ($value['tags'] as $tag) {
					     	    //print_r($tag);?>
                                  <span class="print_tag">
                                        <a href='include/posttotag.php?tag=<?=$tag?>'><?="#".$tag?></a>
                                  </span>
					     <?php  } ?>  
				<?php } ?>
                <?php if($_SESSION['logined']): //кнопки удалить и редактировать?> 
				<p class="nav">
					<a href="index.php?page=<?=$res_select[$i]['post_id']?>&del=<?=$res_select[$i]['post_id']?>">удалить</a> |
					<a href="include/edit.php?id=<?=$res_select[$i]['post_id']?>">редактировать</a>
				</p>
                <?php endif;?>
			</div>
     <?php    
    }
     
}
 
// СОБСТВЕННО, ПОСТРАНИЧНАЯ НАВИГАЦИЯ:          
// Получаем количество всех элементов:
$sql_count = $link ->query("SELECT COUNT(post_id) AS count FROM post");
$allItems_count = $sql_count->fetch(PDO::FETCH_OBJ)->count;
 
// Здесь округляем в большую сторону, потому что остаток
// от деления - кол-во страниц тоже нужно будет показать
// на ещё одной странице.
$pageCount = ceil( $allItems_count / $limit);
 
// Начинаем с нуля! Это даст нам правильные смещения для БД
for( $i = 0; $i < $pageCount; $i++ ) {    
    // Здесь ($i * $limit) - вычисляет нужное для каждой страницы  смещение, 
    // а ($i + 1) - для того что бы нумерация страниц начиналась с 1, а не с 0
    $html .= '<li><a href="index.php?page=' . ($i * $limit)  . '">' . ($i + 1)  . '</a></li>';
}
 
// Собственно выводим на экран:
echo '<ul class="pagination">' . $html . '</ul>';










