<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>


</body>
</html>

<?php
	//include the file config.php for database connection
	include './public/db_conn.php';
	//include the file session.php
	include('./public/session.php');
    $accountType = $_POST['accountType'];
	$id = $_POST['id'];
    $password = crypt($_POST['password'], 'secret');

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($accountType == 'student') {
        $sql = "select * from student where studentId = '$id'";

    } else {
        $sql = "select * from staff where staffId = '$id'";
    }

    $result = $conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);

    if($row['password']==$password) {
        $session_user=$row['name'];
        $session_access=$row['role'];
        $_SESSION['user']=$session_user;
        $_SESSION['role']=$session_access;

        if ($_SESSION['role'] == "student") {
            $session_userId=$row['studentId'];
            $_SESSION['userId']=$session_userId;
            echo "<script>alert('You have successfully log in your account!'); </script>";
            echo "<meta http-equiv='Refresh' content='0; URL=./student/index.php'>";
        } else if ($_SESSION['role'] == "dc") {
            $session_userId=$row['staffId'];
            $_SESSION['userId']=$session_userId;
            echo "<script>alert('You have successfully log in your account!'); </script>";
            echo "<meta http-equiv='Refresh' content='0; URL=./DC/index.php'>";
        } else if ($_SESSION['role'] == "uc") {
            $session_userId=$row['staffId'];
            $_SESSION['userId']=$session_userId;
            echo "<script>alert('You have successfully log in your account!'); </script>";
            echo "<meta http-equiv='Refresh' content='0; URL=./UC/index.php'>";
        } else {
            $session_userId=$row['staffId'];
            $_SESSION['userId']=$session_userId;
            echo "<script>alert('You have successfully log in your account!'); </script>";
            echo "<meta http-equiv='Refresh' content='0; URL=./Staff/index.php'>";
        }
    } else {
        header('Location: ./Login.php?error=invalid_password');
    }

    mysqli_close($conn);

?>