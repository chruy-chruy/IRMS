<?php 

include "../../db_conn.php";

$id = $_GET['id'];
$section = $_GET['section'];
$subject = $_GET['subject'];
$sql ="DELETE FROM `section_subject`
WHERE id = '$id'";

mysqli_query($conn, $sql);

$sql2 ="DELETE FROM `scheduler`
WHERE subject = '$subject' AND section = '$section'";

mysqli_query($conn, $sql2);

header("Location: " . $_SERVER['HTTP_REFERER']);
?>