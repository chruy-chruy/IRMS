<?php 
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/republic.ico">
    <title>IRMS</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../../assets/js/main.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
    $page = 'Section';
    include "../../navbar.php";
    include "../../db_conn.php";
    $id = $_GET['id'];

    // Fetch section details
    $squery = mysqli_query($conn, "SELECT * FROM `section` WHERE id = '$id'");
    $row = mysqli_fetch_array($squery);
    $teacher_id = $row['teacher_id'];
    // Fetch teachers who are not already assigned to any section
    $teachers_query = mysqli_query($conn, "
        SELECT id, CONCAT(first_name, ' ', last_name) AS full_name 
        FROM teacher 
        WHERE id NOT IN (SELECT teacher_id FROM section WHERE teacher_id IS NOT NULL)
    ");

     $org_teacher = mysqli_query($conn, "
        SELECT id, CONCAT(first_name, ' ', last_name) AS full_name 
        FROM teacher 
        WHERE id = $teacher_id;
    ");
        // Fetch the row
        $teacher = mysqli_fetch_assoc($org_teacher);
    ?>

    <div class="content">
        <div class="header">
            <h1>Edit <?php echo $page; ?></h1>
        </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
        <form class="row g-3" action="update.php?id=<?php echo $row['id']; ?>" method="post">
            <div class="image" id="image">
                <img src="../../assets/img/default.jpeg" alt="">
                <input type="text" hidden name="imageValue" value="default.jpeg">
            </div>
          
            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">

                <div class="grid-item">
                    <label class="form-label">Section Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Grade Level</label>
                    <select name="grade_level" class="form-control" required style="height:43px;">
                            <option hidden value="<?php echo $row['grade_level']; ?>" hidden>Grade <?php echo $row['grade_level']; ?></option> 
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Assigned Teacher<span class="required">*</span></label>
                    <select name="teacher_id" class="form-control" required style="height:43px;">
                        <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['full_name']; ?></option>
                        <?php while ($teacher = mysqli_fetch_assoc($teachers_query)): ?> 
                            <option value="<?php echo $teacher['full_name']; ?>" hidden><?php echo $teacher['full_name']; ?></option> 
                            <option value="<?php echo $teacher['id']; ?>" 
                                <?php echo (isset($row['teacher_id']) && $row['teacher_id'] == $teacher['id']) ? 'selected' : ''; ?>>               
                                <?php echo $teacher['full_name']; ?>     
                            </option>       
                        <?php endwhile; ?>  
                    </select>
                </div>
            </div>
            <div class="footer">
                <button class="save" type="submit">Update</button>
                <button class="delete" id="delBtn" type="button" onclick="del()">Delete</button>
                <?php include_once "../../includes/modal_del.php"; ?>
            </div>
        </form>
    </div>

</body>
</html>
