<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="dc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}
$sql = "select * from unit";
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
                <h2>Master List - Unit</h2>
                <table class="info-table unit-table">
                    <tr class="unit-th">
                        <th class="info-td th">ID</th>
                        <th class="info-td th">Unit Name</th>
                        <th class="info-td th">Campus</th>
                        <th class="info-td th">Semester</th>
                        <th class="info-td th">Unit Coordinator</th>
                        <th class="info-td th">Description</th>
                        <th class="info-td th">Action</th>
                    </tr>
                    <?php foreach($rows as $k=>$v){?>
                    <tr>
                        <td class="info-td td-s"><?php echo $v['id'];?></td>
                        <td class="info-td td-l"><?php echo $v['unitName'];?></td>
                        <td class="info-td td-m"><?php echo $v['campus'];?></td>
                        <td class="info-td td-m"><?php echo $v['semesters'];?></td>
                        <td class="info-td td-l"><?php echo $v['coordinator'];?></td>
                        <td class="info-td td-l"><?php echo $v['description'];?></td>
                        <td class="info-td td-m">
                            <a class="edit-link" href="./editUnit.php?id=<?php echo $v['id'];?>">edit</a>
                            <a class="delete-link" href="./deleteUnit.php?id=<?php echo $v['id'];?>" onClick="return confirm('are you sure to delete?')">delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <div class="right-btn">
                    <a href="./addUnit.php"><button class="btn-1 unit-btn">Add Unit</button></a>
                </div>
            </div>
        </div>

    </body>
</html>