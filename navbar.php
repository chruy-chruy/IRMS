<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} 
$name = $_SESSION['name'];
$role = $_SESSION['role'];

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

                        
                        <li class="darkerli <?php if ($page == 'Student') {echo 'active';} ?>">
                            <a href="../Student/">
                                <i class="fa fa-users fa-lg"></i>
                                <span class="nav-text">
                                    Student
                                </span>
                            </a>
                        </li>


                        <li class="darkerli <?php if ($page == 'Teacher') {echo 'active';} ?>">
                            <a href="../Teacher/">
                                <i class="fa fa-users fa-lg"></i>
                                <span class="nav-text">Teacher</span>
                            </a>
                        </li>


                        <li class="darkerli <?php if ($page == 'Subject') {echo 'active';} ?>">
                            <a href="../Subject/">
                                <i class="fa fa-address-card-o fa-lg"></i>
                                <span class="nav-text">
                                    Subject
                                </span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Section') {echo 'active';} ?>">
                            <a href="../Section/">
                                <i class="fa fa-address-card-o fa-lg"></i>
                                <span class="nav-text">
                                    Section
                                </span>
                            </a>
                        </li>
                        <!-- <li class="darkerli <?php if ($page == 'Schedule') {echo 'active';} ?>">
                            <a href="../Schedule/">
                                <i class="fa fa-calendar-check-o fa-lg"></i>
                                <span class="nav-text">
                                    Schedule
                                </span>
                            </a>
                        </li> -->

                        <!-- <?php if ($role == "administrator"){ ?>
                        <li class="darkerlishadowdown <?php if ($page == 'Users') {echo 'active';} ?>">
                            <a href="../user/">
                                <i class="fa fa-user fa-lg"></i>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>
                        <?php }?> -->

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