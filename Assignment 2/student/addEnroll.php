<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="student") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}

$sql2 = "select * from unit";
$res2 = mysqli_query($conn,$sql2);
$rows2 = array();
while ($row2 = mysqli_fetch_assoc($res2)) {
	$rows2[] = $row2;
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
                    <li><a href="./timeTable.php">Individual Timetable</a></li>
                    <li><a href="./enroll.php">Unit Enrolment</a></li>
                    <li><a href="./tutorialAllocation.php">Tutorial Allocation</a></li>
                    <li>
                        <a href="../logOut.php" onclick="logout()">Log Out</a>
                    </li>
                </ul>
            </nav>
            <form role="form" action="./addEnrollResult.php" method="post">
                <div class="userInfo">
                    <h2>Add Enrollment</h2>
                    <div class="info-table">
                        <div class="info-row">
                            <div class="info-col1">Unit Name</div>
                            <div class="info-col2"
                            >
                                <select id="unit" name="unit" class="form-select input-row">
                                    <option value="default">Please select the unit</option>
                                    <?php foreach($rows2 as $k=>$v){?>
                                    <option value="<?php echo $v['unitName'] ?>"><?php echo $v['unitName'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="info-row btn-row">
                            <div class="info-col">
                                <input type="submit" name="submit"
                    value="Enroll" class="btn-1 edit-btn" onclick="return validate()"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function validate() {

                if ($('#unit').val() == 'default') {
                    alert('Please select the unit');
                    return false;
                }
            }
        </script>

    </body>
</html>