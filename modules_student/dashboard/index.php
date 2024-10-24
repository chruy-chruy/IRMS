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
<?php include "../../navbar_student.php"; ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
</div>
On Progress
<br>
<!-- <img class="img" src="../../assets/img/school.jpg" alt="School" width="90%" height="600px"> -->
</div>
</div>
</body>

</html>