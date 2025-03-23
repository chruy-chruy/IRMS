<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Schedule';

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
.scheduler .subject{
    background-color:rgba(108, 215, 230, 0.36);
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    text-align: center;
    border: 1px solid #ddd;
}
.scheduler .select{
    background-color:rgba(161, 179, 182, 0.99);
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    text-align: center;
    border: 1px solid #ddd;
}

.scheduler .subject:hover {
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

.student-info {
    width: 90%;
    margin: 20px auto;
    padding: 15px;
    background-color: #f9f9f9;
    display: flex;
    justify-content: space-between;
}

.student-info .info-left,
.student-info .info-right {
    width: 48%;
}

.student-info p {
    margin: 5px 0;
}

    </style>
<body>
<?php include "../../navbar_student.php"; 
// Fetch student information
$student_info_query = "SELECT s.lrn_number, s.first_name, s.last_name, sec.name 
                       FROM student s 
                       JOIN section_student ss ON s.id = ss.student 
                       JOIN section sec ON ss.section = sec.id 
                       WHERE s.id = ?";

$stmt_info = $conn->prepare($student_info_query);
$stmt_info->bind_param("i", $student_id);
$stmt_info->execute();
$result_info = $stmt_info->get_result();
$student_info = $result_info->fetch_assoc();
?>
<div class="content">
    <div class="header">
        <h1>My <?php echo $page; ?></h1>
    </div>

    <!-- Student Information -->
    <div class="student-info">
    <div class="info-left">
        <p><strong>Student Name:</strong> <?php echo htmlspecialchars($student_info['first_name'] . ' ' . $student_info['last_name']); ?></p>
        <p><strong>Section:</strong> <?php echo htmlspecialchars($student_info['name']); ?></p>
    </div>
    <div class="info-right">
        <p><strong>Student LRN:</strong> <?php echo htmlspecialchars($student_info['lrn_number']); ?></p>
        <p><strong>School Year:</strong> 2025-2026</p>
    </div>
</div>


<div class="scheduler">
    <!-- Table Header -->
    <div class="header1">Time</div>
    <div class="header1">Monday</div>
    <div class="header1">Tuesday</div>
    <div class="header1">Wednesday</div>
    <div class="header1">Thursday</div>
    <div class="header1">Friday</div>

    <!-- Fetch Student Section -->
    <?php 
    $getSectionQuery = mysqli_query($conn, "SELECT a.* FROM `section` a INNER JOIN section_student b WHERE b.section = a.id AND b.student = '$student_id'");
    $getSection = mysqli_fetch_assoc($getSectionQuery);

    if ($getSection) {
        $section = $getSection['id'];
        // Fetch schedule with subject names
        $schedQuery = mysqli_query($conn, "
        SELECT 
    s.day, 
    s.time_slot, 
    sub.name AS subject_name, 
    sec.name AS section_name, 
    CONCAT(t.first_name, ' ', 
           COALESCE(t.middle_name, ''), ' ', 
           t.last_name, ' ', 
           COALESCE(t.extension_name, '')) AS teacher_name
FROM `scheduler` s 
LEFT JOIN `subject` sub ON s.subject = sub.id 
LEFT JOIN `section` sec ON s.section = sec.id  
LEFT JOIN `teacher` t ON sub.teacher_id = t.id  -- Joining teacher table to get teacher's name
WHERE s.section = '$section';
");

// Store schedule in an associative array
$schedule = [];
while ($row = mysqli_fetch_assoc($schedQuery)) {
    $day = strtolower(trim($row['day']));
    $time_slot = strtolower(trim($row['time_slot'])); // Normalize time slot
    $schedule[$day][$time_slot] = $row['subject_name'] . "<br>( " . $row['teacher_name'] . ')';
}

    }
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

    foreach ($time_slots as $time_slot) {
        $normalized_time_slot = strtolower(trim($time_slot)); // Ensure format consistency
    
        // Display time slot
        echo '<div class="time-slot">' . htmlspecialchars($time_slot) . '</div>';
    
        // Display subjects for each day
        foreach ($days as $day) {
            $subject_name = isset($schedule[$day][$normalized_time_slot]) ? $schedule[$day][$normalized_time_slot] : "TBA";
            echo '<div class="subject">' . nl2br(htmlspecialchars_decode($subject_name)) . '</div>';
        }           
    }
    
    ?>
</div>

<br>
<!-- <img class="img" src="../../assets/img/school.jpg" alt="School" width="90%" height="600px"> -->
</div>
</div>
</body>

</html>