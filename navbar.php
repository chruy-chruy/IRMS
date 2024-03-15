<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} ?>
<link rel="icon" type="image/x-icon" href="../../assets/img/republic.ico">
<div class="container">
        <div class="sidebar">
            <nav class="main-menu">
                <div>
                    <img src="../../assets/img/republic.png" alt="Logo" class="logo">
                </div>

                <div class="scrollbar" id="style-1">

                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Dashboard') {echo 'active';} ?>">
                            <a href="../dashboard">
                                <i class="fa fa-home fa-lg"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Resident') {echo 'active';} ?>">
                            <a href="../resident/">
                                <i class="fa fa-users fa-lg"></i>
                                <span class="nav-text">Residents</span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Certificate') {echo 'active';} ?>">
                            <a href="../certificate/">
                                <i class="fa fa-certificate fa-lg"></i>
                                <span class="nav-text">Barangay Certificate</span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Clearance') {echo 'active';} ?>">
                            <a href="../clearance/">
                                <i class="fa fa-address-card-o fa-lg"></i>
                                <span class="nav-text">Barangay Clearance</span>
                            </a>
                        </li>


                        <li class="darkerlishadowdown <?php if ($page == 'Users') {echo 'active';} ?>">
                            <a href="../user/">
                                <i class="fa fa-user fa-lg"></i>
                                <span class="nav-text">Users</span>
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