<?php 

include "../../db_conn.php";
$first_name = ucwords($_POST['first_name']);
$middle_name = ucwords($_POST['middle_name']);
$last_name = ucwords($_POST['last_name']);
$suffix = ($_POST['suffix']);
$gender = ($_POST['gender']);
$email = ($_POST['email']);
$contact_number = ($_POST['contact_number']);
$username = ($_POST['username']);
$password = ($_POST['password']);



// check if Teacher is already exist
$squery =  mysqli_query($conn, "SELECT * from teacher Where 
first_name = '$first_name' AND
middle_name = '$middle_name' AND 
last_name = '$last_name' AND 
suffix = '$suffix' AND 
del_status != 'deleted'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['first_name'] ." ". $row['last_name']  ;}

if (empty($check)){
     $sql2 = "INSERT INTO `teacher`(
    `first_name`,
    `middle_name`,
    `last_name`,
    `suffix`,
    `gender`,
    `email`,
    `contact_number`,
    `username`,
    `password`,
    `del_status`
    ) VALUES (
        '$first_name',
        '$middle_name',
        '$last_name',
        '$suffix',
        '$gender',
        '$email',
        '$contact_number',
        '$username',
        '$password',
        'active')";
    
    mysqli_query($conn, $sql2);
    header("location:index.php?message=Success! new resident has been saved successfully.");
}
else{
    header("location:add.php?error=Error! resident already exist.");
    }
 ?>