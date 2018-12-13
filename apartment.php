<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Apartment List</title>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">

			body 
			{
			  	margin-top:40px;
				text-align: center;
			}
		</style>
	</head>
		<style type="text/css">
			.info_list 
			{
				height:237px; 
				overflow-y: scroll;
			}
			.container
			{
				padding-top: 5px;
			 	padding-bottom: 5px;
			}
			.bg_colored
			{
				background-color: rgb(179, 179, 255);
			}
			.linkbutton
			{
				padding-top: 5px;
			 	padding-bottom: 5px;
			 	padding-left: 5px;
			 	padding-right: 5px;
			}
		</style>
		<body>
			<h2 style="margin-bottom:15px;">Apartments</h2>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="landlorddashboard.php" >Back to Landlord Dashboard</a>
			</div>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="createapartment.php" >Create Apartment</a>
				<a class="btn btn-primary" href="features_v2.php" >Features</a>
				<a class="btn btn-primary" href="maintenance_v2.php" >Maintenance</a>
			</div>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "landlord";
				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error)
				    die("Connection failed: " . $conn->connect_error);
			?>
			<div class="container">
				<div class="form-group">
				  	<table class= "table" border='1'>
				  		<thread>
							<tr>
								<th scope= "col">Address</th>
								<th scope= "col">City</th>
								<th scope= "col">State</th>
								<th scope= "col">County</th>
								<th scope= "col">Price</th>
								<th scope= "col">Occupied</th>
							</tr>
						</thread>
						<tbody>	
							<?php
								$sql = "SELECT Apartment_ID, Apartment_Street,Apartment_Number,Apartment_StreetNumber,Apartment_City,Apartment_State,Apartment_County,Apartment_ApartmentPrice,Apartment_Occupied FROM Apartment";
								$result = $conn->query($sql);
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
										echo '<td><a href="apartmentedit.php?apid='. $row['Apartment_ID']. '">EDIT</a></td>';
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
						</tbody>
					</table>
				</div>       
			</div>
						
		</body>
</html>