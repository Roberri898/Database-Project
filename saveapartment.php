<!DOCTYPE html>
<html>
	<head>
		<title>Saving Apartment</title>
	</head>
	<body>
		<?php 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if (!$conn) 
			{
			    die("Connection failed: " . mysqli_connect_error());
			}


			if (mysqli_query($conn, $sql)) 
			{
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		?>
	</body>
</html>