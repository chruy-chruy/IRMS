<?php 

include "../../db_conn.php";
$username = ucwords($_POST['username']);
$password = ($_POST['password']);
$role = ($_POST['role']);

// check if resident is already exist
$squery =  mysqli_query($conn, "SELECT * from user Where 
username = '$username' AND 
role = '$role'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['username'] ." ". $row['role']  ;}

if (empty($check)){
     $sql2 = "INSERT INTO `user`(
    `username`,
    `password`,
    `role`
    ) VALUES (
        '$username',
        '$password',
        '$role')";
    
    mysqli_query($conn, $sql2);
    header("location:index.php?message=Success! new user has been saved successfully.");
}
else{
    header("location:add.php?error=Error! user already exist.");
    }
 ?>