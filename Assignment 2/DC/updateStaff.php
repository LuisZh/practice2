<?php
    include '../public/session.php';
    include ('../public/db_conn.php');
    //get edit data
    $id = $_POST['id'];
    $unit = $_POST['unit'];
    $role = $_POST['role'];
    $name = $_POST['name'];
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    //update sql command
    $sql = "update staff set unit='{$unit}',role='{$role}' where id = '{$id}' ";
    $res = mysqli_query($conn,$sql);
    
    if ($role = 'uc') {
        $sql2 = "update unit set coordinator='{$name}' where unitName = '{$unit}' ";
        $res2 = mysqli_query($conn,$sql2);
    };
    //validation
    if (!$res) {
        echo "<script>alert('update failed!');
        </script>";   
    }else{
        echo "<script>alert('update success!');
        window.location.href='./masterStaff.php';</script>";
    }


?>