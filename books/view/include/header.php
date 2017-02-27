<?php session_start(); 
require_once '../controller/user_exit.php'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Books</title>
<meta name="description" content="Books" />
<link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
<link rel="stylesheet" type="text/css" href="../stylesheet/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="../stylesheet/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stylesheet/color.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stylesheet/star.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/shoppica.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery.rater.js"></script>
<script type="text/javascript">
      $(function() {
        $('#testRater').rater({ postHref: 'http://jvance.com/TestRater.aspx' });
      });
      $(function() {
        $('#errorRater').rater({ postHref: 'http://jvance.com/TestRater.aspx?error=true' });
      });
</script>


</head>

<body class="s_layout_fixed">

<div id="wrapper"> 
 
  <!-- ********************** --> 
  <!--      H E A D E R       --> 
  <!-- ********************** -->
  <div id="header" class="container_12">
    <div class="grid_12">
    
    	<a id="site_logo" href="index.php">Books</a> 

      <div id="system_navigation" class="s_nav">
        <ul class="s_list_1 clearfix">
          <li><a href="index.php">Главная</a></li>
          <?php if ($_SESSION['login']) { ?>
                   <li><a href="cabinet.php"><?="Hi" . " " . $_SESSION['user'];?></a> 
                   <a style="margin-left: 5px" href="?exit=true">exit</a> </li>    
          <?php  } else { ?> <li><a href="login.php">Вход / регистрация</a></li> <?php } ?>
          <li><a href="static.php">О нас</a></li>
          <li><a href="contacts.php">Обратная связь</a></li>
        </ul>
      </div>

      <div id="site_search">
      	<a id="show_search" href="javascript:;" title="Search:"></a>
        <div id="search_bar" class="clearfix">
          <input type="text" id="filter_keyword" />
          <a class="s_button_1 s_secondary_color_bgr"><span class="s_text">Go</span></a> <a class="s_advanced s_main_color" href="">Advanced Search</a>
        </div>
      </div>
      
      
      <div id="categories" class="s_nav">
        <ul>
          <li id="menu_home"> <a href="index.php">Home</a> </li>
          <li> <a href="">Все</a></li>
          <?php
          require_once 'main_menu.php';
          ?>
          <li> <a href="">Авторы</a>
            <div class="s_submenu">
              <h3>Поиск по алфавиту</h3>
              <h3>Русский</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">А</a></li>
                <li><a href="">Б</a></li>
                <li><a href="">В</a></li>
                <li><a href="">Г</a></li>
                <li><a href="">Д</a></li>
                <li><a href="">Е</a></li>
                <li><a href="">Ж</a></li>
                <li><a href="">З</a></li>
                <li><a href="">И</a></li>
                <li><a href="">Й</a></li>
                <li><a href="">К</a></li>
                <li><a href="">Л</a></li>
                <li><a href="">М</a></li>
                <li><a href="">Н</a></li>
                <li><a href="">О</a></li>
                <li><a href="">П</a></li>
                <li><a href="">Р</a></li>
                <li><a href="">С</a></li>
                <li><a href="">Т</a></li>
                <li><a href="">У</a></li>
                <li><a href="">Ф</a></li>
                <li><a href="">Х</a></li>
                <li><a href="">Ц</a></li>
                <li><a href="">Ч</a></li>
                <li><a href="">Ш</a></li>
                <li><a href="">Щ</a></li>
                <li><a href="">Э</a></li>
                <li><a href="">Ю</a></li>
                <li><a href="">Я</a></li>
              </ul>
              <span class="clear border_eee"></span>
              <h3>English</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">A</a></li>
                <li><a href="">B</a></li>
                <li><a href="">C</a></li>
                <li><a href="">D</a></li>
                <li><a href="">E</a></li>
                <li><a href="">F</a></li>
                <li><a href="">G</a></li>
                <li><a href="">H</a></li>
                <li><a href="">I</a></li>
                <li><a href="">J</a></li>
                <li><a href="">K</a></li>
                <li><a href="">L</a></li>
                <li><a href="">M</a></li>
                <li><a href="">N</a></li>
                <li><a href="">O</a></li>
                <li><a href="">P</a></li>
                <li><a href="">Q</a></li>
                <li><a href="">R</a></li>
                <li><a href="">S</a></li>
                <li><a href="">T</a></li>
                <li><a href="">U</a></li>
                <li><a href="">V</a></li>
                <li><a href="">W</a></li>
                <li><a href="">X</a></li>
                <li><a href="">Y</a></li>
                <li><a href="">Z</a></li>
              </ul>
            </div>
          </li>
          <li><a href="">Серии</a>
            <div class="s_submenu">
              <h3>Поиск по алфавиту</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li><a href="">6</a></li>
                <li><a href="">7</a></li>
                <li><a href="">8</a></li>
                <li><a href="">9</a></li>
                <li><a href="">0</a></li>
              </ul>
              <h3>Русский</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">А</a></li>
                <li><a href="">Б</a></li>
                <li><a href="">В</a></li>
                <li><a href="">Г</a></li>
                <li><a href="">Д</a></li>
                <li><a href="">Е</a></li>
                <li><a href="">Ж</a></li>
                <li><a href="">З</a></li>
                <li><a href="">И</a></li>
                <li><a href="">Й</a></li>
                <li><a href="">К</a></li>
                <li><a href="">Л</a></li>
                <li><a href="">М</a></li>
                <li><a href="">Н</a></li>
                <li><a href="">О</a></li>
                <li><a href="">П</a></li>
                <li><a href="">Р</a></li>
                <li><a href="">С</a></li>
                <li><a href="">Т</a></li>
                <li><a href="">У</a></li>
                <li><a href="">Ф</a></li>
                <li><a href="">Х</a></li>
                <li><a href="">Ц</a></li>
                <li><a href="">Ч</a></li>
                <li><a href="">Ш</a></li>
                <li><a href="">Щ</a></li>
                <li><a href="">Э</a></li>
                <li><a href="">Ю</a></li>
                <li><a href="">Я</a></li>
              </ul>
              <span class="clear border_eee"></span>
              <h3>English</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">A</a></li>
                <li><a href="">B</a></li>
                <li><a href="">C</a></li>
                <li><a href="">D</a></li>
                <li><a href="">E</a></li>
                <li><a href="">F</a></li>
                <li><a href="">G</a></li>
                <li><a href="">H</a></li>
                <li><a href="">I</a></li>
                <li><a href="">J</a></li>
                <li><a href="">K</a></li>
                <li><a href="">L</a></li>
                <li><a href="">M</a></li>
                <li><a href="">N</a></li>
                <li><a href="">O</a></li>
                <li><a href="">P</a></li>
                <li><a href="">Q</a></li>
                <li><a href="">R</a></li>
                <li><a href="">S</a></li>
                <li><a href="">T</a></li>
                <li><a href="">U</a></li>
                <li><a href="">V</a></li>
                <li><a href="">W</a></li>
                <li><a href="">X</a></li>
                <li><a href="">Y</a></li>
                <li><a href="">Z</a></li>
              </ul>
            </div>
          </li>
          <li><a href="">Топ 100</a>
            <div class="s_submenu">
              <h3>Inside Shoes</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">Women's Shoes</a></li>
                <li><a href="">Men's Shoes</a></li>
                <li><a href="">Kids' Shoes</a></li>
                <li><a href="">Sportswear</a></li>
              </ul>
              <span class="clear border_eee"></span>
              <h3>Shoes Brands</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">Adidas</a></li>
                <li><a href="">Apple</a></li>
                <li><a href="">Armani</a></li>
                <li><a href="">Balenciaga</a></li>
                <li><a href="">Christian Dior</a></li>
                <li><a href="">Nike</a></li>
                <li><a href="">Samsung</a></li>
                <li><a href="">Sony</a></li>
              </ul>
            </div>
          </li>
          <li><a href="">Топ пользователей</a>
            <div class="s_submenu">
              <h3>Inside Shoes</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">Women's Shoes</a></li>
                <li><a href="">Men's Shoes</a></li>
                <li><a href="">Kids' Shoes</a></li>
                <li><a href="">Sportswear</a></li>
              </ul>
              <span class="clear border_eee"></span>
              <h3>Shoes Brands</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="">Adidas</a></li>
                <li><a href="">Apple</a></li>
                <li><a href="">Armani</a></li>
                <li><a href="">Balenciaga</a></li>
                <li><a href="">Christian Dior</a></li>
                <li><a href="">Nike</a></li>
                <li><a href="">Samsung</a></li>
                <li><a href="">Sony</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>     
    </div>
  </div>
  <!-- end of header --> 