<?php
include "../../db_conn.php";

// Get the student ID from the URL
$id = $_GET['id'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $birthplace = mysqli_real_escape_string($conn, $_POST['birthplace']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $father_occupation = mysqli_real_escape_string($conn, $_POST['father_occupation']);
    $father_contact = mysqli_real_escape_string($conn, $_POST['father_contact']);
    $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
    $mother_occupation = mysqli_real_escape_string($conn, $_POST['mother_occupation']);
    $mother_contact = mysqli_real_escape_string($conn, $_POST['mother_contact']);
    $guardian_name = mysqli_real_escape_string($conn, $_POST['guardian_name']);
    $guardian_contact = mysqli_real_escape_string($conn, $_POST['guardian_contact']);
    $elementary_name = mysqli_real_escape_string($conn, $_POST['elementary_name']);
    $elementary_address = mysqli_real_escape_string($conn, $_POST['elementary_address']);
    $elementary_year = mysqli_real_escape_string($conn, $_POST['elementary_year']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $grade_level = mysqli_real_escape_string($conn, $_POST['grade_level']);
    
    // Password handling (consider hashing for production)
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Update the student data in the database
    $query = "UPDATE student SET
        first_name = '$first_name',
        middle_name = '$middle_name',
        last_name = '$last_name',
        suffix = '$suffix',
        gender = '$gender',
        age = '$age',
        address = '$address',
        contact_number = '$contact_number',
        birthdate = '$birthdate',
        birthplace = '$birthplace',
        nationality = '$nationality',
        religion = '$religion',
        father_name = '$father_name',
        father_occupation = '$father_occupation',
        father_contact = '$father_contact',
        mother_name = '$mother_name',
        mother_occupation = '$mother_occupation',
        mother_contact = '$mother_contact',
        guardian_name = '$guardian_name',
        guardian_contact = '$guardian_contact',
        elementary_name = '$elementary_name',
        elementary_address = '$elementary_address',
        elementary_year = '$elementary_year',
        email = '$email',
        grade_level = '$grade_level',
        `password` = '$password'
        WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        $message = "Student information updated successfully.";
        header("location:edit.php?id=$id&message=Success! Changes has been saved successfully.");
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
        header("Location: edit.php?id=$id&message=" . urlencode($message));
    }
} else {
    // Redirect if accessed without POST request
    header("Location: ./");
}
?>
