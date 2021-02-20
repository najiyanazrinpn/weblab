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
			$pattern = str_replace(" ", 'a', $name);
			if(preg_match("/[^a-zA-Z]/", $pattern))
				$message.="| Invalid name";
			$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if(!preg_match($pattern, $email))
				$message.=" | Invalid email";
			$pattern = (string)$phno;
			if(strlen((string)$phno)!=10||($pattern[0])==0)
				$message.=" | Invalid phone number";
			$pattern = '/[\'^$%&*()}<>{@#~?,|=_+-]/';
			if((strtoupper($pass)===$pass)||(strtolower($pass)===$pass)||(preg_match('/[0-9]/',$pass)==0)||(!preg_match($pattern, $pass)))
				$message.=" | Password must atleast have an uppercase character, a lowercase character, a special character and a digit";
			else if (strlen($pass)<8)
				$message.=" | Length of password must be atleast 8";
			if($pass!=$cpass)
					$message.=" | Password mismatch |";
			if(empty($message))
				echo "<script>alert('Data submitted successfully..');</script>";
			else
			{
				$message = "Error:".$message;
				echo "<script>alert('$message');</script>";
			}

		}
	}
?>
<html>
<head>
	<title>PHP Form Validation</title>
	<style>
		table
		{
			position: absolute;
			top: 20%;
			left: 30%;
			width: 40%;
			border: none;
		}
		caption { font-size: 25px; font-weight: bold;}
		input { width: 100%; }
		.dt { width: 6%; }
	</style>
</head>
<body>
	<form name="form" action="exercise11.php" method="post">
		<table align="center">
			<caption>FORM VALIDATION</caption>
			<tr>
				<td>Name</td>
				<td class="dt">:</td>
				<td><input type="text" name="name" placeholder="Enter your name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td class="dt">:</td>
				<td><input type="text" name="email" placeholder="Enter your email"></td>
			</tr>
			<tr>
				<td>Phone no</td>
				<td class="dt">:</td>
				<td><input type="number" name="phno" placeholder="Enter your phone number"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td class="dt">:</td>
				<td><input type="password" name="pass" placeholder="Enter password"></td>
			</tr>
			<tr>
				<td>Confirm password</td>
				<td class="dt">:</td>
				<td><input type="password" name="cpass" placeholder="Re-enter password"></td>
			</tr>
			<tr>
				<th colspan="3"><button type="submit" name="submit">Submit</button></th>
			</tr>
		</table>
	</form>
</body>
</html>
