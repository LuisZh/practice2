<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
		
</head>
<body>

</body>
</html>


<?php
	include '../public/db_conn.php';
    $studentId = $_POST['staffId'];
	$staffName = $_POST['staffName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = crypt($_POST['password'], 'secret');
    $qualification = $_POST['qualification'];
    $expertise = $_POST['expertise'];
    $role = $_POST['accounttype'];
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO staff (staffId, name, email, phone, password, qualification, expertise, role) VALUES ('$studentId', '$staffName', '$email', '$phone', '$password', '$qualification', '$expertise','$role');";
	$res = mysqli_query($conn, $sql);
	if ($res) {
		echo "<script>alert('Register successfully, please log in to your account!'); </script>";
        echo "<meta http-equiv='Refresh' content='0; URL=../Login.php'>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);


?>