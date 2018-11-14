<?php
date_default_timezone_set("Asia/Kolkata");
$mysql = mysqli_connect("localhost", "root", "", "days2");
error_reporting(0);
$qe=date("Y-m-d");
############################################################################
#$qe="2018-11-14";

$data = $mysql -> query("SELECT * FROM `data` WHERE `date` = '$qe'");
$dt = mysqli_fetch_assoc($data);
$day=date('l');
$dayn=$dt["dayn"];
$date=$dt["date"];
$hr=$dt["time"];
$ran=$dt["run"];
$read= $dt["readb"];
$write=$dt["writee"];
$rn=$dayn%7;
$weekn=(($dayn-$rn)/7)+1;


?>
<html>
    <head>
        <title>91Days</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
         input[type="checkbox"]{
            width: 20px; /*Desired width*/
            height: 20px; /*Desired height*/
            cursor: pointer;
            }
            input[id="ran"]:checked ~ .ran{
  background-color: rgb(152,195,121);
  color: white;
  border-color: rgb(152,195,121);}
input[id="write"]:checked ~ .write{
    background-color: rgb(152,195,121);
    color: white;
    border-color: rgb(152,195,121);}
input[id="read"]:checked ~ .read{
      background-color: rgb(152,195,121);
      color: white;
      border-color: rgb(152,195,121);}
      input[type="range"]{
        width:50%;
      }


        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="index.php">Home</a>
            <a href="cse.php">Computer Science</a>
            <a href="run.php">Running</a>
            <a href="write.php">Writing</a>
            <a href="read.php">Reading</a>
            <div class="days91">
            <a href="index.php" id="days91">91days</a>
          </div>
        </div>
        <div class="streak1">
                    <?php
        for($i=1;$i<10;$i++){
            echo "<span ";
            if($i<$hr){echo "class=\"circle\"";}
            else {echo "class=\"circlefuture\"";}
            echo "></span>";}
        ?>

        </div>

        <div>
            <form action="" method="post">
                              <input type="submit" class="submit">
                <input type="password" placeholder="Password" id="pass" name="pass"><br>

                <label id="range"><input type="range" min="0" max="3" value="1" name="hr" id="rangeinput" onchange="rangevalue.value=value"><output id="rangevalue">1</output></label><br>


                <?php

                if($ran==0){echo "<label class =\"ran\">Running<input type=\"checkbox\" id =\"ran\" name=\"run\" value=\"c\";></label><br>";}
                //else{echo "Running Done !<br>";}
                if($write==0){echo "<label class =\"write\" >Writing<input type=\"checkbox\" id =\"write\" name=\"write\" value=\"c\";></label><br>";}
                //else{echo "Writing Done !<br>";}
                if($read==0){echo "<label class =\"read\" >Reading<input type=\"checkbox\" id =\"read\" name=\"read\" value=\"c\";></label><br>";}
               // else{echo "Reading Done !<br>";}
                ?>
            </form>
        </div>
                <div class="heading">
                  <span style="font-size:25px;">| Day : <?php echo "<span>$dayn                   </span>";?>|</span>
                  <span style="font-size:25px;">[<?php echo "<span class=\"lol\">$date                    </span>";?>]</span>
                  <span style="font-size:25px;"><?php echo "| $day of Week $weekn |<br>"; ?></span>
        </div>
    </body>
</html>
<?php
$hr=$dt["time"];
if($_POST['pass']=="phionex"){
    $t=$_POST['hr'];
    $up=$t+$hr;
  if($_POST['run']=="c"){$mysql -> query("UPDATE `data` SET `run`=1 WHERE `date` = '$qe'");}
  if($_POST['write']=="c"){$mysql -> query("UPDATE `data` SET `writee`=1 WHERE `date` = '$qe'");}
  if($_POST['read']=="c"){$mysql -> query("UPDATE `data` SET `readb`=1 WHERE `date` = '$qe'");}
  if($t>0){$mysql -> query("UPDATE `data` SET `time`=$up WHERE `date` = '$qe'");}
    echo "Data has been Updated<br>";
    header("Refresh:0; url=index.php");
}
?>
