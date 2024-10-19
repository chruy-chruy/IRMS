<?php 

include "../../db_conn.php";
$id = $_GET['id'];

$sql ="DELETE FROM `section`
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:index.php?message=deleted");
?>