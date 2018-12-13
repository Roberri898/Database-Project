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
			. $_POST['st'] . "'," 
			. $_POST['num'] . ","
			. $_POST['sn'] . ",'"
			. $_POST['ct'] . "','"
			. $_POST['sta'] . "','"
			. $_POST['cou'] . "',"
			. $_POST['ap'] . ","
			. intval($_POST['oc']) . ");";
			if (mysqli_query($conn, $sql)) 
			{
			    echo "<br>Apartment Data has been recorded";
			    $id1 = $conn->insert_id;
			} else {
			    echo "<br>Error updating record: " . mysqli_error($conn) ."<br>";
			}

			$sql = "INSERT INTO Features (Features_SquareFootage,Features_Bedrooms,Features_Bathrooms,Features_Pool, Features_Amenities) VALUES ("
			. $_POST['sf'] . "," 
			. $_POST['bed'] . ","
			. $_POST['bath'] . ","
			. $_POST['pool'] . ","
			. $_POST['am'] . ");";
			if (mysqli_query($conn, $sql)) 
			{
				$id2 = $conn->insert_id;
			    echo "<br>Features Data has been recorded";
			} else {
			    echo "<br>Error updating record: " . mysqli_error($conn) ."<br>";
			}

			$sql = "INSERT INTO Apar_Feat (FA_A, FA_F) VALUES ("
			. $id1 . "," . $id2 . ");";
			if (mysqli_query($conn, $sql)) 
			{
			    echo "<br>Relation has been recorded";
			} else {
			    echo "<br>Error updating record: " . mysqli_error($conn) ."<br>";
			}

			$conn->close();
		?>
		<meta http-equiv="refresh" content="1;URL=apartment.php"> 
		<a class="btn btn-primary" href="apartment.php" >Back to Apartment</a>
	</body>
</html>