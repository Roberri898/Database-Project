<!DOCTYPE html>
<html>
<head>
	<title></title>
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



	<?php echo $_POST['firstname']; 
		  echo $_POST['lastname'];

		  $firstname = $_POST['firstname'];
		  $lastname = $_POST['lastname'];


		  $sql = "SELECT Tenant_ID FROM Tenant WHERE Tenant_FirstName = '$firstname' AND Tenant_LastName = '$lastname'";
			$result = $conn->query($sql) or die($conn->error);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$tenantid = $row['Tenant_ID'];
				}
			}
			else {
		    	echo "Not Found";
			}

	?>


	<form id="redirect" action="./tenantdashboard.php" method="post" >
		
		<input id="tenantidinput" type="text" name="tenantid">

	</form>

	<script type="text/javascript">
	   		var php_var = "<?php echo $tenantid; ?>";


	   		document.getElementById("tenantidinput").value = php_var;
	   		document.getElementById("redirect").submit();



	</script>


</body>
</html>