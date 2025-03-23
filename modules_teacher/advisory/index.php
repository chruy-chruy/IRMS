<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Advisory';

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
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
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
    width: 100%;
    /* max-width: 600px; */
    margin: 20px auto;
    padding: 15px;
    background-color: #f9f9f9;
    display: flex; 
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    text-align: center;  
    
}


.student-info .info-left,
.student-info .info-right {
    width: 48%;
}

.student-info p {
    margin: 5px 0;
}

.student-table {
    width: 90%;
    margin: 20px auto;
    text-align: center;
    background: white;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.student-table h2 {
    margin-bottom: 10px;
    color: black;
}

.student-table table {
    width: 100%;
    border-collapse: collapse;
}

.student-table th, .student-table td {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 14px;
}

.student-table th {
    background-color: black;
    color: white;
    font-weight: bold;
}

.student-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.view {
    display: inline-block;
    background-color: #007BFF;
    color: white;
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s ease;
}

.view:hover {
    background-color: #0056b3;
}
    </style>
<body>
<?php include "../../navbar_teacher.php";

// Fetch student information
$student_info_query = "SELECT * FROM `section` WHERE teacher_id = ?;";

$stmt_info = $conn->prepare($student_info_query);
$stmt_info->bind_param("i", $teacher_id);
$stmt_info->execute();
$result_info = $stmt_info->get_result();
$student_info = $result_info->fetch_assoc();

?>
<div class="content">
<div class="header">
                <h1>My <?php if ($page) {echo $page;} ?></h1>
                 <!-- Student Information -->

</div>
<div class="student-info">
    <div class="info-left">
        <p><strong>Adviser Name:</strong> <?php echo $name ?></p>
        <p><strong>Section:</strong> <?php echo htmlspecialchars($student_info['name']); ?></p>
    </div>
    <div class="info-right">
        <p><strong>Grade Level:</strong> <?php echo htmlspecialchars($student_info['grade_level']); ?></p>
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
    $getSectionQuery = mysqli_query($conn, "SELECT * FROM `section` WHERE teacher_id = '$teacher_id';");
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
<!-- Student List Table -->
<div class="student-table">
    <h2>Student List</h2>
    <table>
        <thead>
            <tr>
                <th>Student LRN</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $section = $getSection['id'];
        $sy = $getSection['school_year'];
                
                // Adjusted SQL query to select students
                $squery = mysqli_query($conn, "
           SELECT s.*, CONCAT(s.first_name, ' ', s.last_name) AS student_name, t.id AS section_student_id,t.section,t.quarter 
              FROM student s 
              INNER JOIN section_student t ON s.id = t.student
			  WHERE t.section = '$section' AND t.school_year = '$sy'
              ORDER BY s.id ASC
            ");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr>
                    <td><?php echo $row['lrn_number']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>                    <td>
                        <a class="view" href="student_grade.php?student_id=<?php echo $row['id'] ?>">
                        View
                        </a>
                        <!-- <a href=""><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> -->
                    </td>

                   
                </tr>
                <?php }?>
        </tbody>
    </table>
</div>


</div>

</body>

</html>