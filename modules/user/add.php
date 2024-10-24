<?php 
          if(isset($_GET['message'])){
            $message = $_GET['message'];
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <title>Residents</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <script src="../../assets/js/table.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'User';
include "../../navbar.php";
include "../../db_conn.php";
 ?>
        <div class="content">
        <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1>Add <?php if ($page) {echo $page;} ?></h1>
            </div>
            
        <form class="row g-3" action="create.php" method="post">
            <div class="image" id="image">
                <img src="../../assets/img/default.jpeg" alt="">
                <input type="text" hidden name="imageValue" value="default.jpeg">
            </div>
            <div class="input-image">
                <?php
                include "../../includes/modal_cam.php";
                ?>

            </div>
            <h3>User Information</h3>
            <div class="grid-container grid-container--fill">

            <div class="grid-item">
                    <label class="form-label">Full Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"  required>
                </div>
              
                <div class="grid-item">
                    <label class="form-label">Username<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="username" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Password<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="password" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Role<span class="required">*</span></label>
                    <select name="role" class="form-control" id="role" required style="height:43px;">
        <option hidden value="">Select Role</option> 
        <option value="registrar">Registrar</option>
        <option value="administrator">Super Admin</option>
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