<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tenant Page</title>
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
		<?php
			$servername = "localhost";
			$username = " ";
			$password = " ";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			echo "TENANTS<br>";
			$sql = "SELECT Tenant_ID, Tenant_FirstName,Tenant_LastName,Tenant_Age,Tenant_Gender FROM Tenant";
			$result = $conn->query($sql);
			echo "<table border='1'>
				<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				</tr>";
			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc()) 
				{
			        echo "<tr>";
					echo "<td>" . $row['Tenant_FirstName'] . " " . $row['Tenant_LastName'] . "</td>";
					echo "<td>" . $row['Tenant_Age'] . "</td>";
					if ($row["Tenant_Gender"] == 0)
					{
						echo "<td> Male </td>";
					}
					else if ($row["Tenant_Gender"] == 1)
					{
						echo "<td> Female </td>";
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
	</body>
</html>