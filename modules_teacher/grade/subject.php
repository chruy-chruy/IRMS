
<?php $page = 'Grades';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>IRMS-<?php if ($page) {echo $page;} ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include "../../navbar_teacher.php"; ?>
<?php 

$section_id = $_GET['section_id'];

// Fetch sections where the teacher teaches a subject
$query = "SELECT ss.subject AS subject_id, ss.section AS section_id, ss.teacher AS teacher_id, sub.name AS subject_name
    FROM section_subject ss
	JOIN subject sub ON ss.subject = sub.id
    WHERE ss.teacher = '$teacher_id' AND ss.section = '$section_id'
";

// Fetch sections where the teacher teaches a subject
$section = "SELECT * FROM section WHERE id = $section_id";

// $stmt = $conn->prepare($query);
// $stmt->execute();
// $result = $stmt->get_result();
include "../../db_conn.php";
$squery = mysqli_query($conn,$query);
$secquery = mysqli_query($conn,$section);

?>
<div class="content">
    <div class="header"><?php while ($row = mysqli_fetch_array($secquery)): ?>
        <h1><?php if ($page) {echo $page;} ?> - <?= $row['name'] ?> <?= $row['grade_level'] ?></h1>
        <?php endwhile; ?>
    </div>
    <a href="index.php" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>

    <div  class="row g-3">
    <div class="grid-container-dashboard">
            <?php while ($row = mysqli_fetch_array($squery)): ?>
                <a href="./section.php?section_id=<?= $row['section_id'] ?>&subject_id=<?= $row['subject_id'] ?>" class="schedule" style="width: max-content;">
                    <div class="box-icon"><i class="fa fa-users"></i></div><?= $row['subject_name'] ?> 
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>
</body>
</html>
