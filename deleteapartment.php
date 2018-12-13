<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Apartment Edit</title>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<style type="text/css">
			/* Move down content because we have a fixed navbar that is 3.5rem tall */
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
			.bg_colored
			{
				background-color: rgb(179, 179, 255);
			}
			.container
			{
				padding-top: 5px;
			 	padding-bottom: 5px;
			}
			.container input 
			{
				width: 100%;
				clear: both;
			}
			.submit
			{
				vertical-align: center;
			}
			.linkbutton
			{
				padding-top: 5px;
			 	padding-bottom: 5px;
			 	padding-left: 5px;
			 	padding-right: 5px;
			}
			.redbutton
			{
				background-color: #f44336;
			}
		</style>
		
		<body>
			<h2 style="margin-bottom:15px;">Are you sure you want to delete this?</h2>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "landlord";
				$conn = new mysqli($servername, $username, $password, $dbname);
				$apartid = $_GET['apid'];

				if ($conn->connect_error)
				    die("Connection failed: " . $conn->connect_error);
			?>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="apartment.php">Back to Apartments</a>
				<a class="btn btn-primary" href="apartmentedit.php?apid=<?php echo $_GET['apid']; ?>">Return to Edit</a> <br>
			</div>
			<div class="container">
				<div class="form-group">
				  	<table class= "table" border='1'>
				  		<thread>
							<tr>
								<th scope= "col">ID</th>
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
								        if ($apartid == $row['Apartment_ID'])
								        {

								        	echo "<tr>";
									        echo "<td>" . $row['Apartment_ID'] . "</td>";
											echo "<td>" . $row['Apartment_Number'] . " " . $row['Apartment_StreetNumber'] . " " . $row['Apartment_Street'] . "</td>";
											echo "<td>" . $row['Apartment_City'] . "</td>";
											echo "<td>" . $row['Apartment_State'] . "</td>";
											echo "<td>" . $row['Apartment_County'] . "</td>";
											echo "<td> $" . $row['Apartment_ApartmentPrice'] . "</td>";
											if ($row["Apartment_Occupied"] == 1)
											{
												echo "<td> Yes </td>";
												$var8 = $row['Apartment_Occupied'];
											}
											else
											{
												echo "<td> No </td>";
											}
											echo "</tr>";
								        }
								    }
								} 
								else 
								{
								    echo "0 results<br>------------------------------------------------<br>";
								}
								echo "</div></div></div>";
							?>
						</tbody>
					</table>
				</div>       
			</div>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="deleteapartment_confirm.php?apid=<?php echo $_GET['apid']; ?>">CONFIRM DELETE</a>
			</div>
		</body>
	</html>	
</html>