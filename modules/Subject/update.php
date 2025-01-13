<?php 
include "../../db_conn.php";

// Get the ID from the URL
$id = $_GET['id'];

// Initialize variables
$name = ($_POST['name']);
$code = ($_POST['code']);
$grade_level = $_POST['grade_level'];
$teacher_id = ($_POST['teacher_id']);

// Prepare the SQL update query
$sql = "UPDATE `subject` SET 
`name`='$name',
`code`='$code',
`grade_level`='$grade_level',
`teacher_id`='$teacher_id'
WHERE id = '$id'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    header("location:index.php?message=Success! Changes have been saved successfully.");
} else {
    header("location:edit.php?id=$id&error=Error! Could not update subject.");
}
?>
