<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Maintenance List</title>
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
			<h2 style="margin-bottom:15px;">Maintenance</h2>
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
								<th scope= "col">Date</th>
								<th scope= "col">Maintained?</th>
								<th scope= "col">Reason</th>
							</tr>
						</thread>
						<tbody>	
							<?php
								$sql = "SELECT M.Maintenance_ID, M.Maintenance_Day, M.Maintenance_Month, M.Maintenance_Year,M.Maintenance_Reason,M.Maintenance_Maintained, A.Apartment_ID, A.Apartment_Street, A.Apartment_Number, A.Apartment_StreetNumber, AM.AM_A, AM.AM_M FROM Maintainance as M, Apartment as A, Apar_Main as AM";
								$result = $conn->query($sql);
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
											echo '<td><a href="maintenanceedit.php?mid='. $row['Maintenance_ID']. '">EDIT</a></td>';
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