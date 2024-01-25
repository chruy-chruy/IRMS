<?php 

include "../../db_conn.php";
$first_name = ($_POST['first_name']);
$middle_name = ($_POST['middle_name']);
$last_name = ($_POST['last_name']);
$suffix = ($_POST['suffix']);
$gender = ($_POST['gender']);
$date_of_birth = ($_POST['date_of_birth']);
$civil_status = ($_POST['civil_status']);
$street = ($_POST['street']);
$purok = ($_POST['purok']);
$place_of_birth = ($_POST['place_of_birth']);
$phone_number = ($_POST['phone_number']);
$telephone_number = ($_POST['telephone_number']);
$email_address = ($_POST['email_address']);
$nationality = ($_POST['nationality']);
$educational_attainment = ($_POST['educational_attainment']);
$occupation = ($_POST['occupation']);
$religion = ($_POST['religion']);
$blood_type = ($_POST['blood_type']);
$imageValue =  ($_POST['imageValue']);
$id = $_GET['id'];

if($imageValue != 'default.png'){
    $img = $imageValue;
    $image_name = $first_name. "_" . $last_name. "." .date("Y.m.d") .'.jpeg';
    $dir = "../../uploads/".$first_name. "_" . $last_name. "." .date("Y.m.d") .'.jpeg';
    file_put_contents($dir, file_get_contents($img));
    $imageValue =$image_name;
    }

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

header("location:index.php?message=updated");
?>