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
    $unitName = $_POST['unitName'];
	$semesters = $_POST['semesters'];
	$campus = $_POST['campus'];
	$description = $_POST['description'];
	$coordinator = $_POST['coordinator'];
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO unit (unitName, semesters, campus, description, coordinator) VALUES ('$unitName', '$semesters', '$campus', '$description', '$coordinator');";
	$res = mysqli_query($conn, $sql);
	if ($res) {
		echo "<script>alert('Add unit successfully!'); </script>";
        echo "<meta http-equiv='Refresh' content='0; URL=./masterUnit.php'>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);


?>