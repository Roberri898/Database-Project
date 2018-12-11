<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Create Maintenance</title>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<style type="text/css">
			/* Move down content because we have a fixed navbar that is 3.5rem tall */
			body 
			{
			  	margin-top:40px;
				text-align: center;
			}
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
	</head>
	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "landlord";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			    die("Connection failed: " . $conn->connect_error);

			if(isset($_POST['save']))
			{
			    $sql = "INSERT INTO `Maintainance` (`Maintenance_Day`,`Maintenance_Month`,`Maintenance_Year`,`Maintenance_Reason`,`Maintenance_Maintained`)
			    VALUES ('".$_GET["day"]."','".$_GET["month"]."','".$_GET["year"]."','".$_GET["reason"]."','".$_POST["maintained"]."')";

			    $result = mysqli_query($conn,$sql);
			}
			$conn->close();
		?>

		<div class="container">
				<form action="createmaintenance.php" method="get"> 
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
							<input type="" name="month">
						</div>
						<div class="col-sm">		
							<input type="" name="day">
						</div>
						<div class="col-sm">		
							<input type="" name="year">
						</div>
						<div class="col-sm">		
							<input type="" name="maintened">
						</div>	
					</div>    
					<div class = "row">
						<div class="col-sm">
					    	<label>Reason</label>			   
					    </div>
					</div>
					<div class = "row">
						<div class="col-sm">		
							<input type="text"  name="reason">
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