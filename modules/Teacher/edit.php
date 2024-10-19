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
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <script src="../../assets/js/main.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'Teacher';
include "../../navbar.php";
include "../../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from teacher Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
 ?>
  <?php include "../../includes/alert.php"; ?>
        <div class="content">
            <div class="header">
                <h1>Edit <?php if ($page) {echo $page;} ?></h1>
            </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
        <form class="row g-3" action="update.php?id=<?php echo $row['id']?>" method="post">
        <div class="image" id="image">
                <img src="../../assets/img/default.jpeg" alt="">
                <input type="text" hidden name="imageValue" value="default.jpeg">
            </div>
          
            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">

                <div class="grid-item">
                    <label class="form-label">First Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name'] ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" 
                    value = "<?php echo $row['middle_name']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" 
                    value = "<?php echo $row['last_name']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="name" name="suffix" 
                    value = "<?php echo $row['suffix']; ?>"  >
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select name="gender" class="form-control" required style="height:43px;">
                        <option hidden value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <h3>Contact Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required
                    value = "<?php echo $row['email']; ?>">
                </div>
                <div class="grid-item">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required
                    value = "<?php echo $row['contact_number']; ?>">
                </div>
            </div>

            <h3>User Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" readonly
                    value = "<?php echo $row['username']; ?>">
                </div>
                <div class="grid-item">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" password="password" readonly
                    value = "<?php echo $row['password']; ?>">
                    <!-- <button type="button" id="togglePassword">Show</button> -->
                </div>
            </div>
            <div class="footer">
            <button class="save" type="submit">Update</button>
            <button class="delete" id="delBtn" type="button" onclick="del()">Delete</button>
            <?php
                include_once "../../includes/modal_del.php";
            ?>
            </div>
        </form>

        <script>
            // Auto-generate username based on email
            document.getElementById('email').addEventListener('input', function() {
                const emailValue = this.value;
                document.getElementById('username').value = emailValue; // Set username as the email
            });

            // Auto-generate password based on full name (first + last name) and add 3 random digits
            document.getElementById('first_name').addEventListener('input', generatePassword);
            document.getElementById('last_name').addEventListener('input', generatePassword);

            function generatePassword() {
                const firstName = document.getElementById('first_name').value;
                const lastName = document.getElementById('last_name').value;
                if (firstName && lastName) {
                    const randomNumbers = Math.floor(100 + Math.random() * 900); // Generate 3 random digits
                    const password = firstName.toLowerCase() + lastName.toLowerCase() + randomNumbers;
                    document.getElementById('password').value = password; // Set password as first + last name + 3 random digits
                }
            }

            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordField = document.getElementById('password');
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    this.textContent = 'Hide';
                } else {
                    passwordField.type = 'password';
                    this.textContent = 'Show';
                }
            });
        </script>
        </div>

        <?php } ?>
</body>

</html>