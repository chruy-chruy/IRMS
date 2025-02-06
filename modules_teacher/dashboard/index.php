<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Dashboard';

include "../../db_conn.php";
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>IRMS-<?php if ($page) {echo $page;} ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>
<style>
  
        .scheduler {
    display: grid;
    grid-template-columns: 150px repeat(5, 1fr);
    grid-auto-rows: 50px;
    width: 100%;
    max-width: 90%;
    margin: 20px auto;
    background: white;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.scheduler div {
    border: 1px solid #ddd;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}
.scheduler .header1 {
    background-color: #007BFF;
    color: white;
    font-weight: bold;
}
.scheduler .time-slot {
    background-color: #f9f9f9;
    font-weight: bold;
    color: #333;
}
.scheduler .subject,
.scheduler button.subject {
    background-color:rgba(108, 215, 230, 0.36);
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    text-align: center;
    width: 100%;
    border: 1px solid #ddd;
}

.scheduler select {
    background-color:rgba(161, 179, 182, 0.99);
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    text-align: center;
    width: 100%;
    border: 1px solid #ddd;
}
.scheduler .subject:hover,
.scheduler button.subject:hover {
    background-color: #bbdefb;
}

.scheduler .break {
    background-color: #ffecb3;
    color: #ff9800;
}
.scheduler .lunch {
    background-color: #c8e6c9;
    color: #388e3c;
}

.table_wrap2 {
  background-color: #ffffffc0;
  margin-top: 60px;
  border-radius: 10px;
  box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
  border-collapse: collapse;
  padding: 10px;
}
.container {
            display: flex;
            gap: 20px; /* Space between the tables */
            justify-content: space-around; /* Distribute space between tables */
        }

.header .add{
    width: 150px;
  padding: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  border: 1px solid #cccccc;
  background-color: #2c2d2d;
  border-radius: 5px;
  font-size: 15px;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  color: #ffffff;
  float: right;
}

.header .add:hover {
  color: #ffffff;
  background-color: #560202;
}

.select-group {
            display: flex;
            align-items: center;
            gap: 10px; /* Space between label and select */
            font-family: Arial, sans-serif;
        }
        select {
            padding: 5px;
            font-size: 16px;
        }

    </style>
<body>
<?php include "../../navbar_teacher.php"; ?>
<div class="content">
<div class="header">
    <h1><?php if ($page) {echo $page;} ?></h1>
</div>
<div class="row g-3">
<div class="grid-container-dashboard">

    <!-- Total Students Under Teacher -->
    <div class="dashboard">
        <div class="box-icon"><i class="fa fa-users"></i></div> 
        <div class="box-content">
            <span class="big">
                <?php
                $squery = mysqli_query($conn, "
                    SELECT COUNT(DISTINCT ss.student) AS total_student 
                    FROM section_student ss
                    JOIN section_subject sub ON ss.section = sub.section
                    WHERE sub.teacher = '$teacher_id'
                ");
                $row = mysqli_fetch_assoc($squery);
                echo $row['total_student'];
                ?>
            </span>
            Total Students
        </div>
    </div>

    <!-- Total Subjects Assigned to the Teacher -->
    <div class="dashboard">
        <div class="box-icon"><i class="fa fa-address-book"></i></div> 
        <div class="box-content">
            <span class="big">
                <?php
                $squery = mysqli_query($conn, "
                    SELECT COUNT(DISTINCT subject) AS total_subject 
                    FROM section_subject 
                    WHERE teacher = '$teacher_id'
                ");
                $row = mysqli_fetch_assoc($squery);
                echo $row['total_subject'];
                ?>
            </span>
            Total Subjects
        </div>
    </div>

    <!-- Total Sections Assigned to the Teacher -->
    <div class="dashboard">
        <div class="box-icon"><i class="fa fa-certificate"></i></div> 
        <div class="box-content">
            <span class="big">
                <?php
                $squery = mysqli_query($conn, "
                    SELECT COUNT(DISTINCT section) AS total_section 
                    FROM section_subject 
                    WHERE teacher = '$teacher_id'
                ");
                $row = mysqli_fetch_assoc($squery);
                echo $row['total_section'];
                ?>
            </span>
            Total Sections
        </div>
    </div>

</div>


<!-- Students List Table -->
<div class="table_wrap2"> 
    <div class="header">
        <h2>Student List</h2>
        <?php include_once "../../includes/add_student.php"; ?>
    </div>
    <table id="student_table" class="data list">
        <thead>
            <tr>
                <th style="width: 60px;">ID</th>
                <th>Name</th>
                <th>Grade Level</th>
                <th>LRN Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "
                SELECT s.id, s.first_name, s.last_name, s.grade_level, s.lrn_number, ss.id AS section_student_id
                FROM section_student ss
                JOIN section_subject sub ON ss.section = sub.section
                JOIN student s ON ss.student = s.id
                WHERE sub.teacher = '$teacher_id'
                ORDER BY s.grade_level ASC
            ");
            while ($row = mysqli_fetch_array($query)) {
                $full_name = $row['first_name'] . " " . $row['last_name'];
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($full_name); ?></td>
                <td><?php echo htmlspecialchars($row['grade_level']); ?></td>
                <td><?php echo htmlspecialchars($row['lrn_number']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Sections List Table -->
<div class="table_wrap2"> 
    <div class="header">
        <h2>Section List</h2>
    </div>
    <table id="section_table" class="data list">
        <thead>
            <tr>
                <th>Section Name</th>
                <th>Grade Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "
                SELECT sec.name AS section_name, sec.grade_level 
                FROM section_subject sub
                JOIN section sec ON sub.section = sec.id
                WHERE sub.teacher = '$teacher_id'
                ORDER BY sec.grade_level ASC
            ");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                    <td>" . htmlspecialchars($row['section_name']) . "</td>
                    <td>" . htmlspecialchars($row['grade_level']) . "</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Subjects List Table -->
<div class="table_wrap2"> 
    <div class="header">
        <h2>Subject List</h2>
    </div>
    <table id="subject_table" class="data list">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Grade Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "
                SELECT sub.code, sub.name AS subject_name, sub.grade_level 
                FROM section_subject sec_sub
                JOIN subject sub ON sec_sub.subject = sub.id
                WHERE sec_sub.teacher = '$teacher_id'
                ORDER BY sub.grade_level ASC
            ");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                    <td>" . htmlspecialchars($row['code']) . "</td>
                    <td>" . htmlspecialchars($row['subject_name']) . "</td>
                    <td>" . htmlspecialchars($row['grade_level']) . "</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- DataTables Script -->
<script>
    $(document).ready(function() {
        new DataTable('#student_table', { order: [[2, 'asc']] });
        new DataTable('#section_table', { order: [[1, 'asc']] });
        new DataTable('#subject_table', { order: [[2, 'asc']] });
    });
</script>

<!-- Remove Button Styling -->
<style>
    .remove-btn {
        padding: 10px;
        margin-right: 20px;
        border: 1px solid #cccccc;
        background-color: #a03838;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        color: #ffffff;
        cursor: pointer;
        text-decoration: none;
    }
</style>

</div>
</div>
</body>
</html>
