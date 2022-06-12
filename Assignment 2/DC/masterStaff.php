<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="dc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}
$sql = "select * from staff";
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
                <h2>Master List - Staff</h2>
                <table class="info-table unit-table">
                    <tr class="unit-th">
                        <th class="info-td th">ID</th>
                        <th class="info-td th">Staff ID</th>
                        <th class="info-td th">Staff Name</th>
                        <th class="info-td th">Role</th>
                        <th class="info-td th">Unit</th>
                        <th class="info-td th">Unavailability</th>
                        <th class="info-td th">Action</th>
                    </tr>
                    <?php foreach($rows as $k=>$v){?>
                    <tr>
                        <td class="info-td td-s"><?php echo $v['id'];?></td>
                        <td class="info-td td-s"><?php echo $v['staffId'];?></td>
                        <td class="info-td td-l"><?php echo $v['name'];?></td>
                        <td class="info-td td-m"><?php echo $v['role'];?></td>
                        <td class="info-td td-m"><?php echo $v['unit'];?></td>
                        <td class="info-td td-m"><?php 
                        $s1 = $v['s1'] == '1' ? 'Semester 1 ' : '';
                        $s2 = $v['s2'] == '1' ? 'Semester 2 ' : '';
                        $w = $v['w'] == '1' ? 'Winter School ' : '';
                        $s = $v['s'] == '1' ? 'Summer School' : '';
                        echo $s1 . $s2 . $w . $s;?></td>
                        <td class="info-td td-m">
                            <a class="edit-link" href="./editStaff.php?id=<?php echo $v['id'];?>">edit</a>
                            <a class="delete-link" href="./deleteStaff.php?id=<?php echo $v['id'];?>" onClick="return confirm('are you sure to delete?')">delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <div class="right-btn">
                    <a href="../register/staffRegister.html"><button class="btn-1 unit-btn">Add Staff</button></a>
                </div>
            </div>
        </div>

    </body>
</html>