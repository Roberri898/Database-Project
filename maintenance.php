<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Apartment Maintenance</title>
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
		Maintainance<br>
		<?php
			$servername = "localhost";
			$username = "";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			$sql = "SELECT M.Maintenance_ID, M.Maintenance_Day, M.Maintenance_Month, M.Maintenance_Year,M.Maintenance_Reason,M.Maintenance_Maintained, A.Apartment_ID, A.Apartment_Street, A.Apartment_Number, A.Apartment_StreetNumber, AM.AM_A, AM.AM_M FROM Maintainance as M, Apartment as A, Apar_Main as AM";
			$result = $conn->query($sql);
			echo "<table border='1'>
				<tr>
				<th>Apartment</th>
				<th>Date</th>
				<th>Maintained?</th>
				<th>Reason</th>
				</tr>";
			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc()) 
				{
					if (($row['Apartment_ID'] == $row['AM_A']) && ($row['Maintenance_ID'] == $row['AM_M']))
				    {
						echo "<tr>";
						echo "<td>" . $row['Apartment_Number'] . " " . $row['Apartment_StreetNumber'] . " " . $row['Apartment_Street'] . "</td>";
				        echo "<td>" . $row["Maintenance_Month"]. "/" . $row["Maintenance_Day"]. "/" . $row["Maintenance_Year"] . "</td>";
						if ($row["Maintenance_Maintained"] == 1)
						{
							echo "<td> Yes </td>";
						}
						else
						{
							echo "<td> No </td>";
						}
						echo "<td>" . $row["Maintenance_Reason"]. "</td>";
						echo "</tr>";
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