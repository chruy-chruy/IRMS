<?php 
include "../../db_conn.php";

// Fetch teachers from the database
$teachers_query = mysqli_query($conn, "SELECT id, CONCAT(first_name, ' ', last_name) AS full_name FROM teacher WHERE del_status != 'deleted'"); // Adjust table name and columns as necessary
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS-Teacher</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../../assets/js/table.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
    $page = 'Subject';
    include "../../navbar.php";
    ?>
    
    <div class="content">
        <?php include "../../includes/alert.php"; ?>
        <div class="header">
            <h1>Add <?php echo $page; ?></h1>
        </div>
        
        <form class="row g-3" action="create.php" method="post">
            <div class="image" id="image">
                <img src="../../assets/img/default.jpeg" alt="">
                <input type="text" hidden name="imageValue" value="default.jpeg">
            </div>

            <h3>Subject Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Subject Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Subject Code</label>
                    <input type="text" class="form-control" id="code" name="code">
                </div>

                <div class="grid-item">
                    <label class="form-label">Assigned Teacher<span class="required">*</span></label>
                    <select name="teacher_id" class="form-control" required style="height:43px;">
                        <option value="" hidden>Select a Teacher</option>
                        <?php while($teacher = mysqli_fetch_assoc($teachers_query)): ?>
                            <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['full_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="footer">
                <button class="save" type="submit">Save</button>
                <a href="./"><button class="cancel" type="button">Cancel</button></a>
            </div>
        </form>
    </div>
</body>
</html>
