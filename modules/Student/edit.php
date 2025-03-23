<?php 
include "../../db_conn.php";

// Get the student ID from the URL
$id = $_GET['id'];

// Fetch student data from the database
$query = mysqli_query($conn, "SELECT * FROM student WHERE id = '$id'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../../assets/js/table.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
    $page = 'Student';
    include "../../navbar.php";
    ?>
    <div class="content">
        <?php include "../../includes/alert.php"; ?>
        <div class="header">
            <h1>Edit <?php echo $page; ?></h1>
        </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
        <script>
            
        </script>
        <form class="row g-3" action="update.php?id=<?php echo $row['id']; ?>" method="post">
            <div class="image" id="image">
                <img src="../../assets/img/default.jpeg" alt="">
                <input type="text" hidden name="imageValue" value="default.jpeg">
            </div>

            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">First Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middle_name" value="<?php echo $row['middle_name']; ?>"
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="suffix" name="suffix" value="<?php echo $row['suffix']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select name="gender" class="form-control" required style="height:43px;">
                        <option value="Male" <?php echo $row['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $row['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Age<span class="required">*</span></label>
                    <input readonly type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Address<span class="required">*</span></label>
                    <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Contact Number<span class="required">*</span></label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" value="<?php echo $row['contact_number']; ?>" required>
                </div>
                <script>document.getElementById('contact_number').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); // Allows only numbers, max 11 digits
});</script>

                <div class="grid-item">
                    <label class="form-label">Birthdate<span class="required">*</span></label>
                    <input type="date" class="form-control" name="birthdate" value="<?php echo $row['birthdate']; ?>" min='1000-01-01' max='9999-01-01' required >
                </div>

                <div class="grid-item">
                    <label class="form-label">Birthplace<span class="required">*</span></label>
                    <input type="text" class="form-control" name="birthplace" value="<?php echo $row['birthplace']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Religion<span class="required">*</span></label>
                    <input type="text" class="form-control" name="religion" value="<?php echo $row['religion']; ?>" required>
                </div>
            </div>

            <h3>Parents Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Father's Name</label>
                    <input type="text" class="form-control" name="father_name" value="<?php echo $row['father_name']; ?>" 
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Father's Occupation</label>
                    <input type="text" class="form-control" name="father_occupation" value="<?php echo $row['father_occupation']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Father's Contact</label>
                    <input type="text" class="form-control" name="father_contact" id="father_contact" value="<?php echo $row['father_contact']; ?>">
                </div>
            <script>document.getElementById('father_contact').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); 
});</script>
</div>
<div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" name="mother_name" value="<?php echo $row['mother_name']; ?>"
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Occupation</label>
                    <input type="text" class="form-control" name="mother_occupation" value="<?php echo $row['mother_occupation']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Contact</label>
                    <input type="text" class="form-control" name="mother_contact" id="mother_contact" value="<?php echo $row['mother_contact']; ?>">
                    </div>
            <script>document.getElementById('mother_contact').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); 
});</script>
</div>
<div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Guardian's Name</label>
                    <input type="text" class="form-control" name="guardian_name" value="<?php echo $row['guardian_name']; ?>"
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Guardian's Contact</label>
                    <input type="text" class="form-control" name="guardian_contact" id="guardian_contact" value="<?php echo $row['guardian_contact']; ?>">
                </div>
                </div>
            <script>document.getElementById('guardian_contact').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); 
});</script>

            <h3>Education Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Elementary School Name</label>
                    <input type="text" class="form-control" name="elementary_name" value="<?php echo $row['elementary_name']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Elementary School Address</label>
                    <input type="text" class="form-control" name="elementary_address" value="<?php echo $row['elementary_address']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Elementary Year Graduated</label>
                    <input type="text" class="form-control" name="elementary_year" value="<?php echo $row['elementary_year']; ?>">
                </div>




<div class="grid-item">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
    <small id="emailError" style="color: red; display: none;">Please enter a valid Gmail address.</small>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function (event) {
            let emailInput = document.getElementById("email");
            let emailError = document.getElementById("emailError");
            let emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

            if (!emailPattern.test(emailInput.value)) {
                event.preventDefault(); // Prevent form submission
                emailError.style.display = "block"; // Show error message
                emailInput.style.border = "1px solid red"; // Highlight input field
            } else {
                emailError.style.display = "none"; // Hide error message
                emailInput.style.border = ""; // Reset border
            }
        });
    });
</script>


                <div class="grid-item">
                    <label class="form-label">LRN Number<span class="required">*</span></label>
                    <input type="text" class="form-control" name="lrn_number" id="lrn_number" value="<?php echo $row['lrn_number']; ?>"required>
                </div>
                <script>document.getElementById('lrn_number').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 12); // Allows only numbers, max 12 digits
});</script>

                <!-- <div class="grid-item">
                    <label class="form-label">Grade Level</label>
                    <select name="grade_level" class="form-control" required style="height:43px;" >
                            <option hidden value="<?php echo $row['grade_level']; ?>" hidden>Grade <?php echo $row['grade_level']; ?></option> 
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                    </select>
                </div> -->

                
                <div class="grid-item">
                    <label class="form-label">Grade Level</label>
                    <input type="text" class="form-control" name="grade_level" id="grade_level" value="<?php echo $row['grade_level']; ?>" readonly>
                </div>

                <div class="grid-item">
                    <label class="form-label">Transferee?<span class="required">*</span></label>
                    <select name="transferee" class="form-control" required style="height:43px; width:320px;">
                    <option selected hidden value="<?php echo $row['transferee']; ?>" hidden><?php echo $row['transferee']; ?></option> 
                        <option hidden value="">Select</option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>

            </div>

            <h3>User Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" readonly>
                </div>
                <div class="grid-item">
                    <label class="form-label">Password:</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" >
                    <!-- <button type="button" id="togglePassword">Show</button> -->
                </div>
            </div>

            <div class="footer">
            <button class="save" type="submit">Update</button>
            <button class="delete" id="delBtn" type="button" onclick="del()">Archive</button>
            <?php
                include_once "../../includes/modal_archive.php";
            ?>
            </div>
        </form>

        <script>
            // Auto-generate username based on email
            document.getElementById('lrn_number').addEventListener('input', function() {
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
</body>
</html>
