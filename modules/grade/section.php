<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Grade';

          if(isset($_GET['message'])){
            $message = $_GET['message'];
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
include "../../db_conn.php";
if (!isset($_GET['section'])) {
  header("Location: ./");
  exit();
} 
$section = $_GET['section'];
$sy = $_GET['sy'];
$grade = $_GET['grade'];
if (!isset($_GET['quarter'])) {
    header("Location: ./section.php?section=$section&quarter=1&sy=$sy&grade=$grade");
  } 
  $quarter = $_GET['quarter'];

$squery = mysqli_query($conn, "
                    SELECT s.*, CONCAT(t.first_name, ' ', t.last_name) AS teacher_name 
                    FROM section s 
                    LEFT JOIN teacher t ON s.teacher_id = t.id 
                    WHERE s.del_status != 'deleted' AND s.id = '$section'
                    ;
                ");

while ($row = mysqli_fetch_array($squery)) { 
    $section_name = $row['name']; 
    $grade = $row['grade_level']; 
    $teacher_name =  $row['teacher_name'];
}

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
  width: 100%;
  border-collapse: collapse;
  padding: 10px;
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
<?php include "../../navbar.php"; ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo 'Grade '.$grade. ' - ' .$section_name;} ?></h1>
</div>


<div class="search-box">
<a href="./grade_level.php?grade=<?php echo $grade?>&sy=<?php echo $sy?>" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
</div>

<div class="info-box">
    <div class="row">
        <span class="left"><strong>Section:</strong> <?php echo $section_name ?></span>
        <span class="right"><strong>School Year:</strong> <?php echo $sy ?></span>
    </div>
    <div class="row">
        <span class="left"><strong>Adviser:</strong> <?php echo $teacher_name ?></span>
        <span class="right"><strong>Grade Level:</strong> <?php echo $grade ?></span>
    </div>
</div>

<style>
    .info-box {
        font-family: Arial, sans-serif;
        font-size: 14px;
        margin: 20px auto;
        width: 100%;
    max-width: 90%;
    margin: 20px auto;

    }

    .row {
        display: flex;
        justify-content: space-between; /* Pushes left and right sides */
        padding: 5px 0;
        width: 100%; /* Ensures full width alignment */
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right; /* Pushes text to the far right */
        flex: 1; /* Ensures right-side text stays at the edge */
    }
</style>

<hr>
<div class="container">
            <table id="student" class="data list">
            <thead>
                    <th style="width: 60px;">ID</th>
                    <th>Name</th>
                    <th>Grade Level</th>
                    <th>LRN Number</th>
                    <th style="width: 55px;" class="text-end">Action</th>
                </thead>
                <?php
                // Adjusted SQL query to select students
                $squery = mysqli_query($conn, "
              SELECT s.*, CONCAT(s.first_name, ' ', s.last_name) AS student_name, t.id AS section_student_id,t.section,t.quarter 
              FROM student s 
              INNER JOIN section_student t ON s.id = t.student 
              WHERE t.quarter = '$quarter' AND t.section = '$section' AND t.school_year = '$sy' 
              ORDER BY s.id ASC;
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
                    <td><?php echo $row['lrn_number']; ?></td>
                    <td>
                        <a clash="view" href="grade.php?student_id=<?php echo $row['id']; ?>">
                        View
                        </a>
                        <!-- Add more actions if needed -->
                    </td>
                </tr>
                <?php }?>
            </table>

            
    
    <script>
    new DataTable('#student', { order: [[0, 'desc']] });
    </script>
</div>
</div>


</body>

</html>