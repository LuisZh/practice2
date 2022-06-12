<?php
include '../public/session.php';
include ('../public/db_conn.php');
//get edit data
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = crypt($_POST['password'], 'secret');


//update sql command
$sql = "update staff set phone='{$phone}',email='{$email}',password='{$password}' where name = '{$session_user}' ";
$res = mysqli_query($conn,$sql);      
//validation
if (!$res) {
	echo "<script>alert('update failed!');
	</script>";   
}else{
	if($session_access == 'dc') {
        echo "<script>alert('update success!');
        window.location.href='./masterUnit.php';</script>";
    } else if ($session_access == 'uc') {
        echo "<script>alert('update success!');
        window.location.href='../UC/myAccount.php';</script>";
    } else {
        echo "<script>alert('update success!');
        window.location.href='../staff/myAccount.php';</script>";
    }
}

?>