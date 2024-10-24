<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IRMS</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome-4.7.0/css/login.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="login__header">
                    <img src="assets/img/logo.png" alt="Logo" class="login-logo">
                    <h2>INTEGRATED RECORDS</h2>
                    <div class="title">MANAGEMENT SYSTEM</div>
                </div>
                <form class="login" action="validate_login.php" method="POST">
                    <!-- Role Selection -->
                    <div class="radio-button-container">
  <div class="radio-button">
  <input type="radio" class="radio-button__input" id="radio1" name="role" value="registrar">
  <label class="radio-button__label" for="radio1">
    <span class="radio-button__custom"></span>
    Registrar
  </label>
</div>
<div class="radio-button">
  <input type="radio" class="radio-button__input" id="radio2" name="role" value="student">
  <label class="radio-button__label" for="radio2">
    <span class="radio-button__custom"></span>
    Student
  </label>
</div>
<div class="radio-button">
  <input type="radio" class="radio-button__input" id="radio3" name="role" value="teacher">
  <label class="radio-button__label" for="radio3">
    <span class="radio-button__custom"></span>
    Teacher
  </label>
</div>
</div>

                    <div class="login__field">
                        <i class="login__icon fas fa fa-user"></i>
                        <input type="text" class="login__input" placeholder="User Name" name="username" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password" required>
                    </div>
                    
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error-message" style="margin-bottom: 15px; color: red;">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>

                    <button type="submit" class="button login__submit">
                        <span class="button__text">LOGIN</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
