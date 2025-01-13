<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Section';

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
<a href="./grade.php?grade=<?php echo $grade?>" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
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


<div class="header">
                <h1>Schedule</h1>
</div>
<div class="scheduler">
        <!-- header1 -->
        <div class="header1">Time</div>
        <div class="header1">Monday</div>
        <div class="header1">Tuesday</div>
        <div class="header1">Wednesday</div>
        <div class="header1">Thursday</div>
        <div class="header1">Friday</div>

<!-- Time Slots and Subjects -->
<?php 

// Fetch all subjects for the dropdown
$subjectsQuery = mysqli_query($conn, "SELECT a.* FROM `section_subject` b INNER JOIN subject a WHERE b.subject = a.id; ");
// $subject = mysqli_fetch_assoc($subjectsQuery);
$options = [];
while ($subject = mysqli_fetch_array($subjectsQuery)) { 
    // Append each subject's id and name to the array
    $options[] = [
        'id' => $subject['id'],
        'name' => $subject['name']
    ];
}
$schedQuery = mysqli_query($conn, "SELECT * FROM `schedule` WHERE section = '$section' AND quarter = '$quarter'");
$sched = mysqli_fetch_assoc($schedQuery);

?>
<?php
$time_slots = [
    "7:30am - 8:30am",
    "8:31am - 9:30am",
    "Morning Break (9:31am - 10:00am)", // Morning Break
    "10:01am - 11:00am",
    "11:01am - 12:00pm",
    "Lunch Break (12:01pm - 1:00pm)", // Lunch Break
    "1:00pm - 2:00pm",
    "2:01pm - 3:00pm",
    "3:01pm - 4:00pm",
    "4:01pm - 5:00pm"
];
$days = ["monday", "tuesday", "wednesday", "thursday", "friday"];

$academic_counter = 0; // Counter for academic slots only

foreach ($time_slots as $index => $time_slot) {
    // Check if the current slot is for Lunch or Break
    if (strpos($time_slot, "Lunch") !== false) {
        echo '<div class="time-slot non-selectable">' . htmlspecialchars($time_slot) . '</div>';
        foreach ($days as $day) {
            echo '<div class="lunch">Lunch</div>';
        }
        continue; // Skip generating a <select> for this slot
    }

    if (strpos($time_slot, "Break") !== false && strpos($time_slot, "Lunch") === false) {
        echo '<div class="time-slot non-selectable">' . htmlspecialchars($time_slot) . '</div>';
        foreach ($days as $day) {
            echo '<div class="break">Break</div>';
        }
        continue; // Skip generating a <select> for this slot
    }

    $academic_counter++; // Increment the counter for academic slots only

    echo '<div class="time-slot" >' . htmlspecialchars($time_slot) . '</div>';

    foreach ($days as $day) {
        $slot_name = strtolower(ordinal_suffix($academic_counter)) . "_" . $day; // Generate names like '1st_monday'
        ?> <?php if (!empty($sched[$slot_name])): ?>
        <select name="<?= htmlspecialchars($slot_name) ?>" id="<?= htmlspecialchars($slot_name) ?>" class="subject" onchange="updateSched('<?= htmlspecialchars($slot_name) ?>')">
                <option hidden value="<?= htmlspecialchars($sched[$slot_name]) ?>">
                    <?= htmlspecialchars($sched[$slot_name]) ?>
                </option>
          

            <?php foreach ($options as $option): ?>
                <option value="./update_schedule.php?section=<?= htmlspecialchars($section) ?>&quarter=<?= htmlspecialchars($quarter) ?>&sched=<?= htmlspecialchars($slot_name) ?>&subject=<?= htmlspecialchars($option['name']) ?>">
                    <?= htmlspecialchars($option['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php else: ?>
            <select name="<?= htmlspecialchars($slot_name) ?>" id="<?= htmlspecialchars($slot_name) ?>" class="select" onchange="updateSched('<?= htmlspecialchars($slot_name) ?>')">
            <option selected hidden value="" class="select">Select Subject</option>
          

            <?php foreach ($options as $option): ?>
                <option value="./update_schedule.php?section=<?= htmlspecialchars($section) ?>&quarter=<?= htmlspecialchars($quarter) ?>&sched=<?= htmlspecialchars($slot_name) ?>&subject=<?= htmlspecialchars($option['name']) ?>">
                    <?= htmlspecialchars($option['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
        <?php
    }
}
?>
    

<?php
function ordinal_suffix($num) {
    if (!in_array(($num % 100), [11, 12, 13])) {
        switch ($num % 10) {
            case 1: return $num . 'st';
            case 2: return $num . 'nd';
            case 3: return $num . 'rd';
        }
    }
    return $num . 'th';
}
?>

</div>

<script>
        function updateSched(id) {
            const select = document.getElementById(id);
            const url = select.value;

            if (url) {
                window.location.href = url; // Redirect to the selected link
            }
        }
</script>
<!-- end of schedule -->


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
                    <th>LRN Number</th>
                    <th>Action</th>
                </thead>
                <?php
                // Adjusted SQL query to select students
                $squery = mysqli_query($conn, "
              SELECT s.*, CONCAT(s.first_name, ' ', s.last_name) AS student_name, t.id AS section_student_id,t.section,t.quarter FROM student s INNER JOIN section_student t ON s.id = t.student WHERE t.quarter = '$quarter' AND t.section = '$section' ORDER BY s.id ASC;
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
                        <a style=" padding: 10px;
  margin-right: 20px;
  border: 1px solid #cccccc;
  background-color: #a03838;
  border-radius: 5px;
  font-size: 15px;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  color: #ffffff;
  cursor: pointer;
  text-decoration: none;" href="remove_student.php?id=<?php echo $row['section_student_id']; ?>">
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
                 SELECT s.*, t.id AS section_subject_id, t.section, t.quarter, CONCAT(te.first_name, ' ', te.last_name) AS teacher_name FROM subject s INNER JOIN section_subject t ON s.id = t.subject INNER JOIN teacher te ON s.teacher_id = te.id WHERE t.quarter = '$quarter' AND t.section = '$section' ORDER BY s.id ASC;
                ");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr class="table-row">
                <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['code'] ?></td>
                    <td><?php echo $row['teacher_name'] ?></td>
                    <td>
                        <a style=" padding: 10px;
  margin-right: 20px;
  border: 1px solid #cccccc;
  background-color: #a03838;
  border-radius: 5px;
  font-size: 15px;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  color: #ffffff;
  cursor: pointer;
  text-decoration: none;" href="remove_subject.php?id=<?php echo $row['section_subject_id']; ?>">
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