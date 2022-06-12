<?php
include '../public/db_conn.php';
include '../public/session.php';

$name = $session_user;
//Get id
$id = $_GET['id'];
//send sql delete command
$sql = "update staff set $id='0' where name = '{$name}' ";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$res = mysqli_query($conn,$sql);
//validation
if (!$res) {
	echo "<script>alert('delete failed!')</script>";
}else{
	echo "<script>alert('delete success!');
	window.location.href='./myAccount.php';</script>";
}
?>