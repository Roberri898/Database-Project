<!DOCTYPE html>
<html>
	<head>
		<title>Saving Maintenance</title>
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

			$sql = "INSERT INTO Maintainance (Maintenance_Day, Maintenance_Month, Maintenance_Year, Maintenance_Reason, Maintenance_Maintained) VALUES
			("
			. $_POST['day'] . "," 
			. $_POST['month'] . ","
			. $_POST['year'] . ",'"
			. $_POST['reason'] . "',"
			. $_POST['main'] . ");";
			if (mysqli_query($conn, $sql)) 
			{
			    echo "<br>Maintenance Data has been recorded";
			    $id1 = $conn->insert_id;
			} else {
			    echo "<br>Error updating record: " . mysqli_error($conn) ."<br>";
			}

			$sql = "INSERT INTO Apar_Main (AM_A, AM_M) VALUES ("
			. $_POST['apID'] . "," . $id1 . ")";
			if (mysqli_query($conn, $sql)) 
			{
			    echo "<br>Relation has been recorded";
			} else {
			    echo "<br>Error updating record: " . mysqli_error($conn) ."<br>";
			}

			$conn->close();
		?>
		<meta http-equiv="refresh" content="1;URL=maintenance_v2.php">
		<a class="btn btn-primary" href="maintenance_v2.php" >Back to Maintenance</a>
	</body>
</html>