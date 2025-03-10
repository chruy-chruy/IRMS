<?php 
include "../../db_conn.php";

// Get the ID from the URL
$subject_id = $_GET['id'];
$quarter = $_GET['quarter'];
$section = $_GET['section'];
$teacher = $_GET['teacher'];
$sy = $_GET['sy'];
$grade = $_GET['grade'];
// Initialize variables
$squery = mysqli_query($conn, "SELECT * FROM section_subject WHERE subject = '$subject_id' AND quarter = '$quarter' AND section = '$section'");
$check = mysqli_fetch_array($squery);

if (empty($check)) {
    // If not exists, insert the new subject into the database
    $sql2 = "INSERT INTO `section_subject` (
        `subject`,
        `section`,
        `teacher`,
        `school_year`,
        `quarter`
    ) VALUES (
        '$subject_id',
        '$section',
        '$teacher',
        '$sy',
        '$quarter'
    )";

    mysqli_query($conn, $sql2);
    
    // Redirect with success message
    header("Location: schedule.php?message=Success! New subject has been saved successfully.&section=$section&quarter=$quarter&sy=$sy&grade=$grade");
} else {
    // If it exists, redirect with error message
    header("Location: schedule.php?message=Error! Student already exists.&section=$section&quarter=$quarter&sy=$sy&grade=$grade");
}


?>
