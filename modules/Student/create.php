<?php 

include "../../db_conn.php";

// Sanitize and retrieve form data
$first_name = ucwords(trim($_POST['first_name']));
$middle_name = ucwords(trim($_POST['middle_name']));
$last_name = ucwords(trim($_POST['last_name']));
$gender = trim($_POST['gender']);
$age = intval(trim($_POST['age']));
$address = trim($_POST['address']);
$contact_number = trim($_POST['contact_number']);
$birthdate = trim($_POST['birthdate']);
$birthplace = trim($_POST['birthplace']);
$nationality = trim($_POST['nationality']);
$religion = trim($_POST['religion']);
$father_name = trim($_POST['father_name']);
$father_occupation = trim($_POST['father_occupation']);
$father_contact = trim($_POST['father_contact']);
$mother_name = trim($_POST['mother_name']);
$mother_occupation = trim($_POST['mother_occupation']);
$mother_contact = trim($_POST['mother_contact']);
$guardian_name = trim($_POST['guardian_name']);
$guardian_contact = trim($_POST['guardian_contact']);
$elementary_name = trim($_POST['elementary_name']);
$elementary_address = trim($_POST['elementary_address']);
$elementary_year = trim($_POST['elementary_year']);
$email = trim($_POST['email']);
$grade_level = trim($_POST['grade_level']);
$lrn_number = trim($_POST['lrn_number']);
$section = trim($_POST['section']);
$grade7_section = trim($_POST['grade7_section']);
$grade8_section = trim($_POST['grade8_section']);
$grade9_section = trim($_POST['grade9_section']);
$grade10_section = trim($_POST['grade10_section']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Check if the student already exists
$squery =  mysqli_query($conn, "SELECT * FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND del_status != 'deleted'");
$check = mysqli_num_rows($squery) > 0;

if (!$check) {
    // Insert the new student record
    $sql2 = "INSERT INTO `student` (
        `first_name`, `middle_name`, `last_name`, `gender`, `age`, `address`, `contact_number`, 
        `birthdate`, `birthplace`, `nationality`, `religion`, 
        `father_name`, `father_occupation`, `father_contact`, 
        `mother_name`, `mother_occupation`, `mother_contact`, 
        `guardian_name`, `guardian_contact`, 
        `elementary_name`, `elementary_address`, `elementary_year`, 
        `email`, `grade_level`, `lrn_number`, `section`, 
        `grade7_section`, `grade8_section`, `grade9_section`, `grade10_section`, 
        `username`, `password`, `del_status`
    ) VALUES (
        '$first_name', '$middle_name', '$last_name', '$gender', '$age', '$address', '$contact_number', 
        '$birthdate', '$birthplace', '$nationality', '$religion', 
        '$father_name', '$father_occupation', '$father_contact', 
        '$mother_name', '$mother_occupation', '$mother_contact', 
        '$guardian_name', '$guardian_contact', 
        '$elementary_name', '$elementary_address', '$elementary_year', 
        '$email', '$grade_level', '$lrn_number', '$section', 
        '$grade7_section', '$grade8_section', '$grade9_section', '$grade10_section', 
        '$username', '$password', 'active'
    )";

    if (mysqli_query($conn, $sql2)) {
        header("Location: index.php?message=Success! New student has been saved successfully.");
    } else {
        header("Location: add.php?error=Error! Failed to save student. Please try again.");
    }
} else {
    header("Location: add.php?error=Error! Student already exists.");
}
?>
