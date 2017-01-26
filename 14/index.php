<?php
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);
 session_start();
 include 'include/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>npma</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
</head>
<body>
<?php 
if($_SESSION['inloged'] == false) { ?>

		<div class="form">
            <form class="login-form" action="" method="post">
                 <input type="text" placeholder="database" name="db"/>
                 <input type="text" placeholder="username" name="login"/>
                 <input type="password" placeholder="password" name="password"/>
                 <button type="submit">Login</button>
            </form>
<?php 
}else {
    echo "Welcome " . $_SESSION['login'] . "!" . " You choose the " . "''" . $_SESSION['db'] . "''" . " base" . "<body><div><a href='?exit'>quit</a></div></body>";
} 

if($_SESSION['inloged'] == true) { ?>

        </div class="areaform"> 
             <form method="post">
             <textarea name="messql" required rows="10" style="width: 33%" placeholder="Input your code"><?php echo $_POST['messql']?></textarea>

             <input type="submit" value='Sent'>
             </form>
	    </div>

<div class="rowCount" role="alert">
<?php if ($rowCount) { echo "rowCount is: " . $rowCount; } ?>    
</div>

<?php if ($sample){ ?>
<div class="table">
    <table style="width: 50%" border="1">
    <tr>
        <?php foreach ($fields as $field) {
            echo "<td>$field</td>";
        } ?>
    </tr>
        <?php foreach ($sample as $sampl) {
            ?>
             <tr> <?php
                foreach ($sampl as $key => $value) {
                        if (is_numeric($key)) {
                            echo "<td>$value</td>";
                        }                   
                }
            ?> </tr> <?php 
        } 

}
}?>

    </table>
</div>


</body>
</html>
