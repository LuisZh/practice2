<?php
include('../public/session.php');
if($session_access!="student") {
    echo'<script>alert("You dont have enough access!");
  window.location.href="../index.html";
  </script>'; 
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
                    <li><a href="../index.html">HOME</a></li>
                    <li><a href="./myAccount.php">My Account</a></li>
                    <li><a href="./timeTable.php">Individual Timetable</a></li>
                    <li><a href="./enroll.php">Unit Enrolment</a></li>
                    <li><a href="./tutorialAllocation.php">Tutorial Allocation</a></li>
                    <li>
                        <a href="../logOut.php" onclick="logout()">Log Out</a>
                    </li>
                </ul>
            </nav>

            <div class="section index-section">
                <h1>
                    Welcome to University of DoWell <br />
                    Have a great day!
                </h1>
                <button class="btn-1"><?php echo $session_user ?></button>

        
            </div>
        </div>

    </body>
</html>