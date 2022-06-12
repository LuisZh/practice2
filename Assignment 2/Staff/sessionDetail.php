<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="tutor" && $session_access!="lecturer") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}
$id = $_GET['id'];

$sql = "select * from allocation where teachId = '{$id}'";
$res = mysqli_query($conn,$sql);
$rows = array();
while ($row = mysqli_fetch_assoc($res)) {
	$rows[] = $row;
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
                    <li><a href="../unitDetails.php">Unit Detail</a></li>
                    <li>
                        <a href="./enrolledStudent.php">Enrolled Student Details</a>
                    </li>
                    <li>
                        <a href="../logOut.php" onclick="logout()">Log Out</a>
                    </li>
                </ul>
            </nav>

            <div class="userInfo">
                <h2>Enrolled Student Details</h2>
                <table class="info-table unit-table">
                    <tr class="unit-th">
                        <th class="info-td th">Student ID</th>
                        <th class="info-td th">Student Name</th>
                    </tr>
                    <?php foreach($rows as $k=>$v){?>
                    <tr>
                        <td class="info-td td-s"><?php echo $v['studentId'];?></td>
                        <td class="info-td td-s"><?php echo $v['studentName'];?></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>

    </body>
</html>