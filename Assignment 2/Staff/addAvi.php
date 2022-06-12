<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="tutor" && $session_access!="lecturer") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}


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
                    <li><a href="../unitDetails.php">Unit Detail</a></li>
                    <li>
                        <a href="./enrolledStudent.php">Enrolled Student Details</a>
                    </li>
                    <li>
                        <a href="../logOut.php" onclick="logout()">Log Out</a>
                    </li>
                </ul>
            </nav>
            <form role="form" action="./addAviAction.php" method="post">
                <div class="userInfo">
                    <h2>Add Unavailability</h2>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="info-table">
                        <div class="info-row">
                            <div class="info-col1">Name</div>
                            <div class="info-col2"
                            >
                                <?php echo $session_user; ?>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Semester</div>
                            <div class="info-col2">
                                <select id="semester" name="semester" class="form-select input-row">
                                    <option value="s1">Semester 1</option>
                                    <option value="s2">Semester 2</option>
                                    <option value="w">Winter School</option>
                                    <option value="s">Summer School</option>
                                </select>
                            </div>
                        </div>
                        <div class="info-row btn-row">
                            <div class="info-col">
                                <input type="submit" name="submit"
                    value="Add" class="btn-1 edit-btn"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>