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
			<h2 style="margin-bottom:15px;">Features</h2>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="apartment.php" >Back to Apartment</a>
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
								<th scope= "col">Apartment</th>
								<th scope= "col">Square Footage</th>
								<th scope= "col">Bedrooms</th>
								<th scope= "col">Bathrooms</th>
								<th scope= "col">Pool</th>
								<th scope= "col">Amenities</th>
							</tr>
						</thread>
						<tbody>	
							<?php
								$sql = "SELECT A.Apartment_ID, A.Apartment_Street, A.Apartment_Number, A.Apartment_StreetNumber, F.Features_ID, F.Features_SquareFootage, F.Features_Bedrooms, F.Features_Bathrooms, F.Features_Pool, F.Features_Amenities, AF.FA_F, AF.FA_A FROM Features as F, Apartment as A, apar_feat as AF";
								$result = $conn->query($sql);
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
											echo '<td><a href="featuresedit.php?fid='. $row['Features_ID']. '">EDIT</a></td>';
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
						</tbody>
					</table>
				</div>       
			</div>			
		</body>
</html>