<?php 

include "../../db_conn.php";

// Get and sanitize the input values
$section_name = ucwords(trim($_POST['name']));
$grade_level = strtoupper(trim($_POST['grade_level']));
$teacher_id = $_POST['teacher_id'];

// Check if the subject already exists
$squery = mysqli_query($conn, "SELECT * FROM section WHERE 
`name` = '$subject_name' AND 
teacher_id = '$teacher_id' AND 
del_status != 'deleted'");

$check = mysqli_fetch_array($squery);

if (empty($check)) {
    // If not exists, insert the new subject into the database
    $sql2 = "INSERT INTO `section` (
        `name`,
        `grade_level`,
        `teacher_id`,
        `del_status`
    ) VALUES (
        '$section_name',
        '$grade_level',
        '$teacher_id',
        'active'
    )";

    mysqli_query($conn, $sql2);
    
    // Redirect with success message
    header("Location: index.php?message=Success! New subject has been saved successfully.");
} else {
    // If it exists, redirect with error message
    header("Location: add.php?error=Error! Subject already exists.");
}
?>
