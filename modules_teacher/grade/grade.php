<?php 
$page = 'Grades';
include "../../db_conn.php";

// Get student ID and section ID from URL
$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : 0;
$section_id = isset($_GET['section_id']) ? intval($_GET['section_id']) : 0;
$subject_id = $_GET['subject_id'];
$teacher_id = $_GET['teacher_id'];

// Fetch subject details
$subject_query = $conn->prepare("SELECT * FROM subject WHERE id = ?");
$subject_query->bind_param("i", $subject_id);
$subject_query->execute();
$subject_result = $subject_query->get_result();
$subject = $subject_result->fetch_assoc();


// Fetch student details
$student_query = $conn->prepare("SELECT first_name, last_name, grade_level, lrn_number FROM student WHERE id = ?");
$student_query->bind_param("i", $student_id);
$student_query->execute();
$student_result = $student_query->get_result();
$student = $student_result->fetch_assoc();

// Fetch existing grades
$grades_query = $conn->prepare("SELECT quarter, grade FROM grades WHERE student_id = ? AND section_id = ? AND subject_id = ?");
$grades_query->bind_param("iii", $student_id, $section_id, $subject_id);
$grades_query->execute();
$grades_result = $grades_query->get_result();

$grades = [];
while ($row = $grades_result->fetch_assoc()) {
    $grades[$row['quarter']] = $row['grade'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quarter = intval($_POST['quarter']);
    $grade = isset($_POST['grade']) ? floatval($_POST['grade']) : NULL;
    
    if ($grade !== NULL) {
        $check_query = $conn->prepare("SELECT id FROM grades WHERE student_id = ? AND section_id = ? AND quarter = ? AND subject_id = ?");
        $check_query->bind_param("iiii", $student_id, $section_id, $quarter, $subject_id);
        $check_query->execute();
        $check_result = $check_query->get_result();
        
        if ($check_result->num_rows > 0) {
            $update_query = $conn->prepare("UPDATE grades SET grade = ? WHERE student_id = ? AND section_id = ? AND quarter = ?");
            $update_query->bind_param("diii", $grade, $student_id, $section_id, $quarter);
            $update_query->execute();
        } else {
            $insert_query = $conn->prepare("INSERT INTO grades (student_id, section_id, quarter, grade, subject_id, teacher_id) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_query->bind_param("iiidss", $student_id, $section_id, $quarter, $grade, $subject_id, $teacher_id);
            $insert_query->execute();
        }
    }
    header("Location: grade.php?student_id=$student_id&section_id=$section_id&subject_id=$subject_id&teacher_id=$teacher_id&success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS - Grades</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .content2 {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Darker overlay */
            padding-top: 50px;
            transition: opacity 0.3s ease;
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 40px;
            border-radius: 12px;
            width: 20%;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-30px); /* Initial slide-in effect */
            transition: transform 0.3s ease;
        }

        .modal-content h2 {
            font-size: 24px;
            color: #007BFF;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .modal-content label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        .modal-content input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .modal-content button {
            background-color: #007BFF;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .modal-content button:hover {
            background-color: #0056b3;
        }

        /* Close Button */
        .close {
            font-size: 30px;
            color: #333;
            cursor: pointer;
            transition: color 0.2s ease;
            float: right;
        }

        .close:hover {
            color: #007BFF;
        }

        .modal-content input:focus {
            outline: none;
            border-color: #007BFF;
        }
    </style>
</head>
<body>
    <?php include "../../navbar_teacher.php"; ?>
    <div class="content">
    <a href="section.php?section_id=<?php echo $section_id?>&subject_id=<?php echo $subject_id?>" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
    <div class="content2">
        <h1> Student Grades</h1>
        <div class="student-info">
    <div class="row">
        <span><strong>Subject:</strong> <?php echo htmlspecialchars($subject['code']); ?></span>
        <span><strong>LRN:</strong> <?php echo htmlspecialchars($student['lrn_number']); ?></span>
    </div>
    <div class="row">
        <span><strong>Student Name:</strong> <?php echo htmlspecialchars($student['first_name'] . " " . $student['last_name']); ?></span>
        <span><strong>Grade Level:</strong> <?php echo htmlspecialchars($student['grade_level']); ?></span>
    </div>
</div>

<style>
    .student-info {
        background: #f9f9f9; /* Light gray background */
        padding: 15px;
        border-radius: 8px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .row {
        display: flex;
        justify-content: space-between; /* Aligns left & right elements */
        padding: 5px 0;
        width: 100%; /* Ensures full width alignment */
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right; /* Pushes text to the far right */
        flex: 1; /* Ensures right-side text stays at the edge */
    }
</style>
        <table>
    <thead>
        <tr>
            <th>Quarter</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $total = 0;
            $count = 0;

            for ($q = 1; $q <= 4; $q++): 
                $grade = isset($grades[$q]) ? $grades[$q] : 'N/A';
                
                if (is_numeric($grade)) { // Only add numeric grades
                    $total += $grade;
                    $count++;
                }
        ?>
            <tr>
                <td>Quarter <?php echo $q; ?></td>
                <td><?php echo $grade; ?></td>
                <td><button onclick="openModal(<?php echo $q; ?>)">Add Grade</button></td>
            </tr>
        <?php endfor; ?>
    </tbody>
    <tfoot>
        <tr>
            <td><strong>Average</strong></td>
            <td>
                <strong>
                    <?php 
                        echo ($count > 0) ? round($total / $count, 2) : 'N/A'; 
                    ?>
                </strong>
            </td>
            <td></td>
        </tr>
    </tfoot>
</table>

    </div>

    <div id="gradeModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add Grade for Quarter <span id="quarterLabel">1</span></h2>
            <form method="POST">
                <input type="hidden" id="quarterInput" name="quarter">
                <label>Grade:</label>
                <input style="text-align:center;" id="grade" type="number" name="grade" step="1" min="0" max="99" required>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
    </div>
    <script>document.getElementById('grade').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 2); // Allows only numbers, max 13 digits
});</script>
    <script>
        function openModal(quarter) {
            document.getElementById('gradeModal').style.display = 'block';
            document.getElementById('quarterInput').value = quarter;
            document.getElementById('quarterLabel').textContent = quarter;
        }
        function closeModal() {
            var modal = document.getElementById('gradeModal');
            modal.querySelector('.modal-content').style.transform = 'translateY(-30px)';
            setTimeout(function() {
                modal.style.display = 'none';
            }, 300);
        }
    </script>
</body>
</html>
