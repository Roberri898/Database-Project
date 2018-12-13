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
			<h2 style="margin-bottom:15px;">Apartment Edit</h2>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "landlord";
				$conn = new mysqli($servername, $username, $password, $dbname);
				$featid = $_GET['fid'];

				if ($conn->connect_error)
				    die("Connection failed: " . $conn->connect_error);
			?>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="features_v2.php">Back to Features</a><br>
			</div>
			<div class="container">
				<div class="form-group">
				  	<table class= "table" border='1'>
				  		<thread>
							<tr>
								<th scope= "col">ID</th>
								<th scope= "col">Address</th>
								<th scope= "col">Square Footage</th>
								<th scope= "col">Bedrooms</th>
								<th scope= "col">Bathrooms</th>
								<th scope= "col">Pool</th>
								<th scope= "col">Amenities/th>
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
								        if (($featid == $row['Features_ID']) && ($row['Apartment_ID'] == $row['FA_A']) && ($row['Features_ID'] == $row['FA_F']))
								        {

								        	echo "<tr>";
								        	echo "<td>" . $row['Features_ID'] . "</td>";
									        echo "<td>" . $row['Apartment_Number'] . " " . $row['Apartment_StreetNumber'] . " " . $row['Apartment_Street'] . "</td>";
											echo "<td>" . $row["Features_SquareFootage"] . "</td>";
											$var1 = $row["Features_SquareFootage"];
											echo "<td>" . $row["Features_Bedrooms"] . "</td>";
											$var2 = $row["Features_Bedrooms"];
											echo "<td>" . $row["Features_Bathrooms"] . "</td>";
											$var3 = $row["Features_Bathrooms"];
											echo "<td>" . $row["Features_Pool"] . "</td>";
											$var4 = $row["Features_Pool"];
											echo "<td>" . $row["Features_Amenities"] . "</td>";
											$var5 = $row["Features_Amenities"];
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
				<div class="form-group">
				  	<div class="row">
				  		<div class="col-sm">
					    	<label>ID</label>
					    </div>
					    <div class="col-sm">
					    	<label>Square Footage</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>Bedrooms</label>			   
					    </div>
					    <div class="col-sm">
					    	<label>Bathrooms</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>Pool</label>			    
					    </div>
					    <div class="col-sm">
					    	<label>Amenities</label>			    
					    </div>
					</div>
					</div>
						<form action= "savefeatures.php" method="POST">'
						<div class = "row">
							<div class="col-sm">
								<input type="number" name="featid" value= "<?php echo $featid; ?>" readonly>
							</div>
							<div class="col-sm">
								<input type="number" name="sq" value= "<?php echo $var1; ?>">
							</div>
							<div class="col-sm">	
								<input type="number" name="bed" value= "<?php echo $var2; ?>">
							</div>
							<div class="col-sm">		
								<input type="number" name="bath" value= "<?php echo $var3; ?>">
							</div>
							<div class="col-sm">		
								<input type="number" name="pool" value= "<?php echo $var4; ?>">
							</div>
							<div class="col-sm">		
								<input type="number" name="am" value= "<?php echo $var5; ?>">
							</div>
						</div>        
					</div>
					<div class="container linkbutton">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>			
			</div>		
		</body>
		<?php $conn->close(); ?>
</html>