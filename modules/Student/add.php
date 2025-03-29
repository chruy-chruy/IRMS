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
<style>
    .dropbtn {
  background-color: #2c2d2d;
  color: white;
  padding: 10px;
  border: none;
  cursor: pointer;

  width: 150px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    font-size: 15px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {
    background-color: #560202;
    color: white;
}

.dropbtn:hover {
    background-color: #560202;
    color: white;
}

.show {display: block;}
</style>
<body>
    <?php 
    $page = 'Student';
    include "../../navbar.php";
    include "../../db_conn.php";
    if (!isset($_GET['grade'])) {
        header("Location: ./");
        exit();
      } 
      $grade = $_GET['grade'];
      $grade_level = $grade-1;

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
<br><?php if($grade > 7) {?>
        <div class="search-box">
                <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn btn btn-success dropdown-toggle">Existing Grade <?php echo $grade_level ?></button>


    <?php 
    // Query to fetch student data
    $query = "SELECT s.*, CONCAT(t.name) AS strand_name 
    FROM student s 
    LEFT JOIN section t ON s.section = t.id 
    WHERE s.del_status != 'deleted' AND s.grade_level = '$grade_level'
    ORDER BY s.id DESC;";
    $result = mysqli_query($conn, $query);
    ?>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="add.php?grade=<?php echo $grade ?>">None</a>
    <?php 
        // Loop through each row from the query result and populate the table
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $full_name = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
            $gender = $row['gender'];
            $Email = $row['email'];
            $strand = $row['strand_name'];
        ?>
    <a href="add.php?grade=<?php echo $grade ?>&student=<?php echo $id; ?>"><?php echo $full_name; ?></a>
    <?php } 
          if (isset($_GET['student'])){
            $id2 = $_GET['student'];
              // Query to fetch student data
              $query2 = "SELECT s.*, CONCAT(t.name) AS section_name 
              FROM student s 
              LEFT JOIN section t ON s.section = t.id 
              WHERE s.del_status != 'deleted' AND s.grade_level = '$grade_level' AND s.id = '$id2'";
              $result2 = mysqli_query($conn, $query2);
              $row = mysqli_fetch_assoc($result2);
          }?>
    </div>
    </div>
    </div>
    <hr>
<?php } ?>

        <form class="row g-3" action="create.php?<?php if (isset($_GET['student'])){ echo "student=" . $_GET['student']; } ?>&grade=<?php echo $grade; ?>" method="post">
            <!-- <div class="image" id="image">
                <img src="../../assets/img/default.jpeg" alt="">
                <input type="text" hidden name="imageValue" value="default.jpeg">
   

            </div> -->
           
 
            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">
            <div class="grid-item">
    <label class="form-label">First Name <span class="required">*</span></label>
    <input type="text" class="form-control" id="first_name" name="first_name"  value="<?php if (isset($_GET['student'])){ echo $row['first_name']; } ?>" required 
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
</div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middle_name" value="<?php if (isset($_GET['student'])){ echo $row['middle_name']; } ?>"
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php if (isset($_GET['student'])){ echo $row['last_name']; } ?>" required 
           pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" 
           oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="suffix" name="suffix" value="<?php if (isset($_GET['student'])){ echo $row['suffix']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select name="gender" class="form-control" required style="height:43px; width:320px;">
                       <option value="<?php if (isset($_GET['student'])){ echo $row['gender']; } ?>"><?php if (isset($_GET['student'])){ echo $row['gender']; }else { echo "Select"; } ?></option>

                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Address<span class="required">*</span></label>
                    <input type="text" class="form-control" name="address" value="<?php if (isset($_GET['student'])){ echo $row['address']; } ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Contact Number<span class="required">*</span></label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" value="<?php if (isset($_GET['student'])){ echo $row['contact_number']; } ?>" required>
                </div>
                <script>document.getElementById('contact_number').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); // Allows only numbers, max 12 digits
});</script>

                <div class="grid-item">
                    <label class="form-label">Birthdate<span class="required">*</span></label>
                    <input type="date" class="form-control" name="birthdate" required min='1000-01-01' max='9999-01-01' value="<?php if (isset($_GET['student'])){ echo $row['birthdate']; } ?>"> 
                </div>
                

                <div class="grid-item">
                    <label class="form-label">Birthplace<span class="required">*</span></label>
                    <input type="text" class="form-control" name="birthplace" value="<?php if (isset($_GET['student'])){ echo $row['birthplace']; } ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <input type="text" class="form-control" name="nationality" value="<?php if (isset($_GET['student'])){ echo $row['nationality']; } ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Religion<span class="required">*</span></label>
                    <input type="text" class="form-control" name="religion" value="<?php if (isset($_GET['student'])){ echo $row['religion']; } ?>" required>
                </div>
            </div>

            <h3>Parents Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Father's Name</label>
                    <input type="text" class="form-control" name="father_name" value="<?php if (isset($_GET['student'])){ echo $row['father_name']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Father's Occupation</label>
                    <input type="text" class="form-control" name="father_occupation" value="<?php if (isset($_GET['student'])){ echo $row['father_occupation']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Father's Contact</label>
                    <input type="text" class="form-control" name="father_contact" id="father_contact" value="<?php if (isset($_GET['student'])){ echo $row['father_contact']; } ?>">
                </div>
                <script>document.getElementById('father_contact').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); // Allows only numbers, max 12 digits
});</script>
</div>
<div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" name="mother_name" value="<?php if (isset($_GET['student'])){ echo $row['mother_name']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Occupation</label>
                    <input type="text" class="form-control" name="mother_occupation" value="<?php if (isset($_GET['student'])){ echo $row['mother_occupation']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Mother's Contact</label>
                    <input type="text" class="form-control" name="mother_contact" id="mother_contact" value="<?php if (isset($_GET['student'])){ echo $row['mother_contact']; } ?>">
                </div>
                <script>document.getElementById('mother_contact').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); // Allows only numbers, max 12 digits
});</script>
</div>
<div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Guardian's Name</label>
                    <input type="text" class="form-control" name="guardian_name" value="<?php if (isset($_GET['student'])){ echo $row['guardian_name']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Guardian's Contact</label>
                    <input type="text" class="form-control" name="guardian_contact" id="guardian_contact" value="<?php if (isset($_GET['student'])){ echo $row['guardian_contact']; } ?>">
                </div>
            </div>
            <script>document.getElementById('guardian_contact').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 11); // Allows only numbers, max 12 digits
});</script>
            <h3>Education Information</h3>
            <div class="grid-container grid-container--fill">
                <div class="grid-item">
                    <label class="form-label">Elementary School Name</label>
                    <input type="text" class="form-control" name="elementary_name" value="<?php if (isset($_GET['student'])){ echo $row['elementary_name']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Elementary School Address</label>
                    <input type="text" class="form-control" name="elementary_address" value="<?php if (isset($_GET['student'])){ echo $row['elementary_address']; } ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Elementary Year Graduated</label>
                    <input type="text" class="form-control" name="elementary_year" value="<?php if (isset($_GET['student'])){ echo $row['elementary_year']; } ?>">
                </div>

                <div class="grid-item">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" required value="<?php if (isset($_GET['student'])){ echo $row['email']; } ?>">
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
                    <input type="text" class="form-control" name="lrn_number" id="lrn_number" title="LRN must be exactly 12 digits" maxlength="12" value="<?php if (isset($_GET['student'])){ echo $row['lrn_number']; } ?>" required>
                </div>
                <script>document.getElementById('lrn_number').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 12); // Allows only numbers, max 12 digits
});</script>


                <div class="grid-item">
                    <label class="form-label">Grade Level</label>
                    <input type="text" class="form-control" name="grade_level" id="grade_level" value="<?php echo $grade;?>" readonly>
                </div>

                <div class="grid-item">
                    <label class="form-label">Transferee?<span class="required">*</span></label>
                    <select name="transferee" class="form-control" required style="height:43px; width:320px;">
                        <option hidden value="">Select</option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>

 <!-- 
