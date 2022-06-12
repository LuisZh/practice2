<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="uc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}
//get edit data
$id = $_GET['id'];
echo $id;
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
            <form role="form" action="./updateAvi.php" method="post">
                <div class="userInfo">
                    <h2>Edit Unavailability</h2>
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
                                    <option value="Semester 1">Semester 1</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Winter School">Winter School</option>
                                    <option value="Summer School">Summer School</option>
                                </select>
                            </div>
                        </div>
                        <div class="info-row btn-row">
                            <div class="info-col">
                                <input type="submit" name="submit"
                    value="Confirm" class="btn-1 edit-btn"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            $(document).ready(function(){
                $("#semester  option[value='<?php echo $id;?>']").attr("selected",true);
            });
        </script>

    </body>
</html>