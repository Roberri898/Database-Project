<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Resolving...</title>
	</head>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);
			$mainid = $_GET['mid'];

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);


			$sql = "DELETE FROM Maintainance WHERE Maintenance_ID=" . $mainid;			
			if ($conn->query($sql) === TRUE) 
			{
			    echo "<br>Maintenance succesfully deleted.";
			} else {
			    echo "<br>Error deleting record: " . $conn->error;
			}

			$sql = "DELETE FROM Apar_Main WHERE AM_M =" . $mainid;	
			if ($conn->query($sql) === TRUE) 
			{
			    echo "<br>Relation succesfully deleted.";
			} else {
			    echo "<br>Error deleting record: " . $conn->error;
			}

			$conn->close();
		?>
	<body>
		<div class="container linkbutton">
			<meta http-equiv="refresh" content="1;URL=maintenance_v2.php"> 
			<a class="btn btn-primary" href="maintenance_v2.php" >Back to Maintenance</a><br>
		</div>
	</body>
</html>