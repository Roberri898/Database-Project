<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TEST</title>
	</head>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);
			$apartid = $_GET['apid'];

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);



			$sql = "SELECT FA_F FROM Apar_Feat WHERE FA_A=" . $apartid;
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
				while ($row = $result -> fetch_assoc())
				{
					//echo "id: " . $row["FA_F"] . "<br>";
					$fid = $row["FA_F"];
				}
			}


			$sql = "DELETE FROM Features WHERE Features_ID=" . $fid;			
			if ($conn->query($sql) === TRUE) 
			{
			    echo "<br>Features succesfully deleted.";
			} else {
			    echo "<br>Error deleting record: " . $conn->error;
			}

			$sql = "DELETE FROM Apar_Feat WHERE FA_A =" . $apartid;	
			if ($conn->query($sql) === TRUE) 
			{
			    echo "<br>Relation succesfully deleted.";
			} else {
			    echo "<br>Error deleting record: " . $conn->error;
			}

			$sql = "DELETE FROM Apartment WHERE Apartment_ID=" . $apartid;			
			if ($conn->query($sql) === TRUE) 
			{
			    echo "<br>Apartment succesfully deleted.";
			} else {
			    echo "<br>Error deleting record: " . $conn->error;
			}

			$conn->close();
		?>
	<body>
		<div class="container linkbutton">
			<meta http-equiv="refresh" content="1;URL=apartment.php"> 
			<a class="btn btn-primary" href="apartment.php" >Back to Apartments</a><br>
		</div>
	</body>
</html>