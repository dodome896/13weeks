<?php
date_default_timezone_set("Asia/Kolkata");
$mysql = mysqli_connect("localhost", "root", "", "days2");
error_reporting(0);
$qe=date("Y-m-d");
################################################################################
#$qe="2018-11-12";
$data = $mysql -> query("SELECT * FROM `data` WHERE `date` = '$qe'");
$dt = mysqli_fetch_assoc($data);
$dn=$dt["dayn"];
?>
<html>
    <head>
        <title>Reading</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <div class="topnav">
            <a href="index.php">Home</a>
            <a href="cse.php">Computer Science</a>
            <a href="run.php">Running</a>
            <a href="write.php">Writing</a>
            <a href="read.php">Reading</a>
            <div class="days91">
            <a href="index.php" id="days91">Writing</a>
          </div>

        </div>
        <div class="streak">
                <?php
        for($i=1;$i<92;$i++){
            $run=$mysql -> query("SELECT * FROM `data` WHERE `dayn` = $i");
            $dt2 = mysqli_fetch_assoc($run);
            $runc=$dt2["writee"];
            echo "<span ";
            if($i>$dn){echo "class=\"circlefuture\"";}
            elseif($runc>0){echo "class=\"circle\"";}
            else {echo "class=\"circlef\"";}
            echo "></span>";
            if(($i)%7==0){echo "<br>";}
        }
        ?>
        </div>
    </body>
</html>
