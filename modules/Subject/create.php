<?php 

include "../../db_conn.php";

// Get and sanitize the input values
$subject_name = ucwords(trim($_POST['name']));
$subject_code = $_POST['code'];
$teacher_id = $_POST['teacher_id'];

// Check if the subject already exists
$squery = mysqli_query($conn, "SELECT * FROM subject WHERE 
name = '$subject_name' AND 
code = '$subject_code' AND 
del_status != 'deleted'");

$check = mysqli_fetch_array($squery);

if (empty($check)) {
    // If not exists, insert the new subject into the database
    $sql2 = "INSERT INTO `subject` (
        `name`,
        `code`,
        `teacher_id`,
        `del_status`
    ) VALUES (
        '$subject_name',
        '$subject_code',
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
