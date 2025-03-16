<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} 
$name = $_SESSION['name'];
$teacher_id = $_SESSION['id'];

include "../../db_conn.php"; // Include database connection

    // $query = mysqli_query($conn, "SELECT * FROM teacher where id = '$teacher_id' AND del_status != 'deleted'");
    // $teacher_creds = mysqli_fetch_array($query);


    $adviser_query = mysqli_query($conn, "SELECT * FROM `section` WHERE teacher_id = '$teacher_id' LIMIT 1;");
    $adviser_row = mysqli_fetch_array($adviser_query);
    

?>
<link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
<div class="container">
        <div class="sidebar">
            <nav class="main-menu">
                <div>
                    <img src="../../assets/img/logo.png" alt="Logo" class="logo">
                </div>
                <div class="user">Hello <?php echo $name; ?>! </div>
                <div class="scrollbar" id="style-1">

                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Dashboard') {echo 'active';} ?>">
                            <a href="../dashboard">
                                <i class="fa fa-home fa-lg"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    
                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Schedule') {echo 'active';} ?>">
                            <a href="../schedule">
                                <i class="fa fa-calendar fa-lg"></i>
                                <span class="nav-text">My Schedule</span>
                            </a>
                        </li>

                    </ul>
                    <?php if($adviser_row){ ?>
                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Advisory') {echo 'active';} ?>">
                            <a href="../advisory">
                                <i class="fa fa-book fa-lg"></i>
                                <span class="nav-text">My Advisory</span>
                            </a>
                        </li>

                    </ul>
                        <?php }?>
                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Grades') {echo 'active';} ?>">
                            <a href="../grade">
                                <i class="fa fa-pencil fa-lg"></i>
                                <span class="nav-text">Grades</span>
                            </a>
                        </li>

                    </ul>


                    <ul class="logout">
                    <li>
                            <a id="deleteButton">
                                <i class="fa fa-sign-out fa-lg"></i>
                                <span class="nav-text">
                                    Logout
                                </span>
                            </a>
                        </li>
                    </ul>
            </nav>
        </div>
    </div>

    <script>
    // Confirm before Logout
document.getElementById('deleteButton').addEventListener('click', function() {
    const confirmed = confirm('Hello <?php echo $name;?>! Are you sure you want to logout?');
    if (confirmed) {
        window.location.href = '../../logout.php'; // Redirect to delete page
    }
});
  </script>
