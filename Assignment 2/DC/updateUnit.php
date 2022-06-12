<?php
    include '../public/session.php';
    include ('../public/db_conn.php');
    //get edit data
    $id = $_POST['id'];
    $unitName = $_POST['unitName'];
    $unitName = $_POST['unitName'];
    $semesters = $_POST['semesters'];
    $campus = $_POST['campus'];
    $description = $_POST['description'];
    $coordinator = $_POST['coordinator'];

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    //update sql command
    $sql = "update unit set unitName='{$unitName}',semesters='{$semesters}',campus='{$campus}',description='{$description}',coordinator='{$coordinator}' where id = '{$id}' ";
    $res = mysqli_query($conn,$sql);      
    //validation
    if (!$res) {
        echo "<script>alert('update failed!');
        </script>";   
    }else{
        echo "<script>alert('update success!');
        window.location.href='./masterUnit.php';</script>";
    }


?>