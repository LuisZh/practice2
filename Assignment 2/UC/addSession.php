<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="uc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}

$sql = "select * from staff where name = '$session_user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "select * from unit";
$res2 = mysqli_query($conn,$sql2);
$rows2 = array();
while ($row2 = mysqli_fetch_assoc($res2)) {
	$rows2[] = $row2;
}

$sql3 = "select * from staff where role = 'lecturer'";
$res3 = mysqli_query($conn,$sql3);
$rows3 = array();
while ($row3 = mysqli_fetch_assoc($res3)) {
	$rows3[] = $row3;
}

$sql4 = "select * from staff where role = 'tutor'";
$res4 = mysqli_query($conn,$sql4);
$rows4 = array();
while ($row4 = mysqli_fetch_assoc($res4)) {
	$rows4[] = $row4;
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
            <form role="form" action="./addSessionResult.php" method="post">
                <div class="userInfo">
                    <h2>Create Unit Session</h2>
                    <div class="info-table">
                        <div class="info-row">
                            <div class="info-col1">Unit Name</div>
                            <div class="info-col2"
                            >
                                <select id="unitName" name="unitName" class="form-select input-row">
                                    <?php foreach($rows2 as $k=>$v){?>
                                    <option value="<?php echo $v['unitName'] ?>"><?php echo $v['unitName'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Session Type</div>
                            <div class="info-col2">
                                <select id="sessionType" name="sessionType" class="form-select input-row">
                                    <option value="default">Please select the session type</option>
                                    <option value="lecturer">Lecture</option>
                                    <option value="tutorial">Tutorial</option>
                                    <option value="consultation">Consultation</option>
                                </select>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Lecturer</div>
                            <div class="info-col2">
                                <select id="lecturer" name="lecturer" class="form-select input-row">
                                    <option value="default">Please select the lecturer</option>
                                    <?php foreach($rows3 as $k=>$v){?>
                                    <option value="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Tutor</div>
                            <div class="info-col2">
                                <select id="tutor" name="tutor" class="form-select input-row">
                                    <option value="default">Please select the tutor</option>
                                    <?php foreach($rows4 as $k=>$v){?>
                                    <option value="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Day</div>
                            <div class="info-col2">
                                <select id="day" name="day" class="form-select input-row">
                                    <option value="default">Please select the session day</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday </option>
                                </select>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Time</div>
                            <div class="info-col2">
                                <select id="time" name="time" class="form-select input-row">
                                    <option value="default">Please select the session time</option>
                                    <option value="9:00">9:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="15:00">15:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="info-row btn-row">
                            <div class="info-col">
                                <input type="submit" name="submit"
                    value="Add" class="btn-1 edit-btn" onclick="return validate()"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function validate() {

                if ($('#sessionType').val() == 'default') {
                    alert('Please select the session type');
                    return false;
                } else if ($('#day').val() == 'default') {
                    alert('Please select the day');
                    return false;
                } else if ($('#time').val() == 'default') {
                    alert('Please select the time');
                    return false;
                } else if ($('#lecturer').val() == 'default') {
                    alert('Please select the lecturer');
                    return false;
                } else if ($('#tutor').val() == 'default') {
                    alert('Please select the tutor');
                    return false;
                }
            }
        </script>

    </body>
</html>