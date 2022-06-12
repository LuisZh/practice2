<?php
include("./public/session.php");
if($session_user!="") {
    //TODO 导航去不同角色首页
    if($session_access=="dc") {
        header('location: ./DC/index.php');
    }
    if($session_access=="uc") {
        header('location: ./UC/index.php');
    }
    if($session_access=="student") {
        header('location: ./student/index.php');
    }
    if($session_access=="tutor") {
        header('location: ./Staff/index.php');
    }
    if($session_access=="lecturer") {
        header('location: ./Staff/index.php');
    }
}
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	echo "<script>alert('$errormessage');</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Your Account</title>
        <link rel="stylesheet" type="text/css" href="login.css" />
        <script src="./public/jquery-3.3.1.min.js"></script>
        <body>
            <div class="loginbox">
                <img src="Logo.jpg" class="Logo" />
                <h1>Login Here</h1>
                <form method="POST" action="./logInResult.php">
                    <p>ID</p>
                    <input
                        type="text"
                        name="id"
                        required
                        placeholder="Enter Student/Staff ID"
                    />
                    <p>Password</p>
                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="Enter Password"
                    />
                    <p>Account Type</p>
                    <select
                        id="accountType"
                        name="accountType"
                        class="accountType"
                    >
                        <option value="default"
                            >Please select your account type</option
                        >
                        <option value="student">Student</option>
                        <option value="staff">Staff</option>
                    </select>
                    <input
                        type="submit"
                        value="Login"
                        onclick="return validate()"
                    />
                    <a href="index.html">Lost Your Password?</a><br />
                    <a href="./register/register.html"
                        >Don't have an account?</a
                    >
                </form>
            </div>

            <script>
                function validate() {
                    if ($('#accountType').val() == 'default') {
                        alert('Please select your account type');
                        return false;
                    }
                }
            </script>
        </body>
    </head>
</html>
