<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>4 лаба</title>
</head>
<body>
<form  method="post">
    Name <input type="text" name="name" placeholder="Enter your name" required><br> <br>
    E-mail <input type="text" name="email" placeholder="Enter your e-mail" required><br><br>
    <input type="submit" value="Send!">
</form>
</body>

<?php
	function isCorrectEmail($email) {
		return preg_match("/^\S+(\.\S+)*@[A-z]+(\.[A-z]+)+$/", $email) === 1;
	}

	if(isset($_POST['email'])){
		if (isCorrectEmail($_POST['email'])) {
			echo "<pre><span class=\"text\">The e-mail ".$text." is correct. </span></pre>";

			$outputFile = fopen("outputFile.txt", 'a');
			$outputData = $_POST['name'] . ' ' . $_POST['email'] . PHP_EOL;
			fwrite($outputFile, $outputData);
			fclose($outputFile);
		} else {
			echo "<pre><span class=\"text\">The e-mail ".$text." is incorrect. </span></pre>";
		}    
	}
?>