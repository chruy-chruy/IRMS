<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} 
$name = $_SESSION['name'];
$student_id = $_SESSION['id'];
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
                                <i class="fa fa-home fa-lg"></i>
                                <span class="nav-text">My Schedule</span>
                            </a>
                        </li>

                    </ul>

                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Grade') {echo 'active';} ?>">
                            <a href="../grade">
                                <i class="fa fa-home fa-lg"></i>
                                <span class="nav-text">My Grades</span>
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
        <div class="content">
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