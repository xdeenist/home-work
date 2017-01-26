<?php
//session_start();
// require_once '/var/www/html/npma/vendor/autoload.php';
// Twig_Autoloader::register();
// $loader = new Twig_Loader_Filesystem('/var/www/html/npma/templates');
// $twig = new Twig_Environment($loader);
$messql = "";

//Login
if (isset($_POST['db']) and isset($_POST['login']) and isset($_POST['password'])) { 
  $db = $_POST['db'];
  $login = $_POST['login']; 
  $password=$_POST['password'];
  $_SESSION['db'] = $db;
  $_SESSION['login'] = $login;
  $_SESSION['password'] = $password; 
  try {
      $dbh = new PDO("mysql:host=localhost;dbname=$db", $login, $password);
      $_SESSION['inloged'] = true;


  } catch (PDOException $e) {
      $error = $e->getMessage();
      echo  ("<body><div><h3>Please enter the correct data!</div></body>");
      $_SESSION['inloged'] = false;
  }
}
//sql 
if ($_SESSION['inloged'] == true) {
      $sdb = $_SESSION['db'];
      $slogin = $_SESSION['login'];
      $spassword = $_SESSION['password']; 
         if (isset($_POST['messql'])){ 
            $messql = $_POST['messql'];
            try {
                 $dbh = new PDO("mysql:host=localhost;dbname=$sdb", $slogin, $spassword);
                 $result = $dbh->query($messql);
                 if (!$result) {
                       echo "\PDO::errorInfo():\n";
                       print_r($dbh->errorInfo());
                       echo  ("<body><div><h3>Please enter the correct data!</div>" . "<a href='index.php'> <b>Back</b> </a></body>");
                 } else $sample = $result->fetchAll();
                 
                 //var_dump($sample);
                 
            if ($sample) {
                 foreach (array_keys($sample[0]) as $field){
                    if (!is_numeric($field)){
                        $fields[] = $field;
                    }
                 }
            }
            //var_dump($fields);
            $dbh = null;
            $rowCount = $result->rowCount();
            } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            
            die();
        } 
    } else $messql = "";
}

//destroy session
if(isset($_GET['exit'])) {
   session_destroy(); 
   #redirect
   header('Location: index.php');
exit;
}



?>


