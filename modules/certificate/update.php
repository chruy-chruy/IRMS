<?php
session_start();
$id = $_GET['id'];
$resident_id = $_GET['resident_id'];
$date_issued = $_GET['date_issued'];
$amount = $_GET['amount'];
$purpose = $_GET['purpose'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];
$user_id = $username." ".$role;




include "../../db_conn.php";

$sql ="UPDATE `certificate` SET 
`resident_id`='$resident_id',
`issued_date`='$date_issued',
`amount`='$amount',
`purpose`='$purpose',
`user_id`='$user_id'
WHERE id = $id";

 mysqli_query($conn, $sql);
    header("location:index.php?message=Success! Changes has been saved successfully.");

?>