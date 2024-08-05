<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter' and password='$password'";
		$query = $conn->query($sql);
		$rowcount=mysqli_num_rows($query);
		echo "row_". $rowcount;
		if ($rowcount > 0)
		{
					while($row = $query->fetch_assoc())
						{
							$_SESSION['voter'] = $row['id'];
						}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
				
			
		}
		
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	header('location: index.php');

?>