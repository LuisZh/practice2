<?php
include '../public/db_conn.php';
//Get id
$id = $_GET['id'];
//send sql delete command
$sql = "delete from unit where id='{$id}'";
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
	window.location.href='./masterUnit.php';</script>";
}
?>