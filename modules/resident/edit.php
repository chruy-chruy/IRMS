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
$page = 'Resident';
include "../../navbar.php";
include "../../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from resident Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
 ?>
        <div class="content">
            <div class="header">
                <h1>Edit <?php if ($page) {echo $page;} ?></h1>
            </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
        <form class="row g-3" action="update.php?id=<?php echo $row['id']?>" method="post">
            <div class="image" id="image">
                <img src="../../uploads/<?php echo $row['image'] ?>" alt="">
                <input type="text" hidden name="imageValue" value="default.png">
            </div>
            <div class="input-image">
                <?php
                include "../../includes/modal_cam.php";
                ?>

            </div>
            <div class="grid-container">
                <h3>Personal Information</h3>
                <div></div>
                <div></div>
                <div></div>
                <div class="grid-item">
                    <label class="form-label">First Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="name" name="middle_name" 
                    value = "<?php echo $row['middle_name']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="last_name" 
                    value = "<?php echo $row['last_name']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="name" name="suffix" 
                    value = "<?php echo $row['suffix']; ?>"  >
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select class="form-control" id="gender" name="gender" required>
                    <option value="<?php echo $row['gender']; ?>" select hidden ><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Date of Birth<span class="required">*</span></label>
                    <input type="date" class="form-control" id="name" name="date_of_birth" 
                    value = "<?php echo $row['date_of_birth']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Civil Status<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="civil_status" 
                    value = "<?php echo $row['civil_status']; ?>" required>
                </div>
                <div></div>
                <h3>Address</h3>
                <div></div>
                <div></div>
                <div></div>

                <div class="grid-item">
                    <label class="form-label">Street<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="street" 
                    value = "<?php echo $row['street']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Purok<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="purok" 
                    value = "<?php echo $row['purok']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Place of Birth<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="place_of_birth" 
                    value = "<?php echo $row['place_of_birth']; ?>" required>
                </div>
                <div></div>

                <h3>Contact Information</h3>
                <div></div>
                <div></div>
                <div></div>

                <div class="grid-item">
                    <label class="form-label">Phone Number<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="phone_number" 
                    value = "<?php echo $row['phone_number']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="name" name="telephone_number" 
                    value = "<?php echo $row['telephone_number']; ?>" >
                </div>

                <div class="grid-item">
                    <label class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="name" name="email_address" 
                    value = "<?php echo $row['email_address']; ?>" >
                </div>
                <div></div>

                <h3>Others</h3>
                <div></div>
                <div></div>
                <div></div>
                
                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="nationality" 
                    value = "<?php echo $row['nationality']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Educational Attainment</label>
                    <input type="text" class="form-control" id="name" name="educational_attainment" 
                    value = "<?php echo $row['educational_attainment']; ?>" >
                </div>

                <div class="grid-item">
                    <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="name" name="occupation" 
                    value = "<?php echo $row['occupation']; ?>" >
                </div>

                <div class="grid-item">
                    <label class="form-label">Religion</label>
                    <input type="text" class="form-control" id="name" name="religion" 
                    value = "<?php echo $row['religion']; ?>"  >
                </div>

                <div class="grid-item">
                    <label class="form-label">Blood Type</label>
                    <input type="text" class="form-control" id="name" name="blood_type" 
                    value = "<?php echo $row['blood_type']; ?>" >
                </div>

            </div>
            <div class="footer">
            <button class="save" type="submit">Save</button>
            <button class="delete" id="delBtn" type="button" onclick="del()">Delete</button>
            <?php
                include_once "../../includes/modal_del.php";
            ?>
            </div>
        </form>
        </div>

        <?php } ?>
</body>

</html>