
<?php 

include "../../db_conn.php";
$id = $_GET['id'];

$sql ="UPDATE `student` SET 
`del_status`='deleted'
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:index.php?message=deleted!");
?>