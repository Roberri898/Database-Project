<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Apartment List</title>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">
			/* Move down content because we have a fixed navbar that is 3.5rem tall */
			body {
			  padding-top: 80px;
			  padding-bottom: 100px;
			}
		</style>
	</head>
		<style type="text/css">
			.info_list 
			{
				height:237px; 
				overflow-y: scroll;
			}
			.bg_colored
			{
				background-color: rgb(179, 179, 255);
			}
		</style>
		Apartment<br>
		<?php
			$servername = "localhost";
			$username = "";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			$sql = "SELECT Apartment_ID, Apartment_Street,Apartment_Number,Apartment_StreetNumber,Apartment_City,Apartment_State,Apartment_County,Apartment_ApartmentPrice,Apartment_Occupied FROM Apartment";
			$result = $conn->query($sql);
			echo "<table border='1'>
				<tr>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>County</th>
				<th>Price</th>
				<th>Occupied</th>
				</tr>";
			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc()) 
				{
			        echo "<tr>";
					echo "<td>" . $row['Apartment_Number'] . " " . $row['Apartment_StreetNumber'] . " " . $row['Apartment_Street'] . "</td>";
					echo "<td>" . $row['Apartment_City'] . "</td>";
					echo "<td>" . $row['Apartment_State'] . "</td>";
					echo "<td>" . $row['Apartment_County'] . "</td>";
					echo "<td> $" . $row['Apartment_ApartmentPrice'] . "</td>";
					if ($row["Apartment_Occupied"] == 0)
					{
						echo "<td> Yes </td>";
					}
					else if ($row["Apartment_Occupied"] == 1)
					{
						echo "<td> No </td>";
					}
					echo "</tr>";
			    }
			} 
			else 
			{
			    echo "0 results<br>------------------------------------------------<br>";
			}
			echo "</div></div></div>";


			$conn->close();
			?>
	<body>
	<a href= 'features.php'> See Features </a>
	<br>
	<a href= 'maintenance.php'> See Maintenance </a>
	</body>
</html>