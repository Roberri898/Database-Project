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


		<div class="container">
  			<div class="row">


  				<div class="col">



  					<div class="card" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Card title</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					  <div class="card-body">

					  <table class="table">
						  <thead>
						    <tr>
						      <th scope="col">First</th>
						      <th scope="col">Last</th>
						      <th scope="col">Age</th>
						    </tr>
						  </thead>
						  <tbody>

				<?php

					$landlordid = $_POST['landlordid'];

					$sql = "SELECT Tenant_ID FROM Lan_Ten WHERE Landlord_ID = '$landlordid'";
					$result1 = $conn->query($sql) or die($conn->error);


				  	if ($result1->num_rows > 0) {
				    // output data of each row
					    while($row1 = $result1->fetch_assoc()) {
					        $tenantid = $row1["Tenant_ID"];


						$sql1 = "SELECT Tenant_FirstName, Tenant_LastName, Tenant_Age FROM Tenant WHERE Tenant_ID = '$tenantid'";
						$result = $conn->query($sql1);

								    
					      	while($row = $result->fetch_assoc()) {
        						echo '<tr>';
									    echo  '<td>' . $row['Tenant_FirstName'] . '</td>';
									    echo  '<td>' . $row['Tenant_LastName'] . '</td>';
									    echo  '<td>' . $row['Tenant_Age'] . '</td>';
								echo  '</tr>'; 

    						}

			    		

		    			}
					} else {
					    echo "0 results";
					}




					
				?>


						</tbody>
					</table>
					</div>
					  <div class="card-body">
					    <a href="#" class="card-link">List Tenants</a>
					  </div>
					</div>
				</div>


				<div class="col">


					<div class="card" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Card title</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>

					  <div class="card-body">


					  	<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Street</th>
						      <th scope="col">Number</th>
						      <th scope="col">City</th>
						    </tr>
						  </thead>
						  <tbody>

					<?php


						$sql = "SELECT Apartment_Street, Apartment_Number, Apartment_StreetNumber, Apartment_City FROM Apartment";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        $apartmentStreet = $row["Apartment_Street"];
						        $apartmentNumber = $row["Apartment_Number"];
						        $apartmentStreetNumber = $row["Apartment_StreetNumber"];
						        $apartmentCity = $row["Apartment_City"];



						        echo  '<tr>';
							   
							      echo '<td>' . $apartmentStreet . '</td>';
							      echo '<td>' . $apartmentNumber . '</td>';
							      echo '<td>' . $apartmentCity . '</td>';

							    echo '</tr>';

						    }

						} else {
						    echo "0 results";
						}
					



					$conn->close();
					?>

						  </tbody>
						</table>



					  </div>	
					  <div class="card-body">
					    <a href="#" class="card-link">List Apartments</a>
					  </div>
					</div>


				</div>


			</div>
		</div>





		  


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	</body>
</html>