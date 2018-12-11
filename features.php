<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Apartment Features</title>
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
		Features<br>
		<?php
			$servername = "localhost";
			$username = "";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			$sql = "SELECT A.Apartment_ID, A.Apartment_Street, A.Apartment_Number, A.Apartment_StreetNumber, F.Features_ID, F.Features_SquareFootage, F.Features_Bedrooms, F.Features_Bathrooms, F.Features_Pool, F.Features_Amenities, AF.FA_F, AF.FA_A FROM Features as F, Apartment as A, apar_feat as AF";
			$result = $conn->query($sql);
			echo "<table border='1'>
				<tr>
				<th>Apartment</th>
				<th>Square Footage</th>
				<th>Bedrooms</th>
				<th>Bathrooms</th>
				<th>Pools</th>
				<th>Amenities</th>
				</tr>";
			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc()) 
				{
					if (($row['Apartment_ID'] == $row['FA_A']) && ($row['Features_ID'] == $row['FA_F']))
				    {
				        echo "<tr>";
				        echo "<td>" . $row['Apartment_Number'] . " " . $row['Apartment_StreetNumber'] . " " . $row['Apartment_Street'] . "</td>";
						echo "<td>" . $row["Features_SquareFootage"] . "</td>";
						echo "<td>" . $row["Features_Bedrooms"] . "</td>";
						echo "<td>" . $row["Features_Bathrooms"] . "</td>";
						echo "<td>" . $row["Features_Pool"] . "</td>";
						echo "<td>" . $row["Features_Amenities"] . "</td>";
					}
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
	<a href= 'apartment.php'> Back to Apartments </a>
	</body>
</html>