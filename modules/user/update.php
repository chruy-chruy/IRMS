<?php 

include "../../db_conn.php";
$username = ($_POST['username']);
$role = ($_POST['role']);
$password = ($_POST['password']);
$name = ($_POST['name']);
$id = $_GET['id'];

$sql ="UPDATE `user` SET 
`username`='$username',
`name`='$name',
`role`='$role',
`password`='$password'
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:index.php?message=Success! Changes has been saved successfully.");
?>