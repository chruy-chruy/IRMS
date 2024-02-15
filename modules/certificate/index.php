<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <title>Residents</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <!-- <script src="../../assets/js/table.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'Certificate';
include "../../navbar.php";
include "../../db_conn.php";

 ?>
        <div class="content">
            <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1><?php if ($page) {echo "Barangay ".$page;} ?></h1>
            </div>
            <div class="search-box">
                <!-- <input type="text" placeholder="Search" class="search-input" data-table="list"> -->
                <a href="#"><button class="generate" id="certBtn" type="button" onclick="generate()">Generate</button></a>
                <?php
                include_once "../../includes/modal_cert.php";
            ?>
            </div>
            <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 50px;">ID</th>
                    <th>Name</th>
                    <th style="width: 55px;">Action</th>
                </thead>
                <?php
        $squery =  mysqli_query($conn, "SELECT * from resident Where del_status != 'deleted'");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
                <tr class="table-row">
                    <td><?php echo $row['id'] ?></td>
                    <td>
                        <div class="profile">
                        <img src="../../uploads/<?php echo $row['image'] ?>" alt="">
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
                        </div>
                    </td>
                    <td>
                        <a class="view" href="edit.php?id=<?php echo $row['id'] ?>">
                        view
                        </a>
                        <!-- <a href=""><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> -->
                    </td>
                </tr>
                <?php }?>
            </table>
            </div>
    </div>
<script>new DataTable('#example');
new DataTable('#example2',{
  info: false,
    ordering: false,
    paging: false
});</script>

</body>

</html>