<?php session_start(); 
require_once '../controller/user_exit.php';
require_once '../controller/search.php';
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
        <form method="post">
          <input type="text" id="filter_keyword" name="search"/>
          <input type="submit" name="search_submit" value="Поиск" class="s_button_1 s_secondary_color_bgr" /><br />
        </form>
        </div>
      </div>
      
      
      <div id="categories" class="s_nav">
        <ul>
          <li id="menu_home"> <a href="index.php">Home</a> </li>
          <li> <a href="../view/list.php?list=all">Все</a></li>
          <?php
          require_once 'main_menu.php';
          ?>
          <li> <a href="">Авторы</a>
            <div class="s_submenu">
              <h3>Поиск по алфавиту</h3>
              <h3>Русский</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="../view/list.php?albt=a">А</a></li>
                <li><a href="../view/list.php?albt=б">Б</a></li>
                <li><a href="../view/list.php?albt=в">В</a></li>
                <li><a href="../view/list.php?albt=г">Г</a></li>
                <li><a href="../view/list.php?albt=д">Д</a></li>
                <li><a href="../view/list.php?albt=е">Е</a></li>
                <li><a href="../view/list.php?albt=ж">Ж</a></li>
                <li><a href="../view/list.php?albt=з">З</a></li>
                <li><a href="../view/list.php?albt=и">И</a></li>
                <li><a href="../view/list.php?albt=й">Й</a></li>
                <li><a href="../view/list.php?albt=к">К</a></li>
                <li><a href="../view/list.php?albt=л">Л</a></li>
                <li><a href="../view/list.php?albt=м">М</a></li>
                <li><a href="../view/list.php?albt=н">Н</a></li>
                <li><a href="../view/list.php?albt=о">О</a></li>
                <li><a href="../view/list.php?albt=п">П</a></li>
                <li><a href="../view/list.php?albt=р">Р</a></li>
                <li><a href="../view/list.php?albt=с">С</a></li>
                <li><a href="../view/list.php?albt=т">Т</a></li>
                <li><a href="../view/list.php?albt=у">У</a></li>
                <li><a href="../view/list.php?albt=ф">Ф</a></li>
                <li><a href="../view/list.php?albt=х">Х</a></li>
                <li><a href="../view/list.php?albt=ц">Ц</a></li>
                <li><a href="../view/list.php?albt=ч">Ч</a></li>
                <li><a href="../view/list.php?albt=ш">Ш</a></li>
                <li><a href="../view/list.php?albt=щ">Щ</a></li>
                <li><a href="../view/list.php?albt=э">Э</a></li>
                <li><a href="../view/list.php?albt=ю">Ю</a></li>
                <li><a href="../view/list.php?albt=я">Я</a></li>
              </ul>
              <span class="clear border_eee"></span>
              <h3>English</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="../view/list.php?albt=a">A</a></li>
                <li><a href="../view/list.php?albt=b">B</a></li>
                <li><a href="../view/list.php?albt=c">C</a></li>
                <li><a href="../view/list.php?albt=d">D</a></li>
                <li><a href="../view/list.php?albt=e">E</a></li>
                <li><a href="../view/list.php?albt=f">F</a></li>
                <li><a href="../view/list.php?albt=g">G</a></li>
                <li><a href="../view/list.php?albt=h">H</a></li>
                <li><a href="../view/list.php?albt=i">I</a></li>
                <li><a href="../view/list.php?albt=j">J</a></li>
                <li><a href="../view/list.php?albt=k">K</a></li>
                <li><a href="../view/list.php?albt=l">L</a></li>
                <li><a href="../view/list.php?albt=m">M</a></li>
                <li><a href="../view/list.php?albt=n">N</a></li>
                <li><a href="../view/list.php?albt=o">O</a></li>
                <li><a href="../view/list.php?albt=p">P</a></li>
                <li><a href="../view/list.php?albt=q">Q</a></li>
                <li><a href="../view/list.php?albt=r">R</a></li>
                <li><a href="../view/list.php?albt=s">S</a></li>
                <li><a href="../view/list.php?albt=t">T</a></li>
                <li><a href="../view/list.php?albt=u">U</a></li>
                <li><a href="../view/list.php?albt=v">V</a></li>
                <li><a href="../view/list.php?albt=w">W</a></li>
                <li><a href="../view/list.php?albt=x">X</a></li>
                <li><a href="../view/list.php?albt=y">Y</a></li>
                <li><a href="../view/list.php?albt=z">Z</a></li>
              </ul>
            </div>
          </li>
          <li><a >Серии</a>
            <div class="s_submenu">
              <h3>Поиск по алфавиту</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="../view/list.php?srl=1">1</a></li>
                <li><a href="../view/list.php?srl=2">2</a></li>
                <li><a href="../view/list.php?srl=3">3</a></li>
                <li><a href="../view/list.php?srl=4">4</a></li>
                <li><a href="../view/list.php?srl=5">5</a></li>
                <li><a href="../view/list.php?srl=6">6</a></li>
                <li><a href="../view/list.php?srl=7">7</a></li>
                <li><a href="../view/list.php?srl=8">8</a></li>
                <li><a href="../view/list.php?srl=9">9</a></li>
                <li><a href="../view/list.php?srl=0">0</a></li>
              </ul>
              <h3>Русский</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="../view/list.php?srl=a">А</a></li>
                <li><a href="../view/list.php?srl=б">Б</a></li>
                <li><a href="../view/list.php?srl=в">В</a></li>
                <li><a href="../view/list.php?srl=г">Г</a></li>
                <li><a href="../view/list.php?srl=д">Д</a></li>
                <li><a href="../view/list.php?srl=е">Е</a></li>
                <li><a href="../view/list.php?srl=ж">Ж</a></li>
                <li><a href="../view/list.php?srl=з">З</a></li>
                <li><a href="../view/list.php?srl=и">И</a></li>
                <li><a href="../view/list.php?srl=й">Й</a></li>
                <li><a href="../view/list.php?srl=к">К</a></li>
                <li><a href="../view/list.php?srl=л">Л</a></li>
                <li><a href="../view/list.php?srl=м">М</a></li>
                <li><a href="../view/list.php?srl=н">Н</a></li>
                <li><a href="../view/list.php?srl=о">О</a></li>
                <li><a href="../view/list.php?srl=п">П</a></li>
                <li><a href="../view/list.php?srl=р">Р</a></li>
                <li><a href="../view/list.php?srl=с">С</a></li>
                <li><a href="../view/list.php?srl=т">Т</a></li>
                <li><a href="../view/list.php?srl=у">У</a></li>
                <li><a href="../view/list.php?srl=ф">Ф</a></li>
                <li><a href="../view/list.php?srl=х">Х</a></li>
                <li><a href="../view/list.php?srl=ц">Ц</a></li>
                <li><a href="../view/list.php?srl=ч">Ч</a></li>
                <li><a href="../view/list.php?srl=ш">Ш</a></li>
                <li><a href="../view/list.php?srl=щ">Щ</a></li>
                <li><a href="../view/list.php?srl=э">Э</a></li>
                <li><a href="../view/list.php?srl=ю">Ю</a></li>
                <li><a href="../view/list.php?srl=я">Я</a></li>
              </ul>
              <span class="clear border_eee"></span>
              <h3>English</h3>
              <ul class="s_list_1 clearfix">
                <li><a href="../view/list.php?srl=a">A</a></li>
                <li><a href="../view/list.php?srl=b">B</a></li>
                <li><a href="../view/list.php?srl=c">C</a></li>
                <li><a href="../view/list.php?srl=d">D</a></li>
                <li><a href="../view/list.php?srl=e">E</a></li>
                <li><a href="../view/list.php?srl=f">F</a></li>
                <li><a href="../view/list.php?srl=g">G</a></li>
                <li><a href="../view/list.php?srl=h">H</a></li>
                <li><a href="../view/list.php?srl=i">I</a></li>
                <li><a href="../view/list.php?srl=j">J</a></li>
                <li><a href="../view/list.php?srl=k">K</a></li>
                <li><a href="../view/list.php?srl=l">L</a></li>
                <li><a href="../view/list.php?srl=m">M</a></li>
                <li><a href="../view/list.php?srl=n">N</a></li>
                <li><a href="../view/list.php?srl=o">O</a></li>
                <li><a href="../view/list.php?srl=p">P</a></li>
                <li><a href="../view/list.php?srl=q">Q</a></li>
                <li><a href="../view/list.php?srl=r">R</a></li>
                <li><a href="../view/list.php?srl=s">S</a></li>
                <li><a href="../view/list.php?srl=t">T</a></li>
                <li><a href="../view/list.php?srl=u">U</a></li>
                <li><a href="../view/list.php?srl=v">V</a></li>
                <li><a href="../view/list.php?srl=w">W</a></li>
                <li><a href="../view/list.php?srl=x">X</a></li>
                <li><a href="../view/list.php?srl=y">Y</a></li>
                <li><a href="../view/list.php?srl=z">Z</a></li>
              </ul>
            </div>
          </li>
          <li><a href="">Топ книг</a>
            <div class="s_submenu">
              <h3>Топ популярности книг</h3>
                <?php 
                require_once 'header_most_popular.php'
                ?>
            </div>
          </li>
          <li><a href="">Топ пользователей</a>
            <div class="s_submenu">
                <?php 
                require_once 'header_top_users.php'
                ?>
            </div>
          </li>
        </ul>
      </div>     
    </div>
  </div>
  <!-- end of header --> 