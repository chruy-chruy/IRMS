<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Section';

include "../../db_conn.php";
if (!isset($_GET['section'])) {
  header("Location: ./");
  exit();
} 
$section = $_GET['section'];
if (!isset($_GET['quarter'])) {
    header("Location: ./schedule.php?section=$section&quarter=1");
  } 
  $quarter = $_GET['quarter'];

$squery = mysqli_query($conn, "
                    SELECT s.*, CONCAT(t.first_name, ' ', t.last_name) AS teacher_name 
                    FROM section s 
                    LEFT JOIN teacher t ON s.teacher_id = t.id 
                    WHERE s.del_status != 'deleted' AND s.id = '$section'
                    ;
                ");
while ($row = mysqli_fetch_array($squery)) { $section_name = $row['name']; $grade = $row['grade_level']; }
?>
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
    <!-- <script src="../../assets/js/table.js"></script> -->
    <script src="../../assets/js//jquery-3.7.0.js"></script>
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
    background-color: #e3f2fd;
    color: #1e88e5;
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
  width: 45%;
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
<?php include "../../navbar.php"; ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo 'Grade '.$grade. ' - ' .$section_name;} ?></h1>
</div>

<div class="select-group">
        <h4>Select Quarter:</h4>
        <select name="quarter" id="quarter-select" onchange="goToLink()">
            <option hidden value="<?php echo $quarter ?>">Quarter <?php echo $quarter ?></option>
            <option value="./schedule.php?section=<?php echo $section?>&quarter=1">Quarter 1</option>
            <option value="./schedule.php?section=<?php echo $section?>&quarter=2">Quarter 2</option>
            <option value="./schedule.php?section=<?php echo $section?>&quarter=3">Quarter 3</option>
            <option value="./schedule.php?section=<?php echo $section?>&quarter=4">Quarter 4</option>
        </select>
</div>

<script>
        function goToLink() {
            const select = document.getElementById("quarter-select");
            const url = select.value;

            if (url) {
                window.location.href = url; // Redirect to the selected link
            }
        }
    </script>


        <div class="container">
        <div class="table_wrap2">
        <div class="header">
            <h2>Student List</h2>
            <button class="add" id="delBtn" type="button" onclick="add()">Add</button>
            <?php
                include_once "../../includes/add_student.php";
            ?>
        </div>
            <table id="student" class="data list">
            <thead>
                    <th style="width: 60px;">ID</th>
                    <th>Name</th>
                    <th>Grade Level</th>
                    <th>Section</th>
                    <th>LRN Number</th>
                    <th style="width: 55px;">Action</th>
                </thead>
                <?php
                // Adjusted SQL query to select students
                $squery = mysqli_query($conn, "
              SELECT s.*, CONCAT(s.first_name, ' ', s.last_name) AS student_name, t.id AS section_student_id,t.section,t.quarter FROM student s INNER JOIN section_student t ON s.id = t.student ORDER BY s.id ASC;
            ");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr class="table-row">
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <div class="profile">
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                        </div>
                    </td>
                    <td><?php echo $row['grade_level']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['lrn_number']; ?></td>
                    <td>
                        <a href="../Student/edit.php?id=<?php echo $row['id']; ?>">
                        View
                        </a>
                        <a href="remove_student.php?id=<?php echo $row['section_student_id']; ?>">
                        Remove
                        </a>
                        <!-- Add more actions if needed -->
                    </td>
                </tr>
                <?php }?>
            </table>

            
        </div>
        <div class="table_wrap2">
        <div class="header">
            <h2>Subject List</h2>
            <button class="add" id="delBtn" type="button" onclick="addSub()">Add</button>
            <?php
                include_once "../../includes/add_subject.php";
            ?>
        </div>
            <table id="subject" class="data list">
                <thead>
                <th>ID</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Assigned Teacher</th>
                    <th>Action</th>
                </thead>
                <?php
                // Updated SQL query to join section with teacher
                $squery = mysqli_query($conn, "
                 SELECT s.*, t.id AS section_subject_id, t.section, t.quarter, CONCAT(te.first_name, ' ', te.last_name) AS teacher_name FROM subject s INNER JOIN section_subject t ON s.id = t.subject INNER JOIN teacher te ON s.teacher_id = te.id ORDER BY s.id ASC;
                ");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr class="table-row">
                <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['code'] ?></td>
                    <td><?php echo $row['teacher_name'] ?></td>
                    <td>
                        <a href="../Subject/edit.php?id=<?php echo $row['id']; ?>">
                        View
                        </a>
                        <a href="remove_subject.php?id=<?php echo $row['section_subject_id']; ?>">
                        Remove
                        </a>
                        <!-- Add more actions if needed -->
                    </td>
                </tr>
                <?php } ?>
            </table>

            
        </div>
    
    <script>
    new DataTable('#student', { order: [[2, 'asc']] });
    new DataTable('#subject', { order: [[2, 'asc']] });
    </script>
</div>


</div>
</body>

</html>