<div class="grid-item">
    <label class="form-label">Section<span class="required">*</span></label>
    <select class="form-control" id="section" name="section" required style="height:43px;">
        <option value="" hidden>Select Section</option>
    </select>
</div> -->



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
                    <input type="text" class="form-control" id="username" name="username"  value="<?php if (isset($_GET['student'])){ echo $row['username']; } ?>" readonly>
                </div>
                <div class="grid-item">
                    <label class="form-label">Password:</label>
                    <input type="text" class="form-control" id="password" name="password" password="password"  value="<?php if (isset($_GET['student'])){ echo $row['password']; } ?>" readonly>
                </div>
            </div>

            <div class="footer">
                <button class="save" type="submit">Save</button>
                <a href="./"><button class="cancel" type="button">Cancel</button></a>
            </div>
        </form>

        <script>
            // Auto-generate username based on email
            document.addEventListener('DOMContentLoaded', function () {
    const lrnInput = document.getElementById('lrn_number');
    const usernameInput = document.getElementById('username');
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const passwordInput = document.getElementById('password');

    function updateUsername() {
        if (!usernameInput.value) {
            usernameInput.value = lrnInput.value;
        }
    }

    function generatePassword() {
        const firstName = firstNameInput.value.trim();
        const lastName = lastNameInput.value.trim();
        if (firstName && lastName && !passwordInput.value) {
            const randomNumbers = Math.floor(100 + Math.random() * 900); // Generate 3 random digits
            passwordInput.value = firstName.toLowerCase() + lastName.toLowerCase() + randomNumbers;
        }
    }

    // Run check once after a short delay
    // const interval = setInterval(() => {
    //     updateUsername();
    //     generatePassword();
    //     clearInterval(interval); // Stop interval after first execution
    // }, 500); // Adjust delay as needed
});

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
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
        </script>
    </div>
</body>
</html>
