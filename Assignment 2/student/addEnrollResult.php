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
    include('../public/session.php');
    $unitName = $_POST['unit'];

	// Check connection

	$sql = "INSERT INTO enrollment (unitName, studentId) VALUES ('$unitName', '$session_userId');";
	$res = mysqli_query($conn, $sql);
	if ($res) {
		echo "<script>alert('Add enrollment successfully!'); </script>";
        echo "<meta http-equiv='Refresh' content='0; URL=./enroll.php'>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);


?>