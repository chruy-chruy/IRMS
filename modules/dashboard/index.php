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
    <title><?php if ($page) {echo $page;} ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/republic.ico">
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
    $squery =  mysqli_query($conn, "SELECT COUNT(id) AS total_resident FROM resident Where del_status != 'deleted'");
    while ($row = mysqli_fetch_array($squery)) { echo $row['total_resident']; }
    ?></span>
     Total Resident
  </div>
  </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-male"></i></div> 
    <div class="box-content">
    <span class="big"><?php
    $squery =  mysqli_query($conn, "SELECT COUNT(id) AS male FROM resident 
    Where del_status != 'deleted' && gender = 'male' ");
    while ($row = mysqli_fetch_array($squery)) { echo $row['male']; }
    ?></span>
    Male
    </div>
    </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-female"></i></div> 
    <div class="box-content">
      <span class="big"> <?php $squery =  mysqli_query($conn, "SELECT COUNT(id) AS female FROM resident 
      Where del_status != 'deleted' && gender = 'female' ");
      while ($row = mysqli_fetch_array($squery)) { echo $row['female']; } ?>
      </span>
      Female
    </div>
    </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-certificate"></i></div> 
    <div class="box-content">
      <span class="big"> <?php $squery =  mysqli_query($conn, "SELECT COUNT(id) AS 'certificate' FROM certificate");
      while ($row = mysqli_fetch_array($squery)) { echo $row['certificate']; } ?>
      </span>
      Barangay Certificate
    </div>
    </div>

    <div class="dashboard">
    <div class="box-icon"><i class="fa fa-certificate"></i></div> 
    <div class="box-content">
      <span class="big"> <?php $squery =  mysqli_query($conn, "SELECT COUNT(id) AS 'clearance' FROM clearance");
      while ($row = mysqli_fetch_array($squery)) { echo $row['clearance']; } ?>
      </span>
      Barangay Clearance
    </div>
    </div>
</div>
<br>
<img class="img" src="../../assets/img/brgy.jpg" alt="Paris" width="90%" height="500px">
</div>
</div>
</body>

</html>