<?php
$dbconnect = mysqli_connect('root', 'root', '','bd_login_password');

if(@$_POST['exit']) 
	{
		setcookie('WebEngineerRestrictedArea', '', time()-60*60*24); 
		header ("Location: ".$_SERVER['PHP_SELF']);
		exit();
	}

if (isset($_COOKIE['WebEngineerRestrictedArea'])){
	$access=FALSE;
	$data_array = explode(":",$_COOKIE['WebEngineerRestrictedArea']);
	$SQL3 = "SELECT * FROM users WHERE name='$data_array[0]'";
	$user_update = mysqli_query($dbconnect, $SQL3);
	$result = @mysqli_fetch_assoc($user_update);
	if ($user_update) {
		$cookies_hash = $data_array[1]; 
		$evaluate_hash = md5($result['salt'].":".$_SERVER['REMOTE_ADDR']);
		if ($cookies_hash == $evaluate_hash) {
				$access = TRUE;
			} 
	} 
}

if (isset($access) and $access = TRUE) {?>
<form action="<?php echo $_SERVER['PHP_SELF'];
?>" method="post">
<?php echo "Здраствуйте, ".$data_array[0]; ?></br>
<input type='submit' name='exit' value='Выйти'/>
</form>
<?php 
	} else {
		include ($_SERVER['DOCUMENT_ROOT'].'/login.php');
		exit();
	}
?>