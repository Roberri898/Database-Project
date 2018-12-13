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
    <h5 class="card-title">Payments</h5>
    <p class="card-text">Here is a list of pending payments.</p>
  </div>

  <div class="card-body">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Date Due</th>
        <th scope="col">Tenant</th>
    </tr>
  </thead>
  <tbody>

  	<?php


	$sql = "SELECT Tenant_FirstName, Tenant_LastName,Payment_Amount, Payment_Day, Payment_Month, Payment_Year
            FROM (Payment NATURAL JOIN Pays) NATURAL Join Tenant";
	$result = $conn->query($sql);

	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {



			echo '<tr>';
		    echo '<td>' .   $row['Payment_Amount']  . '</td>';
		    echo '<td>' .   $row['Payment_Day']  . '/' . $row['Payment_Month'] . '/' . $row['Payment_Year'] . '</td>';
		    echo '<td>' .   $row['Tenant_FirstName']. " " .   $row['Tenant_LastName'] . '</td>';
            echo '</tr>';
	    }


	}




    



    ?>
  </tbody>
</table>


  </div>

</div>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>