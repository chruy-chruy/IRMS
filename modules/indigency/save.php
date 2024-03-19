<?php
session_start();
$resident_id = $_GET['id'];
$date_issued = $_GET['date_issued'];
// $amount = $_GET['amount'];
$purpose = $_GET['purpose'];
$role = $_SESSION['role'];

include "../../db_conn.php";

     $sql2 = "INSERT INTO `indigency`(
    `resident_id`,
    `purpose`,
    `issued_date`
    ) VALUES (
        '$resident_id',
        '$purpose',
        '$date_issued')";
    
    mysqli_query($conn, $sql2);
    header("location:index.php?message=Success! new certificate has been saved successfully.");

?>