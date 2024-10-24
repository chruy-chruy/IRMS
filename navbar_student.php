<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} 
$name = $_SESSION['name'];

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



                    <ul class="logout">
                        <li>
                            <a href="../../logout.php">
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