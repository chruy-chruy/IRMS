<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Section';

include "../../db_conn.php";
if(isset($_GET['sy'])){
  $sy = $_GET['sy'];
}else{
  // Get the current year
$currentYear = date("Y");
// Get the next year
$nextYear = $currentYear + 1;
// Create the school year variable
$sy = "$currentYear-$nextYear";

  header("Location: index.php?sy=$sy");
}

 ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>IRMS-<?php if ($page) {echo $page;} ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include "../../navbar.php"; ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
</div>
<br>
<div class="grid-item">
  <label for="school_year">School Year:</label>
  <select name="school_year" id="school_year" class="form-select" style="max-width: 300px;" onchange="redirectToUpdate(this.value)">
        <!-- Options will be added dynamically -->
  </select>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        function getQueryParam(param) {
            let urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        function populateSchoolYears() {
            const select = document.getElementById("school_year");
            const currentYear = new Date().getFullYear(); // Get current year dynamically
            const maxYears = 10; // Generate school years for the next 10 years
            const selectedYear = getQueryParam("sy"); // Get selected school year from URL
            let firstYear = ""; // Store first generated year

            for (let i = 0; i < maxYears; i++) {
                let yearStart = currentYear + i;
                let yearEnd = yearStart + 1;
                let option = document.createElement("option");
                option.value = `${yearStart}-${yearEnd}`;
                option.textContent = `${yearStart}-${yearEnd}`;

                if (i === 0) {
                    firstYear = option.value; // Store first school year
                }

                if (selectedYear === option.value) {
                    option.selected = true;
                }

                select.appendChild(option);
            }

            // If no school year is selected, default to the first option
            if (!selectedYear) {
                select.value = firstYear;
            }
        }

        populateSchoolYears(); // Call function on page load
    });

    function redirectToUpdate(sy) {
        if (sy) {
            let section = "<?php echo isset($section) ? $section : ''; ?>"; 
            let track = "<?php echo isset($track) ? $track : ''; ?>";
            let quarter = "<?php echo isset($quarter) ? $quarter : ''; ?>";

            window.location.href = `index.php?sy=${sy}`;
        }
    }
</script>
</div>

<div  class="row g-3">
<div class="grid-container-schedule">

<a href="./grade.php?grade=7&sy=<?php echo $sy?>" class="schedule">
    <div class="box-icon"><i class="fa fa-users"></i></div>
    Grade 7
</a>

<a href="./grade.php?grade=8&sy=<?php echo $sy?>" class="schedule">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  Grade 8
</a>

<a href="./grade.php?grade=9&sy=<?php echo $sy?>" class="schedule">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  Grade 9
</a>

<a href="./grade.php?grade=10&sy=<?php echo $sy?>" class="schedule">
  <div class="box-icon"><i class="fa fa-users"></i></div>
  Grade 10
</a>
  
</div>
</div>

</div>
</body>

</html>