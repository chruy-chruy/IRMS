<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS-SUBJECT</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
    $page = 'Section';
    include "../../navbar.php";
    include "../../db_conn.php";
    ?>
    
    <div class="content">
        <?php include "../../includes/alert.php"; ?>
        <div class="header">
            <h1><?php if ($page) {echo $page;} ?></h1>
        </div>
        
        <div class="search-box">
            <a href="./add.php"><button>Add</button></a>
        </div>
        
        <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 60px;">ID</th>
                    <th>Section Name</th>
                    <th>Grade Level</th>
                    <th>Assigned Adviser</th>
                    <th style="width: 55px;">Action</th>
                </thead>
                <?php
                // Updated SQL query to join section with teacher
                $squery = mysqli_query($conn, "
                    SELECT s.*, CONCAT(t.first_name, ' ', t.last_name) AS teacher_name 
                    FROM section s 
                    LEFT JOIN teacher t ON s.teacher_id = t.id 
                    WHERE s.del_status != 'deleted' 
                    ORDER BY s.id DESC;
                ");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr class="table-row">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['grade_level']; ?></td>
                    <td><?php echo $row['teacher_name']; ?></td> <!-- Display full name here -->
                    <td>
                        <a class="view" href="edit.php?id=<?php echo $row['id']; ?>">View</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
    <script>new DataTable('#example', { order: [[0, 'desc']] });</script>

</body>

</html>
