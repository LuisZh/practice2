<?php
include('../public/session.php');
include ('../public/db_conn.php');
if($session_access!="tutor" && $session_access!="lecturer") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
}

$sql = "select * from staff where name = '$session_user'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
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
                <h2>Personal info</h2>
                <div class="info-table">
                    <div class="info-row">
                        <div class="info-col1">Name</div>
                        <div class="info-col2"><?php echo $row["name"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Staff ID</div>
                        <div class="info-col2"><?php echo $row["staffId"]; ?></div>
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
                        <div class="info-col1">Qualifacation</div>
                        <div class="info-col2"><?php echo $row["qualification"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col1">Expertise</div>
                        <div class="info-col2"><?php echo $row["expertise"]; ?></div>
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

            <div class="userInfo">
                <h2>Unavailability</h2>
                <table class="info-table unit-table">
                    <tr class="unit-th">
                        <th class="info-td th">Semester</th>
                        <th class="info-td th">Action</th>
                    </tr>

                    <?php if ($row["s1"] == '1') {?>
                        <tr>
                            <td class="info-td td-m"><?php echo 'Semester 1';?></td>
                            <td class="info-td td-m">
                            <a class="edit-link" href="./editAvi.php?id=<?php echo 'Semester 1';?>">edit</a>
                            <a class="delete-link" href="./deleteAvi.php?id=<?php echo 's1';?>" onClick="return confirm('are you sure to delete?')">delete</a>
                            </td>
                        </tr>
                    <?php }?>
                    <?php if ($row["s2"] == '1') {?>
                        <tr>
                            <td class="info-td td-m"><?php echo 'Semester 2';?></td>
                            <td class="info-td td-m">
                            <a class="edit-link" href="./editAvi.php?id=<?php echo 'Semester 2';?>">edit</a>
                            <a class="delete-link" href="./deleteAvi.php?id=<?php echo 's2';?>" onClick="return confirm('are you sure to delete?')">delete</a>
                            </td>
                        </tr>
                    <?php }?>
                    <?php if ($row["w"] == '1') {?>
                        <tr>
                            <td class="info-td td-m"><?php echo 'Winter School';?></td>
                            <td class="info-td td-m">
                            <a class="edit-link" href="./editAvi.php?id=<?php echo 'Winter School';?>">edit</a>
                            <a class="delete-link" href="./deleteAvi.php?id=<?php echo 'w';?>" onClick="return confirm('are you sure to delete?')">delete</a>
                            </td>
                        </tr>
                    <?php }?>
                    <?php if ($row["s"] == '1') {?>
                        <tr>
                            <td class="info-td td-m"><?php echo 'Summer School';?></td>
                            <td class="info-td td-m">
                            <a class="edit-link" href="./editAvi.php?id=<?php echo 'Summer School';?>">edit</a>
                            <a class="delete-link" href="./deleteAvi.php?id=<?php echo 's';?>" onClick="return confirm('are you sure to delete?')">delete</a>
                            </td>
                        </tr>
                    <?php }?>

                </table>
                <div class="right-btn">
                    <a href="./addAvi.php"><button class="btn-1 staff-add-btn">Add</button></a>
                </div>
            </div>
        </div>

    </body>
</html>