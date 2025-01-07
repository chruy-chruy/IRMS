<?php 

include "../../db_conn.php";
$id = $_GET['id'];

$sql ="DELETE FROM `section_student`
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("Location: " . $_SERVER['HTTP_REFERER']);
?>