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
		</style>
		
		<body>
			<h2 style="margin-bottom:15px;">Apartment Edit</h2>
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
				<a class="btn btn-primary" href="apartment.php" >Back to Apartments</a><br>
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
											$var1 = $row['Apartment_Number'];
											$var2 = $row['Apartment_Street'];
											$var3 = $row['Apartment_StreetNumber'];
											echo "<td>" . $row['Apartment_City'] . "</td>";
											$var4 = $row['Apartment_City'];
											echo "<td>" . $row['Apartment_State'] . "</td>";
											$var5 = $row['Apartment_State'];
											echo "<td>" . $row['Apartment_County'] . "</td>";
											$var6 = $row['Apartment_County'];
											echo "<td> $" . $row['Apartment_ApartmentPrice'] . "</td>";
											$var7 = $row['Apartment_ApartmentPrice'];
											if ($row["Apartment_Occupied"] == 0)
											{
												echo "<td> Yes </td>";
												$var8 = $row['Apartment_Occupied'];
											}
											else if ($row["Apartment_Occupied"] == 1)
											{
												echo "<td> No </td>";
												$var8 = $row['Apartment_Occupied'];
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
			<div class="container">
				<form action="saveapartment.php?apid=<?php echo $apid; ?>" method="post">
				  <div class="form-group">
				  	<div class="row">
				  		<div class="col-sm">
					    	<label>Address #</label>
					    </div>
					    <div class="col-sm">
					    	<label>Street</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>Street Number</label>			   
					    </div>
					    <div class="col-sm">
					    	<label>City</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>State</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>County</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>Price</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>Occupied? (0/1)</label>
					    </div>
					</div>
					<div class = "row">
						<div class="col-sm">
							<input type="" name="num" value= "<?php echo $var1; ?>">
						</div>
						<div class="col-sm">	
							<input type="" name="street" value= "<?php echo $var2; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="stnum" value= "<?php echo $var3; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="city" value= "<?php echo $var4; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="state" value= "<?php echo $var5; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="county" value= "<?php echo $var6; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="price" value= "<?php echo $var7; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="occ" value= "<?php echo $var8; ?>">
						</div>	
					</div>        
				</div>
				<div class="container linkbutton">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?php $conn->close(); ?>
				</form>
			</div>			
		</body>
</html>