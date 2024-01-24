<!DOCTYPE html>
<html class="menu">
<html>

<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <title>Residents</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <script src="../../assets/js/table.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'Resident';
include "../../navbar.php";
include "../../db_conn.php";
 ?>
        <div class="content">
            <div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
            </div>

        <form class="row g-3" action="create.php" method="post">
            <div class="image" id="image">
                <img src="../../assets/img/default.png" alt="">
                <input type="text" hidden name="image" value="default.png">
            </div>
            <div class="input-image">
                <?php
                include "../../includes/modal.php";
                ?>

            </div>
            <div class="grid-container">
                <h3>Personal Information</h3>
                <div></div>
                <div></div>
                <div></div>
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
                    <input type="text" class="form-control" id="name" name="gender" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Date of Birth<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="date_of_birth" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Civil Status<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="civil_status" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>
                <div></div>
                <h3>Address</h3>
                <div></div>
                <div></div>
                <div></div>

                <div class="grid-item">
                    <label class="form-label">Street<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="street" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Purok<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="purok" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Place of Birth<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="place_of_birth" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>
                <div></div>

                <h3>Contact Information</h3>
                <div></div>
                <div></div>
                <div></div>

                <div class="grid-item">
                    <label class="form-label">Phone Number<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="phone_number" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="name" name="telephone_number" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
                </div>

                <div class="grid-item">
                    <label class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="name" name="email_address" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
                </div>
                <div></div>

                <h3>Others</h3>
                <div></div>
                <div></div>
                <div></div>
                
                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="nationality" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Educational Attainment</label>
                    <input type="text" class="form-control" id="name" name="educational_attainment" 
                    <?php if (isset($_GET['name'])) { ?>  value = "<?php echo $_GET['name']; ?>" <?php } ?> >
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

                <div class="grid-item">
                    <label class="form-label">Blood Type</label>
                    <input type="text" class="form-control" id="name" name="blood_type" 
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