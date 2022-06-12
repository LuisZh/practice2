<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="student") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}

$sql = "select * from student where name = '$session_user'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

$sql2 = "select * from enrollment where studentId = '{$session_userId}'";
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

            <div class="userInfo">
                <h2>Personal info</h2>
                <div class="info-table">
                    <div class="info-row">
                        <div class="info-col1">Name</div>
                        <div class="info-col2"><?php echo $row["name"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Student ID</div>
                        <div class="info-col2"><?php echo $row["studentId"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Email</div>
                        <div class="info-col2"><?php echo $row["email"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Password</div>
                        <div class="info-col2">*******</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Phone Number</div>
                        <div class="info-col2"><?php echo $row["phone"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Enrolled Unit</div>
                        <div class="info-col2"><?php foreach($rows2 as $k=>$v){?>
                            <span class="span-gap"><?php echo $v['unitName']; ?>; </span>
                        <?php }?>
                        
                        
                        </div>
                    </div>
                    <div class="info-row btn-row">
                        <div class="info-col">
                            <a href="./editMyInfo.php">
                            <button class="btn-1 edit-btn">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>