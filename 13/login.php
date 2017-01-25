<?php
//Стартуем сессии
 session_start();

    //заносим введенный логин пароль в переменную 
if (isset($_POST['login']) and isset($_POST['password'])) { 
  $login = $_POST['login']; 
  $password=$_POST['password']; 
  $credentials = array( 'login' => 'admin','password' => 'qwerty');
        if (($credentials['login'] == $login) and ($credentials['password'] == $password)){ //если совпадает с нашим логином из массива
         $_SESSION['inloged'] = true;
         $_SESSION['loged'] = $login;
         $_SESSION['loginTimes'][] = time();
         echo "Welcome " . $login . "!" . "<br/>";
?>

    <table border='1' cellspacing="0">
    <th>Log history:</th>
<?php
    foreach($_SESSION['loginTimes'] as $time):
?>
    <tr><td><?php echo  date("Y-m-d H:i:s", $time) . "<br/>"; ?></td></tr>
<?php endforeach; ?>
    </table>
<a href="index.php">quit</a>
<?php
        } else {
          echo "Your pass is wrong!";
          $_SESSION['inloged'] = false;
          }
}
?>

<?php
if(empty($_POST['login']) or empty($_POST['password'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="login-page">
		<div class="form">
            <form class="login-form" action="" method="post">
                 <input type="text" placeholder="username" name="login"/>
                 <input type="password" placeholder="password" name="password"/>
                 <button type="submit">Login</button>
            </form>

        </div>
	</div>
</body>
</html>
<?php } ?>




<?php
//var_dump($_POST);
print_r($_SESSION);
print_r($login);
print_r($password);
?>

