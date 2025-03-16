<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: modules/dashboard");
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRMS</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('assets/img/school2.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 100%;
            max-width: 300px;
            text-align: center;
            background: #fafafa;
            position: relative;	
	        box-shadow: 0px 0px 24px #2c2c2c;
	        border-radius: 10px;
	        background: rgba(245, 245, 245, 0.82);
	
        }

        .login-logo {
            width: 80px;
            margin-bottom: 10px;
        }

        .login__header {
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
	background-color: #2c2d2dd7;
    color: #fff;
    text-align: center;
    padding: 20px;
}

.login-logo{
	max-width: 150px;
    max-height: 150;
    border-radius: 50%;
}

.login__header h2{
	font-family: Raleway, sans-serif;
	color: #fafafa; 
	font-size: 25px;
	font-weight: bold;
	text-align: center;
	text-shadow:  0 0  	10px #828e84; 
}
.login__header .title{
	font-family: Raleway, sans-serif;
	color: #fafafa; 
	font-size: 20px;
	font-weight: bold;
	text-align: center;
	text-shadow:  0 0  	10px #828e84; 
}

.login{
    padding: 20px 0px;	
	position: relative;	
    padding: 20px;
}

        .login__field {
            position: relative;
            margin-bottom: 15px;
        }

        .login__icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .login__input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login__input:focus {
            border-color: #007bff;
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .button {
            background: #f8f7f7a9;
	font-size: 16px;
	margin-top: 30px;
	padding: 16px 20px;	
	border-radius: 26px;
	border: none;
	font-family: Raleway, sans-serif;
	font-weight: 700;
	text-align: center;
	width: 100%;
	color: #000000;
	box-shadow: 0px 2px 2px #7a1313;
	cursor: pointer;
	transition: .2s;
        }

        .button:hover {
            background: #7a1313;
	color: #f8f7f7;
	outline: none;
        }

        @media (max-width: 480px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login__header">
            <img src="assets/img/logo.png" alt="Logo" class="login-logo">
            <!-- <h2>GFI JUNIOR HIGH SCHOOL DEPARTMENT</h2> -->
            <div class="title">GFI JUNIOR HIGH SCHOOL DEPARTMENT</div>
        </div>
        <form class="login" action="validate_login.php" method="POST">
            <div class="login__field">
                <i class="login__icon fa fa-user"></i>
                <input type="text" class="login__input" placeholder="User Name" name="username" required>
            </div>
            <div class="login__field">
                <i class="login__icon fa fa-lock"></i>
                <input type="password" class="login__input" placeholder="Password" name="password" required>
            </div>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error-message"> <?php echo $_GET['error']; ?> </p>
            <?php } ?>
            <button type="submit" class="button">LOGIN</button>
        </form>
    </div>
</body>

</html>
