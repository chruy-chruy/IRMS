<?php 
$page = 'Grade';
include "../../db_conn.php";


$student_id = $_GET['student_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>IRMS-<?php echo $page; ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        .grades-table {
            width: 80%;
            border-collapse: collapse;
            text-align: center;
            margin: 20px auto;
        }
        .grades-table th, .grades-table td {
            border: 1px solid black;
            padding: 8px;
        }
        .grades-table th {
            background-color: #f2f2f2;
        }
        .student-info {
    width: 62%;
    margin: 20px auto;
    padding: 15px;
    border: 1px solid black;
    background-color: #f9f9f9;
    display: flex;
    justify-content: space-between;
}

.student-info .info-left,
.student-info .info-right {
    width: 48%;
}

.student-info p {
    margin: 5px 0;
}


    </style>
</head>
<body>
<?php include "../../navbar.php"; 
// Fetch student information
$student_info_query = "SELECT s.lrn_number, s.first_name, s.last_name, sec.name 
                       FROM student s 
                       JOIN section_student ss ON s.id = ss.student 
                       JOIN section sec ON ss.section = sec.id 
                       WHERE s.id = ?";

$stmt_info = $conn->prepare($student_info_query);
$stmt_info->bind_param("i", $student_id);
$stmt_info->execute();
$result_info = $stmt_info->get_result();
$student_info = $result_info->fetch_assoc();

// Fetch grades
$query = "SELECT ss.subject, sub.code, g.quarter, g.grade, g.remarks 
          FROM section_subject ss
          JOIN subject sub ON ss.subject = sub.id
          LEFT JOIN grades g ON ss.subject = g.subject_id AND g.student_id = ?
          WHERE ss.section = (SELECT section FROM section_student WHERE student = ?) 
          ORDER BY sub.code, g.quarter ASC";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $student_id, $student_id);
$stmt->execute();
$result = $stmt->get_result();

$grades = [];
while ($row = $result->fetch_assoc()) {
    $grades[$row['code']][$row['quarter']] = $row;
}?>

<div class="content">
    <div class="header">
        <h1><?php echo $page; ?></h1>
    </div>
    <a href="javascript:history.back()" class="back">
    <i class="fa fa-arrow-circle-o-left fa-2x"></i>
</a>
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2></h2>
    <a href="print_grade.php?student_id=<?php echo $student_id; ?>" target="_blank"
       style="text-decoration: none; background: none; border: none; cursor: pointer; color:green;">
        <i class="fa fa-print fa-2x"></i>
    </a>
</div>

    <!-- Student Information -->
    <div class="student-info">
    <div class="info-left">
        <p><strong>Student Name:</strong> <?php echo htmlspecialchars($student_info['first_name'] . ' ' . $student_info['last_name']); ?></p>
        <p><strong>Section:</strong> <?php echo htmlspecialchars($student_info['name']); ?></p>
    </div>
    <div class="info-right">
        <p><strong>Student LRN:</strong> <?php echo htmlspecialchars($student_info['lrn_number']); ?></p>
        <p><strong>School Year:</strong> 2025-2026</p>
    </div>
</div>


    <!-- Grades Table -->
    <div class="grades-table">
        
    <table class="grades-table">
    <thead>
        <tr>
            <th rowspan="2">Learning Areas</th>
            <th colspan="4">Quarter</th>
            <th rowspan="2">Final Grade</th>
            <th rowspan="2">Remarks</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total_final_grade = 0;
        $subject_count = 0;
        
        foreach ($grades as $subject => $quarters) { ?>
        <tr>
            <td><?php echo htmlspecialchars($subject); ?></td>
            <?php 
            $final_grade = 0;

            for ($q = 1; $q <= 4; $q++) {
                $grade = isset($quarters[$q]['grade']) ? $quarters[$q]['grade'] : 0; // Default to 0 if no grade
                echo "<td>" . htmlspecialchars($grade) . "</td>";
                $final_grade += $grade;
            }

            // Compute final grade (average of 4 quarters)
            $final_grade = round($final_grade / 4);
            $total_final_grade += $final_grade;
            $subject_count++;

            // Determine Pass/Fail
            $remarks = ($final_grade >= 75) ? "Passed" : "Failed";
            $color =  ($final_grade >= 75) ? "" : "red";
            ?>
            
            <td  style="color:<?php echo $color;?>"><?php echo $final_grade; ?></td>
            <td style="color:<?php echo $color;?>"><?php echo $remarks; ?></td>
        </tr>
        <?php } ?>

        <!-- General Average Row -->
        <?php 
        $general_average = ($subject_count > 0) ? round($total_final_grade / $subject_count) : 0;
        $color =  ($general_average >= 75) ? "" : "red";
        ?>
        <tr>
            <td colspan="5" style="text-align: right; font-weight: bold;">General Average:</td>
            <td style="font-weight: bold; color:<?php echo $color;?>"><?php echo $general_average; ?></td>
            <td style="font-weight: bold; color:<?php echo ($general_average >= 75) ? "" : "red"; ?> "><?php echo ($general_average >= 75) ? "Passed" : "Failed"; ?></td>
        </tr>
    </tbody>
</table>

    </div>
</div>
</body>
</html>

<?php
$stmt->close();
$stmt_info->close();
$conn->close();
?>
