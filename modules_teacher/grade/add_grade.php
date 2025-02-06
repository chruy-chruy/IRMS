<?php
include "../../db_conn.php";

// Check if the grade, student_id, and section_student_id are sent
if (isset($_POST['student_id'], $_POST['section_student_id'], $_POST['grade'])) {
    $student_id = $_POST['student_id'];
    $section_student_id = $_POST['section_student_id'];
    $grade = $_POST['grade'];

    // Validate the input
    if (!empty($grade)) {
        // Update the grade in the database
        $query = "INSERT INTO grades (student_id, section_student_id, grade) VALUES ('$student_id', '$section_student_id', '$grade') ON DUPLICATE KEY UPDATE grade = '$grade'";

        if (mysqli_query($conn, $query)) {
            echo "Grade added successfully!";
        } else {
            echo "Error: Could not add grade.";
        }
    } else {
        echo "Grade cannot be empty.";
    }
} else {
    echo "Invalid data.";
}
?>
