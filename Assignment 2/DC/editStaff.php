<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="dc") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}
//get edit data
$id = $_GET['id'];

$sql = "select * from staff where id='{$id}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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
            <form role="form" action="./updateStaff.php" method="post">
                <div class="userInfo">
                    <h2>Edit Staff</h2>
                    <div class="info-table">
                        <div class="info-row">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                            <div class="info-col1">Staff Name</div>
                            <div class="info-col2"
                            >
                                <?php echo $row["name"]; ?>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Unit</div>
                            <div class="info-col2">
                                <select id="unit" name="unit" class="form-select input-row">
                                    <?php foreach($rows2 as $k=>$v){?>
                                    <option value="<?php echo $v['unitName'] ?>"><?php echo $v['unitName'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-col1">Role</div>
                            <div class="info-col2">
                                <select id="role" name="role" class="form-select input-row">
                                    <option value="dc">Degree Coordinator</option>
                                    <option value="uc">Unit Coordinator</option>
                                    <option value="lecturer">Lecturer</option>
                                    <option value="tutor">Tutor</option>
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
                $("#unit  option[value='<?php echo $row['unit'];?>']").attr("selected",true);
                $("#role  option[value='<?php echo $row['role'];?>']").attr("selected",true);
            });
        </script>

    </body>
</html>