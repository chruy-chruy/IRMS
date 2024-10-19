<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS-TEACHER</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <!-- <script src="../../assets/js/table.js"></script> -->
    <script src="../../assets/js//jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'Teacher';
include "../../navbar.php";
include "../../db_conn.php";

 ?>
        <div class="content">
            <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
            </div>
            
            <div class="search-box">
            <!-- <a href="./export.php"><button style="float:left;">Export</button></a> -->
                <a href="./add.php"><button>Add</button></a>
            </div>
            <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 60px;">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="width: 55px;">Action</th>
                </thead>
                <?php
        $squery =  mysqli_query($conn, "SELECT * from teacher Where del_status != 'deleted' ORDER BY id DESC;");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
                <tr class="table-row">
                    <td><?php echo $row['id'] ?></td>
                    <td>
                        <div class="profile">
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
                        </div>
                    </td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <a class="view" href="edit.php?id=<?php echo $row['id'] ?>">
                        View
                        </a>
                        <!-- <a href=""><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> -->
                    </td>
                </tr>
                <?php }?>
            </table>
            </div>
    </div>
<script>new DataTable('#example', {
    order: [[0, 'desc']]
});</script>

</body>

</html>