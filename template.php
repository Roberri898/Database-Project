<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Demo</title>
	</head>
		<?php
			$servername = "localhost";
			$username = "<username>";
			$password = "<password>";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			$conn->close();
		?>
	<body>
	</body>
</html>