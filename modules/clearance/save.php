<?php
session_start();
$resident_id = $_GET['id'];
$date_issued = $_GET['date_issued'];
// $amount = $_GET['amount'];
$purpose = $_GET['purpose'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];
$user_id = $username." ".$role;

include "../../db_conn.php";

     $sql2 = "INSERT INTO `clearance`(
    `resident_id`,
    `purpose`,
    `issued_date`,
    `user_id`
    ) VALUES (
        '$resident_id',
        '$purpose',
        '$date_issued',
        '$user_id')";
    
    mysqli_query($conn, $sql2);
    header("location:index.php?message=Success! new user has been saved successfully.");

?>