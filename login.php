<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Demo</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<style type="text/css">
			body{
				margin-top:40px;
				text-align:center;
			}

			.landlord_login{

				display:block;

			}

			.tenant_login{
				display:none;


			}


		</style>




	</head>
		<?php
			$servername = "localhost";
			$username = "<username>";
			$password = "<password>";
			$dbname = "landlord";
			
		?>


<!-- 
		require __DIR__ . '/vendor/autoload.php';




		use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                'ClientSecretHere');
$oidc->setCertPath('/path/to/my.cert');
$oidc->authenticate();
$name = $oidc->requestUserInfo('given_name'); -->


	<body>

		<h3>Log In As:</h3>


		<div class="btn-group" role="group" aria-label="Basic example">
		  <a href="#" class="btn btn-outline-secondary" id="tenbutton" onclick="displaytenantlogin();">Tenant</a>
		  <a href="#" class="btn btn-secondary" id="lanbutton" onclick="displaylandlordlogin();">Landlord</a>
		</div>



		<div class="landlord_login" id="landlord_login">
		
			<form id="landlord_login_form" action="./authenticationlandlord.php" method="post">
				<div class="form-group">
				    <label for="firstname">First Name</label>
				    <input name="firstname" class="form-control" id="firstname" placeholder="First Name">
				</div>
				<div class="form-group">
				    <label for="lastname">Last Name</label>
				    <input name="lastname" class="form-control" id="lastname" placeholder="Last Name">
				</div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <button class="btn btn-primary">Submit</button>
			</form>
		</div>



		<div class="tenant_login" id="tenant_login">

			<form id="landlord_login_form" action="./authenticationtenant.php" method="post">
				<div class="form-group">
				    <label for="firstname">First Name</label>
				    <input name="firstname" class="form-control" id="firstname" placeholder="First Name">
				</div>
				<div class="form-group">
				    <label for="lastname">Last Name</label>
				    <input name="lastname" class="form-control" id="lastname" placeholder="Last Name">
				</div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <button class="btn btn-primary">Submit</button>
			</form>
		</div>
			


		<script type="text/javascript">

			// var firstname = document.getElementById('firstname').value;
			// var lastname = document.getElementById('lastname').value;



			// document.getElementById("landlord_login").submit();


			function displaytenantlogin(){

				document.getElementById("tenant_login").style.display = "block";
				document.getElementById("landlord_login").style.display = "none";
				document.getElementById("tenbutton").classList.add("btn-secondary");
				document.getElementById("tenbutton").classList.remove("btn-outline-secondary");
				document.getElementById("lanbutton").classList.remove("btn-secondary");
				document.getElementById("lanbutton").classList.add("btn-outline-secondary");
			} 

			function displaylandlordlogin(){

				document.getElementById("tenant_login").style.display = "none";
				document.getElementById("landlord_login").style.display = "block";
				document.getElementById("tenbutton").classList.remove("btn-secondary");
				document.getElementById("tenbutton").classList.add("btn-outline-secondary");
				document.getElementById("lanbutton").classList.add("btn-secondary");
				document.getElementById("lanbutton").classList.remove("btn-outline-secondary");

			}


		</script>




		
	</body>
</html>