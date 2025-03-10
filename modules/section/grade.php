<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Section';

include "../../db_conn.php";
if (empty($_GET['grade']) || empty($_GET['sy']) ) {
  header("Location: ./");
  exit();
} 
$sy = $_GET['sy'];
$grade = $_GET['grade'];

 ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>IRMS-<?php if ($page) {echo $page;} ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include "../../navbar.php"; ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo $page . 's of Grade ' .$grade;} ?></h1>
</div>
<a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
<div class="search-box">
            <a href="./add.php?grade=<?php echo $grade;?>&sy=<?php echo $sy;?>"><button>Add</button></a>
        </div>
<div  class="row g-3">
<div class="grid-container-dashboard">

<?php
                // Updated SQL query to join section with teacher
                $squery = mysqli_query($conn, "
                    SELECT s.*, CONCAT(t.first_name, ' ', t.last_name) AS teacher_name 
                    FROM section s 
                    LEFT JOIN teacher t ON s.teacher_id = t.id 
                    WHERE s.del_status != 'deleted' AND s.grade_level = '$grade' AND s.school_year = '$sy'
                    ;
                ");
                while ($row = mysqli_fetch_array($squery)) {
                ?>

<a href="./schedule.php?section=<?php echo $row['id']; ?>&grade=<?php echo $grade; ?>&sy=<?php echo $sy; ?>&quarter=1" class="schedule">
    <div class="box-icon"><i class="fa fa-users"></i></div>
   <span style="font-size: 120%;"> <?php echo $row['name']; ?></span>
</a>

<?php } ?>
  
</div>
<br>
<!-- <img class="img" src="../../assets/img/school.jpg" alt="School" width="90%" height="600px"> -->
</div>
</div>
</body>

</html>