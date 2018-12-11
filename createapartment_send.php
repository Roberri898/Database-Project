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

			$sql = "INSERT INTO Apartment (Apartment_Street,Apartment_Number,Apartment_StreetNumber,Apartment_City,Apartment_State,Apartment_County,Apartment_ApartmentPrice,Apartment_Occupied) VALUES
			('"
			. $_POST['st'] . "','" 
			. $_POST['num'] . "','"
			. $_POST['sn'] . "','"
			. $_POST['ct'] . "','"
			. $_POST['sta'] . "','"
			. $_POST['cou'] . "','"
			. $_POST['ap'] . "','"
			. $_POST['oc'] . "');";
			if (mysqli_query($conn, $sql)) 
			{
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		?>
		<a class="btn btn-primary" href="apartment.php" >Back to Apartment</a>
	</body>
</html>