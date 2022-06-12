<?php
    include '../public/session.php';
    include ('../public/db_conn.php');

    $name = $session_user;
    $semester = $_POST['semester'];

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    //update sql command
    $sql = "update staff set $semester='1' where name = '{$name}' ";
    $res = mysqli_query($conn,$sql);      
    //validation
    if (!$res) {
        echo "<script>alert('add failed!');
        </script>";   
    }else{
        echo "<script>alert('add success!');
        window.location.href='./myAccount.php';</script>";
    }


?>