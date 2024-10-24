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
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS-Teacher</title>
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
    include "../../db_conn.php";

    ?>

<?php 
$section_query = mysqli_query($conn, "SELECT * FROM section WHERE del_status != 'deleted'");
$sections = [];
while ($section = mysqli_fetch_assoc($section_query)) {
    $sections[] = $section;
}
?>

<script>
    // Pass PHP sections data to JavaScript
    const sections = <?php echo json_encode($sections); ?>;
</script>
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

            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">First Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middle_name">
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="suffix" name="suffix">
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select name="gender" class="form-control" required style="height:43px;">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Age<span class="required">*</span></label>
                    <input type="number" class="form-control" name="age" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Address<span class="required">*</span></label>
                    <input type="text" class="form-control" name="address" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Contact Number<span class="required">*</span></label>
                    <input type="text" class="form-control" name="contact_number" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Birthdate<span class="required">*</span></label>
                    <input type="date" class="form-control" name="birthdate" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Birthplace<span class="required">*</span></label>
                    <input type="text" class="form-control" name="birthplace" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <input type="text" class="form-control" name="nationality" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Religion<span class="required">*</span></label>
                    <input type="text" class="form-control" name="religion" required>
                </div>
            </div>

            <h3>Parents Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Father's Name</label>
                    <input type="text" class="form-control" name="father_name">
                </div>

                <div class="grid-item">
                    <label class="form-label">Father's Occupation</label>
                    <input type="text" class="form-control" name="father_occupation">
                </div>

                <div class="grid-item">
                    <label class="form-label">Father's Contact</label>
                    <input type="text" class="form-control" name="father_contact">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" name="mother_name">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Occupation</label>
                    <input type="text" class="form-control" name="mother_occupation">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Contact</label>
                    <input type="text" class="form-control" name="mother_contact">
                </div>

                <div class="grid-item">
                    <label class="form-label">Guardian's Name</label>
                    <input type="text" class="form-control" name="guardian_name">
                </div>

                <div class="grid-item">
                    <label class="form-label">Guardian's Contact</label>
                    <input type="text" class="form-control" name="guardian_contact">
                </div>
            </div>

            <h3>Education Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Elementary School Name</label>
                    <input type="text" class="form-control" name="elementary_name">
                </div>

                <div class="grid-item">
                    <label class="form-label">Elementary School Address</label>
                    <input type="text" class="form-control" name="elementary_address">
                </div>

                <div class="grid-item">
                    <label class="form-label">Elementary Year Graduated</label>
                    <input type="text" class="form-control" name="elementary_year">
                </div>

                <div class="grid-item">
                    <label class="form-label">Email<span class="required">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">LRN Number<span class="required">*</span></label>
                    <input type="text" class="form-control" name="lrn_number" id="lrn_number" required>
                </div>

                <div class="grid-item">
    <label class="form-label">Grade Level</label>
    <select name="grade_level" class="form-control" id="grade_level" required style="height:43px;">
        <option hidden value="">Select Grade Level</option> 
        <option value="7">Grade 7</option>
        <option value="8">Grade 8</option>
        <option value="9">Grade 9</option>
        <option value="10">Grade 10</option>
    </select>
</div>

<div class="grid-item">
    <label class="form-label">Section<span class="required">*</span></label>
    <select class="form-control" id="section" name="section" required style="height:43px;">
        <option value="" hidden>Select Section</option>
    </select>
</div>



                <!-- <div class="grid-item">
                    <label class="form-label">Grade 7 Section</label>
                    <input type="text" class="form-control" name="grade7_section">
                </div>

                <div class="grid-item">
                    <label class="form-label">Grade 8 Section</label>
                    <input type="text" class="form-control" name="grade8_section">
                </div>

                <div class="grid-item">
                    <label class="form-label">Grade 9 Section</label>
                    <input type="text" class="form-control" name="grade9_section">
                </div>

                <div class="grid-item">
                    <label class="form-label">Grade 10 Section</label>
                    <input type="text" class="form-control" name="grade10_section">
                </div> -->
            </div>

            <!-- User Information Display -->
            <h3>User Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" readonly>
                </div>
                <div class="grid-item">
                    <label class="form-label">Password:</label>
                    <input type="text" class="form-control" id="password" name="password" password="password" readonly>
                </div>
            </div>

            <div class="footer">
                <button class="save" type="submit">Save</button>
                <a href="./"><button class="cancel" type="button">Cancel</button></a>
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

            // Function to filter and update sections based on grade level
    document.getElementById('grade_level').addEventListener('change', function() {
        const selectedGrade = this.value;
        const sectionSelect = document.getElementById('section');

        // Clear previous options
        sectionSelect.innerHTML = '<option value="" hidden>Select Section</option>';

        // Loop through sections and add only those that match the selected grade level
        sections.forEach(section => {
            if (section.grade_level == selectedGrade) { // Assuming "grade_level" is a field in your "section" table
                const option = document.createElement('option');
                option.value = section.id;
                option.textContent = section.name;
                sectionSelect.appendChild(option);
            }
        });
    });

        </script>
    </div>
</body>
</html>
