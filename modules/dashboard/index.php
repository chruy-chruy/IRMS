<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Dashboard';

include "../../db_conn.php";
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
                <h1><?php if ($page) {echo $page;} ?></h1>
</div>

<div  class="row g-3">
<div class="grid-container-dashboard">

  <div class="dashboard">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  <div class="box-content">
  <span class="big"><?php
    $squery =  mysqli_query($conn, "SELECT COUNT(id) AS total_teacher FROM teacher Where del_status != 'deleted'");
    while ($row = mysqli_fetch_array($squery)) { echo $row['total_teacher']; }
    ?></span>
     Total Teachers
  </div>
  </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-users"></i></i></div> 
    <div class="box-content">
    <span class="big">1</span>
    Total Students
    </div>
    </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-address-book"></i></div> 
    <div class="box-content">
      <span class="big">1
      </span>
      Total Subjects
    </div>
    </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-certificate"></i></div> 
    <div class="box-content">
      <span class="big">1
      </span>
      Example
    </div>
    </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-certificate"></i></div> 
    <div class="box-content">
      <span class="big">1
      </span>
      Example
    </div>
    </div>
</div>
<br>
<!-- <img class="img" src="../../assets/img/brgy.jpg" alt="Paris" width="90%" height="500px"> -->
</div>
</div>
</body>

</html>