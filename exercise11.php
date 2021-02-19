<?php
	if(isset($_POST['submit']))
	{
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$phno = $_POST['phno'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		if(empty($name)||empty($email)||empty($phno)||empty($pass)||empty($cpass))
			echo "<script>alert('Every field must be filled!!!');</script>";
		else
		{
			$message = "";
			$pattern = "/[a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?/";
			if(preg_match($pattern, $name))
				$message.="|Invalid name";
			$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if(!preg_match($pattern, $email))
				$message.=" |Invalid email";
			$pattern = (string)$phno;
			if(strlen((string)$phno)!=10||($pattern[0])==0)
				$message.=" |Invalid phone number";
			$pattern = '/[\'^$%&*()}<>{@#~?,|=_+-]/';
			if((strtoupper($pass)===$pass)||(strtolower($pass)===$pass)||(preg_match('/[0-9]/',$pass)==0)||(!preg_match($pattern, $pass)))
				$message.=" |Password must atleast have an uppercase character, a lowercase character, a special character and a digit";
			else if (strlen($pass)<8)
				$message.=" |Length of password must be atleast 8";
			if($pass!=$cpass)
					$message.=" |Password mismatch|";
			if(empty($message))
				echo "<script>alert('Data submitted successfully..');</script>";
			else
			{
				echo "<script>alert('$message');</script>";
			}

		}
	}
?>
<html>
<head>
	<title>PHP Form Validation</title>
</head>
<body>
	<form name="form" action="exercise11.php" method="post">
		Name:<input type="text" name="name" placeholder="Enter your name"><br>
		Email:<input type="text" name="email" placeholder="Enter your email"><br>
		Phone no:<input type="number" name="phno" placeholder="Enter your phone number"><br>
		Password:<input type="password" name="pass" placeholder="Enter password"><br>
		Confirm password:<input type="password" name="cpass" placeholder="Re-enter password"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>