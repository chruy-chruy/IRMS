<!DOCTYPE html>
<html lang="en">
<?php 
$page = 'Schedule';

include "../../db_conn.php";
if (!isset($_GET['section'])) {
  header("Location: ./");
  exit();
} 
$section = $_GET['section'];
$squery = mysqli_query($conn, "
                    SELECT s.*, CONCAT(t.first_name, ' ', t.last_name) AS teacher_name 
                    FROM section s 
                    LEFT JOIN teacher t ON s.teacher_id = t.id 
                    WHERE s.del_status != 'deleted' AND s.id = '$section'
                    ;
                ");
while ($row = mysqli_fetch_array($squery)) { $section_name = $row['name']; $grade = $row['grade_level']; }
?>
 ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>IRMS-<?php if ($page) {echo $page;} ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<style>
        .scheduler {
    display: grid;
    grid-template-columns: 150px repeat(5, 1fr);
    grid-auto-rows: 50px;
    width: 100%;
    max-width: 90%;
    margin: 20px auto;
    background: white;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.scheduler div {
    border: 1px solid #ddd;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}
.scheduler .header1 {
    background-color: #007BFF;
    color: white;
    font-weight: bold;
}
.scheduler .time-slot {
    background-color: #f9f9f9;
    font-weight: bold;
    color: #333;
}
.scheduler .subject,
.scheduler button.subject {
    background-color: #e3f2fd;
    color: #1e88e5;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    text-align: center;
    width: 100%;
    border: 1px solid #ddd;
}
.scheduler .subject:hover,
.scheduler button.subject:hover {
    background-color: #bbdefb;
}

.scheduler .break {
    background-color: #ffecb3;
    color: #ff9800;
}
.scheduler .lunch {
    background-color: #c8e6c9;
    color: #388e3c;
}

    </style>
<body>
<?php include "../../navbar.php"; ?>
<div class="content">
<div class="header">
                <h1><?php if ($page) {echo $page . ' of Grade '.$grade. ' - ' .$section_name;} ?></h1>
</div>
<form action="creat.php">
<div class="scheduler">
        <!-- header1 -->
        <div class="header1">Time</div>
        <div class="header1">Monday</div>
        <div class="header1">Tuesday</div>
        <div class="header1">Wednesday</div>
        <div class="header1">Thursday</div>
        <div class="header1">Friday</div>

<!-- Time Slots and Subjects -->
<?php 
// Fetch schedule information based on the section
$squery = mysqli_query($conn, "SELECT * FROM schedule WHERE section = '$section';");
$row = mysqli_fetch_assoc($squery);

// Fetch all subjects for the dropdown
$subjectsQuery = mysqli_query($conn, "SELECT * FROM subject Where grade_level = $grade;");
$subject = mysqli_fetch_assoc($subjectsQuery);
?>
<div class="time-slot">7:30am - 8:30am</div>

<select name="first_monday" id="first_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<select name="first_tuesday" id="first_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<select name="first_wednesday" id="first_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<select name="first_thursday" id="first_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<select name="first_friday" id="first_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<div class="time-slot">8:31am - 9:30am</div>

<select name="second_monday" id="second_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="second_tuesday" id="second_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="second_wednesday" id="second_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="second_thursday" id="second_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="second_friday" id="second_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<div class="time-slot">9:31am - 10:00am</div>
<div class="break">Morning Break</div>
<div class="break">Morning Break</div>
<div class="break">Morning Break</div>
<div class="break">Morning Break</div>
<div class="break">Morning Break</div>

<div class="time-slot">10:01am - 11:00am</div>

<select name="third_monday" id="third_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="third_tuesday" id="third_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="third_wednesday" id="third_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="third_thursday" id="third_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="third_friday" id="third_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<div class="time-slot">11:01am - 12:00pm</div>

<select name="fourth_monday" id="fourth_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fourth_tuesday" id="fourth_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fourth_wednesday" id="fourth_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fourth_thursday" id="fourth_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fourth_friday" id="fourth_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<div class="time-slot">12:00pm - 1:00pm</div>
<div class="lunch">Lunch</div>
<div class="lunch">Lunch</div>
<div class="lunch">Lunch</div>
<div class="lunch">Lunch</div>
<div class="lunch">Lunch</div>

<div class="time-slot">1:00pm - 2:00pm</div>

<select name="fifth_monday" id="fifth_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fifth_tuesday" id="fifth_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fifth_wednesday" id="fifth_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fifth_thursday" id="fifth_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="fifth_friday" id="fifth_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<div class="time-slot">2:01pm - 3:00pm</div>

<select name="sixth_monday" id="sixth_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="sixth_tuesday" id="sixth_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="sixth_wednesday" id="sixth_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="sixth_thursday" id="sixth_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="sixth_friday" id="sixth_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<div class="time-slot">3:01pm - 4:00pm</div>

<select name="seventh_monday" id="seventh_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="seventh_tuesday" id="seventh_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="seventh_wednesday" id="seventh_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="seventh_thursday" id="seventh_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="seventh_friday" id="seventh_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>

<div class="time-slot">4:01pm - 5:00pm</div>

<select name="eighth_monday" id="eighth_monday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="eighth_tuesday" id="eighth_tuesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="eighth_wednesday" id="eighth_wednesday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="eighth_thursday" id="eighth_thursday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>
<select name="eighth_friday" id="eighth_friday" class="subject">
    <option hidden value="">Select Subject</option>
    <?php
    if ($subject) {
        echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
    }
    ?>
</select>


</div>

</form>

</div>
</body>

</html>