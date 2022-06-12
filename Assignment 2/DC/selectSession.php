<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="dc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}
$unitName = $_GET['unitName'];

$sql = "select * from teach where unitName = '{$unitName}' and sessionType = 'tutorial'";
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

            <div class="userInfo">
                <h2><?php echo $unitName;?></h2>
                <table class="info-table unit-table">
                    <tr class="unit-th">
                        <th class="info-td th">Session Type</th>
                        <th class="info-td th">Tutor</th>
                        <th class="info-td th">Day</th>
                        <th class="info-td th">Time</th>
                        <th class="info-td th">Action</th>
                    </tr>
                    <?php foreach($rows as $k=>$v){?>
                    <tr>
                        <td class="info-td td-m"><?php echo $v['sessionType'];?></td>
                        <td class="info-td td-l"><?php echo $v['tutor'];?></td>
                        <td class="info-td td-l"><?php echo $v['day'];?></td>
                        <td class="info-td td-l"><?php echo $v['time'];?></td>
                        <td class="info-td td-m">
                            <a class="edit-link" href="./sessionDetail.php?id=<?php echo $v['id'];?>">select</a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>

    </body>
</html>