<?php
    include '../public/session.php';
    include ('../public/db_conn.php');
    //get edit data
    $id = $_POST['id'];
    $name = $session_user;
    $semester = $_POST['semester'];

    switch ($semester) {
        case 'Semester 1':
            $set = 's1';
            break;
        case 'Semester 2':
            $set = 's2';
            break;
        case 'Winter School':
            $set = 'w';
            break;
        case 'Summer School':
            $set = 's';
            break;
    } 

    switch ($id) {
        case 'Semester 1':
            $old = 's1';
            break;
        case 'Semester 2':
            $old = 's2';
            break;
        case 'Winter School':
            $old = 'w';
            break;
        case 'Summer School':
            $old = 's';
            break;
    }

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    //update sql command
    $sql = "update staff set $set='1', $old='0' where name = '{$name}' ";
    $res = mysqli_query($conn,$sql);      
    //validation
    if (!$res) {
        echo "<script>alert('update failed!');
        </script>";   
    }else{
        echo "<script>alert('update success!');
        window.location.href='./myAccount.php';</script>";
    }


?>