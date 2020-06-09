<?php 

function generateSalt()
{
	$salt = '';
	$saltLength = 8;
	for($i=0; $i<$saltLength; $i++)
	{
		$salt .= chr(mt_rand(33,126));
	}
	return $salt;
}

error_reporting(E_ALL); 
$dbconnect = mysqli_connect('root', 'root', '','bd_login_password');

if (isset($_POST['name']) and isset($_POST['password']) and $_POST['password'] !== '' and $_POST['name'] !== '') {
	$login = $_POST['name'];
	$SQL = "SELECT * FROM users WHERE login='$login'";
	$res=mysqli_query($dbconnect, $SQL);
    $result = mysqli_fetch_assoc($res);
	$password_hash = md5($_POST['password'].$result['salt']);
			if ($password_hash == $result['password']){
				setcookie("WebEngineerRestrictedArea",$_POST['name'].":".md5($result['salt'].":".$_SERVER['REMOTE_ADDR']),time()+60*60*24);
				header ("Location: ".$_SERVER['PHP_SELF']);
				exit();
				} 
			 else {
				$error_pass = TRUE;
			}
	}

?>

<html>
<head>
<title>Авторизация на основе cookies.</title>
<link rel="stylesheet">
</head>

<body>

<div class="logo">
	<div class="login">
    <h2>Авторизация:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="register">
    <span>Логин:</span>
    <input name="name" type="text" size="45"/><br/>
    <span>Пароль:</span>
    <input name="password" type="password" size="45"/>
    <input class="submit" type="submit" value="Войти"/>
	<br/><a href="registration.php">Регистрация</a>
    </form>
    </div>
    <?php
	 if (@$error_pass){
	?>
    <div class="error">
    <span>Введенный пароль не верный.</span>
    </div>
    <?php } ?>
</div>
</body>
</html>