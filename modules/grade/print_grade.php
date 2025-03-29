<?php 
$page = 'Grade';
include "../../db_conn.php";


$student_id = $_GET['student_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            /* margin: 10px; */
        }
        h2{

        }
        table {
            border-collapse: collapse;
            width: 46%;
            margin: 10px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
        .full-width {
            width: 100%;
        }
        @media print {
            @page {
        size: legal landscape;
        margin: 10mm;
    }
    .container, h2{
            /* margin : 10px; */
            }
            /* body {
                width: 100vh;
                height: 100vw;
                overflow: hidden;
                position: absolute;
                top: 100%;
                left: 0;
            } */
          
            
        }
    </style>
</head>
<body> 
<?php 

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
    <div class="container">
    
    <h3>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h3>
    <h3>REPORT ON LEARNER'S OBSERVED AND VALUES</h3>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Learning Areas</th>
                <th>Quarter 1</th>
                <th>Quarter 2</th>
                <th>Quarter 3</th>
                <th>Quarter 4</th>
                <th>Final Grade</th>
                <th>Remarks</th>
            </tr>
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
            
            <td style="color:<?php echo $color;?>"><?php echo $final_grade; ?></td>
            <td style="color:<?php echo $color;?>"><?php echo $remarks; ?></td>
        </tr>
        <?php } ?>
        <?php 
        $general_average = ($subject_count > 0) ? round($total_final_grade / $subject_count) : 0;
        $color =  ($general_average >= 75) ? "" : "red";
        ?>
            <tr>
            <td colspan="5" style="text-align: right; font-weight: bold;">General Average:</td>
            <td style="font-weight: bold; color:<?php echo $color;?>"><?php echo $general_average; ?></td>
            <td style="font-weight: bold; color:<?php echo $color;?>"><?php echo ($general_average >= 75) ? "Passed" : "Failed"; ?></td>
        </tr>
        </table>
        
        <table>
            <tr>
                <th>Core Values</th>
                <th>Behavior Statements</th>
                <th>Quarter 1</th>
                <th>Quarter 2</th>
                <th>Quarter 3</th>
                <th>Quarter 4</th>
            </tr>
            <tr><td>Maka-Diyos</td><td>Expresses spiritual beliefs, upholds truth</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Makatao</td><td>Shows sensitivity to differences</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Makakalikasan</td><td>Uses resources wisely</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Makabansa</td><td>Exercises rights responsibly</td><td></td><td></td><td></td><td></td></tr>
        </table>
    </div>
    <div class="container">
    <table>
        <tr>
            <th>Descriptors</th>
            <th>Grading Scale</th>
            <th>Remarks</th>
        </tr>
        <tr><td>Outstanding</td><td>90 - 100</td><td>Passed</td></tr>
        <tr><td>Very Satisfactory</td><td>85 - 89</td><td>Passed</td></tr>
        <tr><td>Satisfactory</td><td>80 - 84</td><td>Passed</td></tr>
        <tr><td>Fairly Satisfactory</td><td>75 - 79</td><td>Passed</td></tr>
        <tr><td>Did Not Meet Expectations</td><td>Below 75</td><td>Failed</td></tr>
    </table>
    
    <table>
        <tr>
            <th>Marking</th>
            <th>Non-numerical Rating</th>
        </tr>
        <tr><td>AO</td><td>Always Observed</td></tr>
        <tr><td>SO</td><td>Sometimes Observed</td></tr>
        <tr><td>RO</td><td>Rarely Observed</td></tr>
        <tr><td>NO</td><td>Not Observed</td></tr>
    </table>
    </div>
</body>
</html>

<script>
    window.onload = function() {
        window.print();
        setTimeout(function() {
            window.close(); // Automatically close the tab after printing
        }, 1000);
    };
</script>