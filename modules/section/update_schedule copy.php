<?php 
include "../../db_conn.php";

// Get the ID from the URL
$section = $_GET['section'];
$quarter = $_GET['quarter'];
$sched = $_GET['sched'];
$subject = $_GET['subject'];


// Initialize variables
$squery = mysqli_query($conn, "SELECT * FROM schedule WHERE section = '$section' AND quarter = '$quarter'");
$check = mysqli_fetch_array($squery);

if (empty($check)) {
    // If not exists, insert the new subject into the database
    $sql2 = "INSERT INTO `schedule` (
        `section`,
        `quarter`,
        `$sched`
    ) VALUES (
        '$section',
        '$quarter',
        '$subject'
    )";

    mysqli_query($conn, $sql2); 
    // Redirect with success message
    header("Location: schedule.php?section=$section&quarter=$quarter");
} else {
$id = $check['id'];
$sql = "UPDATE `schedule` SET 
`$sched`='$subject'
WHERE id = '$id'";
    mysqli_query($conn, $sql); 
    // If it exists, redirect with error message
    header("Location: schedule.php?section=$section&quarter=$quarter");
}


?>
