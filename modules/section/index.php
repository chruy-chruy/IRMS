<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Section';

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
<div class="grid-container-schedule">

<a href="./grade.php?grade=7" class="schedule">
    <div class="box-icon"><i class="fa fa-users"></i></div>
    Grade 7
</a>

<a href="./grade.php?grade=8" class="schedule">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  Grade 8
</a>

<a href="./grade.php?grade=9" class="schedule">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  Grade 9
</a>

<a href="./grade.php?grade=10" class="schedule">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  Grade 10
</a>
  
</div>
</div>

</div>
</body>

</html>