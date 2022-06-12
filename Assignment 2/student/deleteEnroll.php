<?php
include('../public/session.php');
include '../public/db_conn.php';
//Get id
$id = $_GET['id'];
$unitName = $_GET['unitName'];
//send sql delete command
$sql = "delete from enrollment where id='{$id}'";
$sql2 = "delete from allocation where unitName='{$unitName} and studentId='{$session_userId}'";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$res = mysqli_query($conn,$sql);
$res2 = mysqli_query($conn,$sql2);
//validation
if (!$res) {
	echo "<script>alert('delete failed!')</script>";
}else{
	echo "<script>alert('delete success!');
	window.location.href='./enroll.php';</script>";
}
?>