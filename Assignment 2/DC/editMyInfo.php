<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="dc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}

$sql = "select * from staff where name = '$session_user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>University of DoWell</title>
        <script src="../public/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="../Style.css" />
        <script>
            function logout(){
                alert("<?php echo'You have log out your account!' ?>");
            }
        </script>
    </head>
    <body>
        <div class="wrapper index-wrap">
            <nav>
                <ul>
                    <li><a href="./index.php">My HOME</a></li>
                    <li><a href="./myAccount.php">My Account</a></li>
                    <li><a href="./masterStaff.php">Master Staff</a></li>
                    <li><a href="./masterUnit.php">Master Unit</a></li>
                    <li><a href="./unitManagement.php">Unit Management</a></li>
                    <li><a href="../unitDetails.php">Unit Detail</a></li>
                    <li>
                        <a href="./enrolledStudent.php">Enrolled Student Details</a>
                    </li>
                    <li>
                        <a href="../logOut.php" onclick="logout()">Log Out</a>
                    </li>
                </ul>
            </nav>
            <form role="form" action="./update.php" method="post">
                <div class="userInfo">
                    <h2>Edit Personal info</h2>
                    <div class="info-table">
                        <div class="info-row">
                            <div class="info-col1">Name</div>
                            <div class="info-col2"
                            >
                                <?php echo $row["name"]; ?>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Staff ID</div>
                            <div class="info-col2">
                                <?php echo $row["staffId"]; ?>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Email</div>
                            <div class="info-col2">
                                <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>">
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Password</div>
                            <div class="info-col2">
                                <input type="password" id="password"  name="password" placeholder="********">
                            </div>
                        </div>
                         <div class="info-row">
                            <div class="info-col1">Confirem Password</div>
                            <div class="info-col2">
                                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="********">
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Phone Number</div>
                            <div class="info-col2">
                                <input type="number" required name="phone" value="<?php echo $row["phone"]; ?>">
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Qualifacation</div>
                            <div class="info-col2"><?php echo $row["qualification"]; ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Expertise</div>
                            <div class="info-col2"><?php echo $row["expertise"]; ?></div>
                        </div>
                        <div class="info-row btn-row">
                            <div class="info-col">
                                <input type="submit" name="submit"
                    value="Confirm" class="btn-1 edit-btn" onclick="return validate()"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function validate() {
                var reg = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!@#$%^]).*$/;
                var validpassword = $('#password').val();
                var email = $('#email').val();

                var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (!emailRegex.test(email)) {
                    alert('Email is not valid');
                    return false;
                } else if (
                    validpassword.length < 6 ||
                    validpassword.length > 12
                ) {
                    alert('Password length should be 6-12');
                    return false;
                } else if (
                    $('#password').val() != $('#confirmpassword').val()
                ) {
                    alert('Password does not match');
                    return false;
                } else if (!reg.test(validpassword)) {
                    alert(
                        'Password must contain 1 lower case letter, 1 uppercase letter, 1 number and one of the following special characters ! @ # $ % ^ '
                    );
                    return false;
                } 
            }
        </script>

    </body>
</html>