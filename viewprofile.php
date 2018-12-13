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
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:30px">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#" onclick="tenantdashboard();">Dashboard</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>


	<h2 align="center">Profile</h2>

	<div class="container">
  		<div class="row">


  			<div class="col">

		<div class="card" style="">
		
	  	<div class="card-body">

		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">First Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Age</th>
		      <th scope="col">Gender</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

				$tenantid = $_POST['tenantid'];


				$sql = "SELECT Tenant_FirstName, Tenant_LastName, Tenant_Age, Tenant_Gender FROM Tenant WHERE Tenant_ID = '$tenantid'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        $firstname = $row["Tenant_FirstName"];
				        $lastname = $row["Tenant_LastName"];
				        $age = $row["Tenant_Age"];

						if ($row["Tenant_Gender"] == 1) {
		    				$gender = 'Female';
						}
						if ($row["Tenant_Gender"] == 0) {
		    				$gender = 'Male';
						}



				    	echo '<tr>';
					      echo '<td>' . $firstname  .  '</td>';
					      echo '<td>' .  $lastname .  '</td>';
					      echo '<td>' .  $age .  '</td>';
					      echo '<td>' .  $gender .  '</td>';
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
	    <a href="#" class="card-link" onclick="editprofile();">Edit Profile</a>
		  </div>
		</div>



			</div>

		</div>
	</div>

	<?php



	$conn->close();


	?>


	<form action="./editprofile.php" method="post" id="edit_profile" style="display:none;">

		<input type="text" name="tenantid" value="<?php echo $tenantid ?> ">
		
	</form>

	<form action="./tenantdashboard.php" method="post" id="tenant__dashboard" style="display:none;">

		<input type="text" name="tenantid" value="<?php echo $tenantid ?> ">
		
	</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">


	function editprofile(){
		document.getElementById("edit_profile").submit();

	}


	function tenantdashboard(){

		document.getElementById("tenant__dashboard").submit();

	}
	

</script>


</body>
</html>