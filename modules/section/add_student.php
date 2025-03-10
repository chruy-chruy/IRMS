<?php 
include "../../db_conn.php";

// Get the ID from the URL
$student_id = $_GET['id'];
$quarter = $_GET['quarter'];
$section = $_GET['section'];
$sy = $_GET['sy'];
$grade = $_GET['grade'];

// Initialize variables
$squery = mysqli_query($conn, "SELECT * FROM section_student WHERE student = '$student_id'");
$check = mysqli_fetch_array($squery);

if (empty($check)) {
    // If not exists, insert the new subject into the database
    $sql2 = "INSERT INTO `section_student` (
        `student`,
        `section`,
        `school_year`,
        `quarter`
    ) VALUES (
        '$student_id',
        '$section',
        '$sy',
        '$quarter'
    )";

    mysqli_query($conn, $sql2);
    
    // Redirect with success message
    header("Location: schedule.php?message=Success! New subject has been saved successfully.&section=$section&quarter=$quarter&sy=$sy&grade=$grade");
} else {
    // If it exists, redirect with error message
    header("Location: schedule.php?message=Error! Student already have a section.&section=$section&quarter=$quarter&sy=$section&grade=$grade");
}

?>
