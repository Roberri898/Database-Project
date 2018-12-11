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



	<?php 


	$complaint = $_POST["complaint"];
	$day = $_POST["day"];
	$month = $_POST["month"];
	$year = $_POST["year"];



	$sql = "INSERT INTO Complaint (Complaint_Number, Complaint_Issue, Complaint_Day, Complaint_Month, Complaint_Year, Complaint_Resolved) VALUES ('1', '$complaint', '$day', '$month', '$year', '1')";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();




	?>

<form action="./tenantlistcomplaints.php" method="post" id="redirect">
	
	<input type="" name="tenantid" value="<?php echo $_POST['tenantid']; ?>">
	<button type="submit">Submit</button>

</form>


<script type="text/javascript">
	
	document.getElementById("redirect").submit();



</script>


</body>
</html>