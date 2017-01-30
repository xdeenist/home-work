<?php
 // error_reporting(E_ALL);
 // ini_set('display_errors', 1);
//подключение к базе 

try {
    $link = new PDO('mysql:host=localhost;dbname=blog', 'level', 'pass');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
} 
//изъятие всех постов из базы
$select = $link->query("SELECT post.post_id, post.post_title, post.post_min_text, post.post_text, post.post_create_datetime, post.post_update_datetime, group_concat(tag.tag_title) as tags FROM post LEFT JOIN post_to_tag USING (post_id) LEFT JOIN tag USING (tag_id) group by post.post_id DESC");
$res_select = $select->fetchAll(PDO::FETCH_ASSOC);



//добавление постов
if (!empty($_POST['post_title_add'])and !empty($_POST['post_min_text_add'])){
    if (!empty($_POST['post_text_add'])){
        $insert = $link ->query("INSERT INTO post SET post.post_title = '{$_POST['post_title_add']}',post.post_min_text = '{$_POST['post_min_text_add']}',post.post_text='{$_POST['post_text_add']}',post.post_create_datetime = NOW()");
        $insert_post_id = $link->lastInsertId();//id последней добавленной строки
        if (!empty($_POST['tag_add'])) {
            $tag_arr = explode(',', $_POST['tag_add']);
            foreach ($tag_arr as $tags) {
                    //проверяет есть ли такой тег к таблице тегов
                    $insert_valid = $link ->query("SELECT * FROM tag WHERE tag_title ='$tags'");
                    $result_valid = $insert_valid->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($result_valid)) {
                    //print_r($result_valid);
                    //print_r($result_valid[0]['tag_id']);
                    $ins_tag_id = $result_valid[0]['tag_id'];
                    $insert_post_tag = $link ->query("INSERT INTO post_to_tag SET post_to_tag.post_id = '$insert_post_id', post_to_tag.tag_id = '$ins_tag_id'");
                } else {
                        $insert = $link ->query("INSERT INTO tag SET tag_title ='$tags'"); // если нет, то добавляет
                        $insert_tag_id = $link->lastInsertId(); //id последней добавленной строки
                        $insert_post_tag = $link ->query("INSERT INTO post_to_tag SET post_to_tag.post_id = '$insert_post_id', post_to_tag.tag_id = '$insert_tag_id'");
                }
            }
            header("Location:../index.php");
        }
    }
}



//изъятие полного поста 
if($_GET['id']){
    $getid = $_GET['id'];
    $select_update = $link->query("SELECT post.post_id, post.post_title, post.post_min_text, post.post_text, post.post_create_datetime, group_concat(tag.tag_title) as tags FROM post LEFT JOIN post_to_tag USING (post_id) LEFT JOIN tag USING (tag_id) WHERE post_id='$getid' group by post.post_id");
    $res_select_update = $select_update ->fetchAll(PDO::FETCH_ASSOC);
}


//изменение поста
if($_POST['save']) {
    $update = $link->query("UPDATE post SET post_title='{$_POST['author_edit']}',post_min_text = '{$_POST['up_min_article']}',post_text = '{$_POST['full_edit']}',post_create_datetime='{$_POST['time_edit']}',post_update_datetime=NOW() WHERE post_id=" . $_GET['id']);
    if (!$update) {
        echo "PDO::errorInfo():";
        print_r($link->errorInfo());
        echo("<body><div><h3>Please enter the correct data!</div></body>");
    } else $sample = $update->fetchAll();
        
        if (!empty($_POST['tag_edit'])) {
            $tag_arr_edit = explode(',', $_POST['tag_edit']);
            foreach ($tag_arr_edit as $tags_edit) {
                $insert_edit = $link ->query("INSERT INTO tag SET tag_title ='$tags_edit'");
                $insert_tag_id_edit = $link->lastInsertId(); 
                $insert_edit_tag = $link ->query("INSERT INTO post_to_tag SET post_to_tag.post_id = '$getid', post_to_tag.tag_id = '$insert_tag_id_edit'");
            }
        }
    header("Location:../index.php");
}


//извлечение постов по тегу
if($_GET['tag']) {
    $gettag = $_GET['tag'];
    $select_post_tag = $link ->query("SELECT tag_id FROM tag WHERE tag_title = '$gettag'");
    if (!$select_post_tag) {
        echo "PDO::errorInfo():";
        print_r($link->errorInfo());
        echo("<body><div><h3>Please enter the correct data!</div></body>");
    } else $insert_tag_id = $select_post_tag->fetchAll();
    // print_r($insert_tag_id);
    $tag_id_for_post = $insert_tag_id[0][0];
    $select_posts_for_tag = $link ->query("SELECT post.* from post LEFT JOIN post_to_tag USING (post_id) WHERE post_to_tag.tag_id = '$tag_id_for_post' ORDER BY post.post_create_datetime DESC");
    $result_posts_for_tag = $select_posts_for_tag ->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result_posts_for_tag);
}


//удаление поста
if($_GET['del']) {
    $delete = $link->query("DELETE FROM post WHERE post_id=" . $_GET['del']);
    header("Location:index.php");
}
