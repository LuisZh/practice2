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
    $studentId = $_POST['studentId'];
	$studentName = $_POST['studentName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = crypt($_POST['password'], 'secret');
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO student (studentId,name,address,email,phone,password,birthday) VALUES ('$studentId', '$studentName', '$address', '$email', '$phone', '$password', '$birthday');";
	$res = mysqli_query($conn, $sql);
	if ($res) {
		echo "<script>alert('Register successfully, please log in to your account!'); </script>";
        echo "<meta http-equiv='Refresh' content='0; URL=../Login.php'>";;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

?>
