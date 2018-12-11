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

		$apartid = $_GET['apid'];
		$num = $_POST['num'];
		$street = $_POST['street'];
		$stnum = $_POST['stnum'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$county = $_POST['county'];
		$price = $_POST['price'];
		$occ = $_POST['occ'];

		if (!$conn) 
		{
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE Apartment 
		SET 
		Apartment_Street = $street,
		Apartment_Number = $num,
		Apartment_StreetNumber = $stnum,
		Apartment_City = $city,
		Apartment_State = $state,
		Apartment_County = $county,
		Apartment_ApartmentPrice = $price,
		Apartment_Occupied = $occ
		WHERE Apartment_ID= $apartid";

		if (mysqli_query($conn, $sql)) 
		{
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

	?>
</body>
</html>