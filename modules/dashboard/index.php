<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>Side Menu</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php 
$page = 'Dashboard';
include "../../navbar.php";
 ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
</div>

<div  class="row g-3">
<div class="grid-container">
  <div class="grid-item dashboard"><i class="fa fa-users"> Total Resident</i></div>
  <div class="grid-item dashboard">2</div>
  <div class="grid-item dashboard">3</div>
  <div class="grid-item dashboard">4</div>
  <div class="grid-item dashboard">5</div>
  <div class="grid-item dashboard">6</div>
  <div class="grid-item dashboard">7</div>
  <div class="grid-item dashboard">8</div>
  <div class="grid-item dashboard">9</div>

</div>
</div>
</div>
</body>

</html>