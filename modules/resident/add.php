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
    <link rel="icon" type="image/x-icon" href="../../assets/img/republic.ico">
    <title>Residents</title>
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
$page = 'Resident';
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

            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">First Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="first_name" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="name" name="middle_name" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="last_name" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="name" name="suffix" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select id="gender" name="gender" required>
                    <option value="" select hidden >--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Date of Birth<span class="required">*</span></label>
                    <input type="date" class="form-control" id="name" name="date_of_birth"  max="<?= date('Y-m-d'); ?>"
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Civil Status<span class="required">*</span></label>
                    <select id="civil_status" name="civil_status" required>
                        <option value="" select hidden >--</option>
                        <option value="Single">Single</option>
                        <option value="Maried">Maried</option>
                        <option value="Separated or Divorced">Separated or Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>

            <h3>Address</h3>

            <div class="grid-container grid-container--fill">

                <div class="grid-item">
                    <label class="form-label">Purok<span class="required">*</span></label>
                    <select id="purok" name="purok" required>
                    <option value="" select hidden >--</option>
                        <option value="Sitio Balite">Sitio Balite</option>
                        <option value="Sitio Spring">Sitio Spring</option>
                        <option value="Sitio Crossing">Sitio Crossing</option>
                        <option value="Purok Ni-an">Purok Ni-an</option>
                        <option value="Purok Bag-o">Purok Bag-o</option>
                        <option value="Purok Constantino">Purok Constantino</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Place of Birth<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="place_of_birth" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>
                </div>

                <h3>Contact Information</h3>

                <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Phone Number<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="phone_number" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="name" name="email_address" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
                </div>
                </div>

                <h3>Others</h3>

                <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="nationality" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Educational Attainment</label>
                    <select id="educational_attainment" name="educational_attainment" required>
                        <option value="" select hidden >--</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High School">High School</option>
                        <option value="College">College</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="name" name="occupation" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
                </div>

                <div class="grid-item">
                    <label class="form-label">Religion</label>
                    <input type="text" class="form-control" id="name" name="religion" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
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