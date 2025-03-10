<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Grades';

?>

<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS-Grades</title>
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
<?php include "../../navbar_teacher.php"; 
include "../../db_conn.php";
?>


<div class="content">
    <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
            </div>

    <!-- Students List Table -->
    <div class="table_wrap"> 
        <div class="header">
            <h2>Students List</h2>
        </div>
        <table id="example" class="data list">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Name</th>
                    <th>Grade Level</th>
                    <th>LRN Number</th>
                    <th style="width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Query to get the list of students assigned to the teacher's sections
                $query = mysqli_query($conn, "SELECT DISTINCT s.id, s.first_name, s.last_name, s.grade_level, s.lrn_number FROM student s INNER JOIN section_student ss ON s.id = ss.student INNER JOIN section_subject sub ON ss.section = sub.section WHERE sub.teacher = '$teacher_id' ORDER BY s.grade_level ASC");

                // Loop through the results and display the students
                while ($row = mysqli_fetch_array($query)) {
                    $full_name = $row['first_name'] . " " . $row['last_name'];
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($full_name); ?></td>
                        <td><?php echo htmlspecialchars($row['grade_level']); ?></td>
                        <td><?php echo htmlspecialchars($row['lrn_number']); ?></td>
                        <td>
                            <a class="view" href="add_grade.php?student_id=<?php echo $row['id']; ?>">Add Grade</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>new DataTable('#example', {
    order: [[0, 'desc']]
});</script>
</body>
</html>
