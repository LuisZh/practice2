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
	$sessionType = $_POST['sessionType'];
	$lecturer = $_POST['lecturer'];
    $tutor = $_POST['tutor'];
    $day = $_POST['day'];
    $time = $_POST['time'];
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO teach (unitName, sessionType, lecturer, tutor, day, time) VALUES ('$unitName', '$sessionType', '$lecturer', '$tutor', '$day', '$time');";
	$res = mysqli_query($conn, $sql);
	if ($res) {
		echo "<script>alert('Add session successfully!'); </script>";
        echo "<meta http-equiv='Refresh' content='0; URL=./unitManagement.php'>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);


?>