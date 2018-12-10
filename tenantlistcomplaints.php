<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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


	<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Issues</h5>
  </div>
	
  	<div class="card-body">

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Date</th>
	      <th scope="col">Issue</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php

			$tenantid = $_POST['tenantid'];


			$sql = "SELECT Complaint_Issue, Complaint_Day, Complaint_Month, Complaint_Year, Complaint_Resolved FROM Complaint";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        $complaintissue = $row["Complaint_Issue"];
			        $complaintday = $row["Complaint_Day"];
			        $complaintmonth = $row["Complaint_Month"];
			        $complaintyear = $row["Complaint_Year"];
			    	$complaintresolved = $row["Complaint_Resolved"];


			    	echo '<tr>';
				      echo '<td>' . $complaintday . '/'  . $complaintmonth . '/' . $complaintyear  .  '</td>';
				      echo '<td>' .  $complaintissue .  '</td>';
				    echo '</tr>';

			    }
			} else {
			    echo "0 results";
			}
	    
	    ?>


	  </tbody>
	</table>

	</div>

	  <div class="card-body">
    <a href="#" class="card-link" onclick="createcomplaint();">Create Complaint</a>
	  </div>
	</div>

	<?php



	$conn->close();


	?>


	<form action="./createcomplaint.php" method="post" id="createcomplaintlink">

		<input type="text" name="tenantid" value="<?php echo $tenantid ?> ">
		
	</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">


	function createcomplaint(){
		document.getElementById("createcomplaintlink").submit();

	}
	

</script>


</body>
</html>