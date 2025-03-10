<?php 
$page = 'Grades';
include "../../db_conn.php";

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
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>
<body>
    <?php include "../../navbar_teacher.php"; 
    
    // Get section ID from URL
$section_id = isset($_GET['section_id']) ? intval($_GET['section_id']) : 0;
$subject_id = $_GET['subject_id'];
// Fetch section details
$section_query = $conn->prepare("SELECT name, grade_level FROM section WHERE id = ?");
$section_query->bind_param("i", $section_id);
$section_query->execute();
$section_result = $section_query->get_result();
$section = $section_result->fetch_assoc();

// Fetch students assigned to this section
$query = $conn->prepare(
    "SELECT DISTINCT s.id, s.first_name, s.last_name, s.grade_level, s.lrn_number 
    FROM student s
    INNER JOIN section_student ss ON s.id = ss.student
    WHERE ss.section = ? 
    ORDER BY s.grade_level ASC"
);
$query->bind_param("i", $section_id);
$query->execute();

$result = $query->get_result();


$subject_query = $conn->prepare("SELECT name FROM subject WHERE id = ?");
$subject_query->bind_param("i", $subject_id);
$subject_query->execute();
$subject_result = $subject_query->get_result();
$subject = $subject_result->fetch_assoc();

?>
    <div class="content">
        
        <div class="header">
            <h1> <?php echo htmlspecialchars($section['name']) . " - " . $subject['name'];?></h1>
        </div>
    <a href="subject.php?section_id=<?php echo $section_id?>" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>

        
        <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 60px;">ID</th>
                    <th>Name</th>
                    <th>Grade Level</th>
                    <th>LRN Number</th>
                    <th style="width: 200px;">Action</th>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="table-row">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['grade_level']); ?></td>
                        <td><?php echo htmlspecialchars($row['lrn_number']); ?></td>
                        <td>
                            <a class="view" href="grade.php?student_id=<?php echo $row['id']; ?>&section_id=<?php echo $section_id; ?>&subject_id=<?php echo $subject_id; ?>&teacher_id=<?php echo $teacher_id; ?>">Add Grade</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        new DataTable('#example', { order: [[0, 'desc']] });
    </script>
</body>
</html>