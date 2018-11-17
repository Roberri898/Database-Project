<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tenant Page</title>

	</head>
		$servername = "localhost";
		$username = "<username>";
		$password = "<password>";
		$dbname = "landlord";
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error)
		    die("Connection failed: " . $conn->connect_error);

		echo "TENANTS<br>";
			$sql = "SELECT Tenant_ID, Tenant_FirstName,Tenant_LastName,Tenant_Age,Tenant_Gender FROM Tenant";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc()) 
				{
			        echo "id: " . $row["Tenant_ID"].
						" - Name: " . $row["Tenant_FirstName"]. " " . $row["Tenant_LastName"].
						" - Age: " . $row["Tenant_Age"]. " ".
						" - Gender: ";
						if ($row["Tenant_Gender"] == 0)
						{
							echo "Male<br>";
						}
						else if ($row["Tenant_Gender"] == 1)
						{
							echo "Female<br>";
						}
			    }
				echo "<br>------------------------------------------------<br>";
			} 
			else 
			{
			    echo "0 results<br>------------------------------------------------<br>";
			}
			$conn->close();
			?>
	<body>
	</body>
</html>