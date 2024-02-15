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
$page = 'Certificate';
include "../../navbar.php";
include "../../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from resident Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
 ?>
        <div class="content">
            <div class="header">
                <h1>Generate <?php if ($page) {echo $page;} ?></h1>
            </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>

        <form class="row g-3" action="barangay_certificate.php?id=<?php echo $row['id']?>" method="post">
        <br>
        <br>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Resident Name <span class="required">*</span></label>
                    <input readonly  type="text" class="form-control" name="name" value="<?php echo $row['first_name']." ". $row['middle_name'] ." ". $row['last_name'] ." ". $row['suffix'] ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Address<span class="required">*</span></label>
                    <input readonly  type="text" class="form-control" name="address" 
                    value = "<?php echo $row['street'] ." Street, Purok ". $row['purok'] ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Date Issued<span class="required">*</span></label>
                    <input type="date" class="form-control" name="date_issued" 
                    value = "<?php echo date('Y-m-d'); ?>" required>
                </div>


                <div class="grid-item">
                    <label class="form-label">Amount<span class="required">*</span></label>
                    <input type="number" class="form-control" name="password" 
                    value = "" required>
                </div>
                <div class="grid-item">
                    <label class="form-label">Purpose<span class="required">*</span></label>
                    <textarea class="form-control" name="purpose" 
                    value = "" required> </textarea>
                </div>

            </div>
            <div class="footer">
            <button class="save" type="submit">Generate</button>
            <a href="./"><button class="cancel" type="button">Cancel</button></a>
            <?php
                include_once "../../includes/modal_del_user.php";
            ?>
            </div>
        </form>
        </div>

        <?php } ?>
</body>

</html>