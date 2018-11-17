<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Demo</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style type="text/css">
			body{
				margin-top:40px;
				text-align: center;
			}

		</style>
	</head>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			 mysqli_select_db($conn, $dbname) or die( mysqli_error($conn));
		?>



	<body>

		<h2 style="margin-bottom:15px;">Landlord Dashboard</h2>




		<?php
			$sql = "SELECT Tenant_FirstName, Tenant_LastName, Tenant_Age FROM Tenant";
			$result = $conn->query($sql) or die($conn->error);


			


    		echo '<div style="width:35%; margin:auto;"><table class="table">
					  <thead>
					    <tr>
					      <th scope="col">First</th>
					      <th scope="col">Last</th>
					      <th scope="col">Age</th>
					    </tr>
					  </thead>
					  <tbody>';
					    
					      	while($row = $result->fetch_assoc()) {
        						echo '<tr>';
									    echo  '<td>' . $row['Tenant_FirstName'] . '</td>';
									    echo  '<td>' . $row['Tenant_LastName'] . '</td>';
									    echo  '<td>' . $row['Tenant_Age'] . '</td>';
								echo  '</tr>'; 

    						}
			echo '</tbody>
					</table>
				</div>';


    		$conn->close();
		?>



	</body>
</html>