<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} ?>
<link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
<div class="container">
        <div class="sidebar">
            <nav class="main-menu">
                <div>
                    <img src="../../assets/img/logo.png" alt="Logo" class="logo">
                </div>

                <div class="scrollbar" id="style-1">

                    <ul>
                        <li class="darkerlishadow <?php if ($page == 'Dashboard') {echo 'active';} ?>">
                            <a href="../dashboard">
                                <i class="fa fa-home fa-lg"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Teacher') {echo 'active';} ?>">
                            <a href="../Teacher/">
                                <i class="fa fa-users fa-lg"></i>
                                <span class="nav-text">Teacher</span>
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

                        <li class="darkerli <?php if ($page == 'Subject') {echo 'active';} ?>">
                            <a href="../subject/">
                                <i class="fa fa-address-card-o fa-lg"></i>
                                <span class="nav-text">
                                    Subject
                                </span>
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