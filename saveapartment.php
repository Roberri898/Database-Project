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

			$street = $_POST['street'];
			$number = $_POST['num'];	
			$streetnumber = $_POST['stnum'];
			$city =  $_POST['city'];
			$state = $_POST['state'];
			$county =  $_POST['county'];
			$price = $_POST['price'];
			$occupied = $_POST['occ'];
			$apID = intval($_POST['apid']);

			$sql = "UPDATE Apartment 
			SET 
			Apartment_Street = '". $street . "'," 
			. "Apartment_Number = " . $number . ","
			. "Apartment_StreetNumber = ". $streetnumber . ","
			. "Apartment_City = '". $state . "',"
			. "Apartment_State = '". $state . "',"
			. "Apartment_County= '". $county . "',"
			. "Apartment_ApartmentPrice = ". $price . ","
			. "Apartment_Occupied = ". $occupied
			. " WHERE Apartment_ID = '" . $apID ."'";

			if (mysqli_query($conn, $sql)) 
			{
			    echo "Apartment Data has been updated";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
			$conn->close();
		?>
		<meta http-equiv="refresh" content="1;URL=apartment.php" />
		<div class="container linkbutton">
			<a class="btn btn-primary" href="apartment.php" >Back to Apartments</a><br>
		</div>
	</body>
</html>