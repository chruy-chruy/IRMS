<?php 

include "../../db_conn.php";
$username = ($_POST['username']);
$role = ($_POST['role']);
$password = ($_POST['password']);
$id = $_GET['id'];

if(str_ends_with($imageValue, 'jpeg') || str_ends_with($imageValue, 'png' )){}
    else{    $img = $imageValue;
        $image_name = $first_name. "_" . $last_name. "." .date("Y.m.d") .'.jpeg';
        $dir = "../../uploads/".$first_name. "_" . $last_name. "." .date("Y.m.d") .'.jpeg';
        file_put_contents($dir, file_get_contents($img));
        $imageValue =$image_name;}

$sql ="UPDATE `resident` SET 
`first_name`='$first_name',
`middle_name`='$middle_name',
`last_name`='$last_name',
`suffix`='$suffix',
`gender`='$gender',
`date_of_birth`='$date_of_birth',
`civil_status`='$civil_status',
`street`='$street',
`purok`='$purok',
`place_of_birth`='$place_of_birth',
`phone_number`='$phone_number',
`telephone_number`='$telephone_number',
`email_address`='$email_address',
`nationality`='$nationality',
`educational_attainment`='$educational_attainment',
`occupation`='$occupation',
`religion`='$religion',
`blood_type`='$blood_type',
`image`='$imageValue'
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:index.php?message=Success! Changes has been saved successfully.");
?>