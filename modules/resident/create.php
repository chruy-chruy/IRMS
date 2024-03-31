<?php 

include "../../db_conn.php";
$first_name = ucwords($_POST['first_name']);
$middle_name = ucwords($_POST['middle_name']);
$last_name = ucwords($_POST['last_name']);
$suffix = ($_POST['suffix']);
$gender = ucwords($_POST['gender']);
$date_of_birth = ($_POST['date_of_birth']);
$civil_status = ucwords($_POST['civil_status']);
$purok = ucwords($_POST['purok']);
$place_of_birth = ucwords($_POST['place_of_birth']);
$phone_number = ($_POST['phone_number']);
$email_address = ($_POST['email_address']);
$nationality = ucwords($_POST['nationality']);
$educational_attainment = ucwords($_POST['educational_attainment']);
$occupation = ucwords($_POST['occupation']);
$religion = ucwords($_POST['religion']);
$del_status = "active";
$imageValue =  ($_POST['imageValue']);

if(str_ends_with($imageValue, 'jpeg') || str_ends_with($imageValue, 'png' )){}
    else{    $img = $imageValue;
        $image_name = $first_name. "_" . $last_name. "." .date("Y.m.d") .'.jpeg';
        $dir = "../../uploads/".$first_name. "_" . $last_name. "." .date("Y.m.d") .'.jpeg';
        file_put_contents($dir, file_get_contents($img));
        $imageValue =$image_name;}

// check if resident is already exist
$squery =  mysqli_query($conn, "SELECT * from resident Where 
first_name = '$first_name' AND
middle_name = '$middle_name' AND 
last_name = '$last_name' AND 
suffix = '$suffix' AND 
del_status != 'deleted'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['first_name'] ." ". $row['last_name']  ;}

if (empty($check)){
     $sql2 = "INSERT INTO `resident`(
    `first_name`,
    `middle_name`,
    `last_name`,
    `suffix`,
    `gender`,
    `date_of_birth`,
    `civil_status`,
    `purok`,
    `place_of_birth`,
    `phone_number`,
    `email_address`,
    `nationality`,
    `educational_attainment`,
    `occupation`,
    `religion`,
    `image`,
    `del_status`
    ) VALUES (
        '$first_name',
        '$middle_name',
        '$last_name',
        '$suffix',
        '$gender',
        '$date_of_birth',
        '$civil_status',
        '$purok',
        '$place_of_birth',
        '$phone_number',
        '$email_address',
        '$nationality',
        '$educational_attainment',
        '$occupation',
        '$religion',
        '$imageValue',
        '$del_status')";
    
    mysqli_query($conn, $sql2);
    header("location:index.php?message=Success! new resident has been saved successfully.");
}
else{
    header("location:add.php?error=Error! resident already exist.");
    }
 ?>