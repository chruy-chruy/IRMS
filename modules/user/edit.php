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
    <script src="../../assets/js/main.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'User';
include "../../navbar.php";
include "../../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from user Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
 ?>
        <div class="content">
            <div class="header">
                <h1>Edit <?php if ($page) {echo $page;} ?></h1>
            </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
        <form class="row g-3" action="update.php?id=<?php echo $row['id']?>" method="post">
            <div class="grid-container">
            <h3>User Information</h3>
                <div></div>
                <div></div>
                <div></div>
                <div class="grid-item">
                    <label class="form-label">Username <span class="required">*</span></label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control" name="role" 
                    value = "<?php echo $row['role']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Password<span class="required">*</span></label>
                    <input type="text" class="form-control" name="password" 
                    value = "<?php echo $row['password']; ?>" required>
                </div>

            </div>
            <div class="footer">
            <button class="save" type="submit">Save</button>
            <button class="delete" id="delBtn" type="button" onclick="del()">Delete</button>
            <?php
                include_once "../../includes/modal_del_user.php";
            ?>
            </div>
        </form>
        </div>

        <?php } ?>
</body>

</html>