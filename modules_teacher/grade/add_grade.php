<?php
include "../../db_conn.php";

// Check if all required fields are set
if (isset($_POST['student_id'], $_POST['section_student_id'], $_POST['grade'])) {
    $student_id = $_POST['student_id'];
    $section_student_id = $_POST['section_student_id'];
    $grade = $_POST['grade'];

    // Validate the input
    if (!empty($grade) && is_numeric($grade)) {
        $grade = floatval($grade);
        $remarks = ($grade >= 75) ? "Pass" : "Fail"; // Determine Pass/Fail

        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO grades (student_id, section_student_id, grade, remarks) 
                  VALUES (?, ?, ?, ?) 
                  ON DUPLICATE KEY UPDATE grade = VALUES(grade), remarks = VALUES(remarks)";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("iids", $student_id, $section_student_id, $grade, $remarks);
            if ($stmt->execute()) {
                echo "Grade added successfully!";
            } else {
                echo "Error: Could not add grade.";
            }
            $stmt->close();
        } else {
            echo "Error: Failed to prepare statement.";
        }
    } else {
        echo "Grade must be a valid number.";
    }
} else {
    echo "Invalid data.";
}

$conn->close();
?>
