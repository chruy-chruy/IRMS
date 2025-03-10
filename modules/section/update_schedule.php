<?php 
include "../../db_conn.php";

// Get parameters from URL
$section = $_GET['section'];
$quarter = $_GET['quarter'];
$day = $_GET['day'];
$time_slot = $_GET['time_slot'];
$subject_id = $_GET['subject']; // Now this stores the ID
$sy = $_GET['sy'];
$grade = $_GET['grade']; // Now this stores the ID
 // Now this stores the ID

// Check if any other section already has the same subject at the same time and day
$sql_check = "SELECT id FROM `scheduler` WHERE section != ? AND quarter = ? AND day = ? AND time_slot = ? AND subject = ? AND school_year = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "sissss", $section, $quarter, $day, $time_slot, $subject_id, $sy);
mysqli_stmt_execute($stmt_check);
$result = mysqli_stmt_get_result($stmt_check);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // If another section already has the same subject for the selected time slot and day, set an error message
    $message = "This subject is already scheduled for another section at this time slot on this day.";
    header("Location: schedule.php?section=$section&quarter=$quarter&sy=$sy&grade=$grade&message=" . urlencode($message));
    exit;
} else {
    // If no conflicting schedule exists, insert or update the schedule
    $sql_insert = "INSERT INTO `scheduler` (section, quarter, day, time_slot, subject, school_year) 
VALUES (?, ?, ?, ?, ?, ?) 
ON DUPLICATE KEY UPDATE 
    subject = VALUES(subject), 
    school_year = VALUES(school_year);
";

    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "sissis", $section, $quarter, $day, $time_slot, $subject_id, $sy);
    mysqli_stmt_execute($stmt_insert);
}

// Redirect to the schedule page
header("Location: schedule.php?section=$section&quarter=$quarter&sy=$sy&grade=$grade");
exit;
?>
