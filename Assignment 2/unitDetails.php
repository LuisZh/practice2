<?php
include('./public/session.php');
include ('./public/db_conn.php');

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
        <link rel="stylesheet" href="./Style.css" />
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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="Login.php">My Hub</a></li>
                    <li><a href="./unitDetails.php">Unit Detail</a></li>
                </ul>
            </nav>

            <div class="userInfo">
                <h2>Unit Details</h2>
                <table class="info-table unit-table">
                    <tr class="unit-th">
                        <th class="info-td th">ID</th>
                        <th class="info-td th">Unit Name</th>
                        <th class="info-td th">Offering Semesters</th>
                        <th class="info-td th">Campus</th>
                        <th class="info-td th">Unit Coordinator</th>
                        <th class="info-td th">Description</th>
                    </tr>
                    <?php foreach($rows as $k=>$v){?>
                    <tr>
                        <td class="info-td td-s"><?php echo $v['id'];?></td>
                        <td class="info-td td-l"><?php echo $v['unitName'];?></td>
                        <td class="info-td td-m"><?php echo $v['semesters'];?></td>
                        <td class="info-td td-m"><?php echo $v['campus'];?></td>
                        <td class="info-td td-l"><?php echo $v['coordinator'];?></td>
                        <td class="info-td td-l"><?php echo $v['description'];?></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>

    </body>
</html>