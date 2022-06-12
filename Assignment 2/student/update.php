<?php
include '../public/session.php';
include ('../public/db_conn.php');
//get edit data
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = crypt($_POST['password'], 'secret');


//update sql command
$sql = "update student set phone='{$phone}',email='{$email}',password='{$password}' where name = '{$session_user}' ";
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