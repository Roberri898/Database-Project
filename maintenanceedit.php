<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Maintenance Edit</title>
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
			<h2 style="margin-bottom:15px;">Maintenance Edit</h2>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "landlord";
				$conn = new mysqli($servername, $username, $password, $dbname);
				$mid = $_GET['mid'];

				if ($conn->connect_error)
				    die("Connection failed: " . $conn->connect_error);
			?>
			<div class="container linkbutton">
				<a class="btn btn-primary" href="Maintenance_v2.php" >Back to Maintenance</a><br>
			</div>
			<div class="container linkbutton">
				<a class="btn btn-primary redbutton" href="deletemaintenance.php?mainid=<?php echo $_GET['mid']; ?>">RESOLVE</a>
			</div>
			<div class="container">
				<div class="form-group">
				  	<table class= "table" border='1'>
				  		<thread>
							<tr>
								<th scope= "col">ID</th>
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
										if (($mid == $row['Maintenance_ID']) && ($row['Apartment_ID'] == $row['AM_A']) && ($row['Maintenance_ID'] == $row['AM_M']))
									    {

								        	echo "<tr>";
								        	echo "<td>" . $row['Maintenance_ID'] . "</td>";
											echo "<td>" . $row['Apartment_Number'] . " " . $row['Apartment_StreetNumber'] . " " . $row['Apartment_Street'] . "</td>";
									        echo "<td>" . $row["Maintenance_Month"]. "/" . $row["Maintenance_Day"]. "/" . $row["Maintenance_Year"] . "</td>";
									        $var1 = $row["Maintenance_Month"];
									        $var2 = $row["Maintenance_Day"];
									        $var3 = $row["Maintenance_Year"];
											if ($row["Maintenance_Maintained"] == 1)
											{
												echo "<td> Yes </td>";
												$var4 = $row["Maintenance_Maintained"];
											}
											else
											{
												echo "<td> No </td>";
												$var4 = $row["Maintenance_Maintained"];
											}
											echo "<td>" . $row["Maintenance_Reason"]. "</td>";
											$var5 = $row["Maintenance_Reason"];
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
			<div class="container">
				<form action="savemaintenance.php" method="post">
				  <div class="form-group">
				  	<div class="row">
				  		<div class="col-sm">
					    	<label>Month</label>
					    </div>
					    <div class="col-sm">
					    	<label>Day</label>
					    </div>
					    <div class="col-sm">
					    	<label>Year</label>
					    </div>
					    <div class="col-sm">
					    	<label>Maintained? (0/1)</label>			    
					    </div>
					</div>
					<div class = "row">
						<div class="col-sm">		
							<input type="" name="month" value= "<?php echo $var1; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="day" value= "<?php echo $var2; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="year" value= "<?php echo $var3; ?>">
						</div>
						<div class="col-sm">		
							<input type="" name="main" value= "<?php echo $var4; ?>">
						</div>
						
					</div>    
					<div class = "row">
						<div class="col-sm">
					    	<label>Reason</label>			   
					    </div>
					</div>
					<div class = "row">
						<div class="col-sm">		
							<input type="text"  name="reason" value= "<?php echo $var5; ?>">
						</div>
					</div>    
				  </div>
				  <div class="container linkbutton">
				  	<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				</form>
			</div>			
		</body>
</html>