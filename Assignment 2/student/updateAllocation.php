<?php
    include '../public/session.php';
    include ('../public/db_conn.php');
    //get edit data
    $id = $_GET['id'];
    $unitName = $_GET['unitName'];
    $capacity = $_GET['capacity'];
    $updatedCapacity = $capacity + 1;

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql0 = "select * from allocation where teachId='{$id}' and studentId='{$session_userId}'";
    $res0 = mysqli_query($conn,$sql0);
    $row = mysqli_fetch_assoc($res0);
    if($row) {
        echo "<script>alert('You already joined in this session!');
            window.location.href='./tutorialAllocation.php';</script>";
        
    } else {


        //update sql command
        $sql = "INSERT INTO allocation (unitName, studentId, studentName, teachId) VALUES ('$unitName', '$session_userId', '$session_user', '$id');";
        $res = mysqli_query($conn,$sql);

        $sql2 = "update teach set capacity='{$updatedCapacity}' where id = '{$id}' ";
        $res2 = mysqli_query($conn,$sql2);

        //validation
        if (!$res) {
            echo "<script>alert('allocation failed!');
            </script>";   
        }else{
            echo "<script>alert('allocation success!');
            window.location.href='./tutorialAllocation.php';</script>";
        }

    };


?>