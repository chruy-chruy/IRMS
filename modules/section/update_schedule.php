<?php 
include "../../db_conn.php";

// Get parameters from URL
$section = $_GET['section'];
$quarter = $_GET['quarter'];
$day = $_GET['day'];
$time_slot = $_GET['time_slot'];
$subject_id = $_GET['subject']; // Now this stores the ID

// Check if any other section already has the same subject at the same time and day
$sql_check = "SELECT id FROM `scheduler` WHERE section != ? AND quarter = ? AND day = ? AND time_slot = ? AND subject = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "sisss", $section, $quarter, $day, $time_slot, $subject_id);
mysqli_stmt_execute($stmt_check);
$result = mysqli_stmt_get_result($stmt_check);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // If another section already has the same subject for the selected time slot and day, set an error message
    $message = "This subject is already scheduled for another section at this time slot on this day.";
    header("Location: schedule.php?section=$section&quarter=$quarter&message=" . urlencode($message));
    exit;
} else {
    // If no conflicting schedule exists, insert the new schedule entry with subject ID
    $sql_insert = "INSERT INTO `scheduler` (section, quarter, day, time_slot, subject) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "sisss", $section, $quarter, $day, $time_slot, $subject_id);
    mysqli_stmt_execute($stmt_insert);
}

// Redirect to the schedule page
header("Location: schedule.php?section=$section&quarter=$quarter");
exit;
?>
