<html>
  
<?php 

function generateSalt()
{
	$salt = '';
	$saltLength = 8;
	for($i=0; $i<$saltLength; $i++) {
		$salt .= chr(mt_rand(33,126));
	}
	return $salt;
}

if ($_POST) {
   		$good = true; 

   		if ((strlen($_POST['login'])<2) || (strlen($_POST['password'])<5)) {
 		    echo "Поля логин и пароль слишком маленькие!";
 		    $good = false;
	    }

	    if ($_POST['password'] != $_POST['repassword']) {
	    	echo "Пароли не совпадают!";
	        $good = false;
	    }

	    if ($good) {
	    	$link = mysqli_connect('root', 'root', '', 'bd_login_password');
	    	if ($link) {  
				$query=" SELECT * FROM users WHERE login='$login' ";
				$isLoginFree = mysqli_fetch_assoc(mysqli_query($link, $query));
				if (empty($isLoginFree)) {
					$salt = generateSalt(); 
					$password=$_POST['password'] ;
					$saltedPassword = md5($password.$salt); 
					$login=$_POST['login'];		
					$query1 = "INSERT INTO users(login,password,salt)  VALUES ('$login','$saltedPassword','$salt')";
					$res=mysqli_query($link,$query1); 

					if ($res) {
						echo 'Вы успешно зарегистрированы!'; ?>
			        	<br/><a href="index.php">На главную</a>
						<?php
					} else echo 'Вы не зарегистрированы!'; 
				} else {
					echo 'Такой логин уже занят!';
				}
			} else {
      			echo "Не могу присоедениться к серверу бд!";
      		}
 
    mysqli_close($link);
	}
} else {
  ?>
    <head>
	    <title>Регистрация</title>
	    <link rel="stylesheet"/>
    </head>
    <body>
	    <div class="logo">
		<div class="login">
	    <h2>Регистрация:</h2>
	    <form action="registration.php" method="post">
		    <span>Логин:</span>
		    <input name="login" type="text" size="45"/><br/>
		    <span>Пароль:</span>
		    <input name="password" type="password" size="45"/><br/>
			<span>Пароль ещё раз:</span>
		    <input name="repassword" type="password" size="45"/><br/>
		    <input class="submit" type="submit" value="Регистрация"/>
			<br/><a href="login.php">На главную</a>
	    </form>
	    </div>
	</body>
  <?php
  } 
  ?>
</html>