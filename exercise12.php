<html>
<head>
	<title>Student Details</title>
	<style>
		td{ text-align: center; }
	</style>
</head>
<body>
	<h1 align="center">STUDENT DETAILS</h1>
	<?php
		$host = "localhost";
		$user = "root";
		$pwd = "";
		$db = "webdb";
		$conn = mysqli_connect($host, $user, $pwd, $db);
		if(!$conn)
			echo "Database connection failed!!!";
		else
		{
			$result = mysqli_query($conn,"select * from student order by rollno");
			if(mysqli_num_rows($result))
			{
				echo "<table border='1' align='center' width='50%' cellpadding='10' cellspacing='5'><tr><th>Roll no</th><th>Name</th><th>Gender</th><th>Mark</th></tr>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row["rollno"]."</td><td>".$row["name"]."</td><td>";
					if($row["gender"]=='M')
						echo "MALE</td><td>";
					else if($row["gender"]=='F')
						echo "FEMALE</td><td>";
					echo $row["mark"]."</td></tr>";
				}
				echo "</table>";
			}
			else
				echo "<center>No student in database</center>";
			mysqli_close($conn);
		}
	?>
</body>
</html>
</html>
