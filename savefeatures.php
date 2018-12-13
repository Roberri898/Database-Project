<!DOCTYPE html>
<html>
	<head>
		<title>Saving Features</title>
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

			$squarefoot = $_POST['sq'];
			$bed = $_POST['bed'];	
			$bath = $_POST['bath'];
			$pool =  $_POST['pool'];
			$am = $_POST['am'];
			$fID = $_POST['featid'];

			$sql = "UPDATE Features 
			SET 
			Features_SquareFootage = ". $squarefoot . "," 
			. "Features_Bedrooms = " . $bed . ","
			. "Features_Bathrooms = ". $bath . ","
			. "Features_Pool = ". $pool . ","
			. "Features_Amenities = ". $am
			. " WHERE Features_ID = " . $fID ."";

			if (mysqli_query($conn, $sql)) 
			{
			    echo "Feature Data has been updated";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
			$conn->close();
		?>
		<meta http-equiv="refresh" content="1;URL=features_v2.php" />
		<div class="container linkbutton">
			<a class="btn btn-primary" href="apartment.php" >Back to Apartments</a><br>
		</div>
	</body>
</html>