<?php
// validate_login.php

session_start();
include "db_conn.php";

if (isset($_POST['username'], $_POST['password'], $_POST['role'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query based on the selected role
    $query = "";
    switch ($role) {
        case 'registrar':
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND del_status != 'deledete'";
            break;
        case 'student':
            $query = "SELECT * FROM student WHERE username = '$username' AND password = '$password'  AND del_status != 'deledete'";
            break;
        case 'teacher':
            $query = "SELECT * FROM teacher WHERE username = '$username' AND password = '$password'  AND del_status != 'deledete'";
            break;
        default:
            header("Location: index.php?error=Invalid role selected");
            exit();
    }

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
     

        // Redirect to appropriate dashboard based on role
        if ($role === 'registrar') {
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            header("Location: modules/dashboard/");
        } elseif ($role === 'student') {
            $_SESSION['name'] = $user['first_name']." ".$user['last_name'];
            header("Location: modules_student/dashboard");
        } elseif ($role === 'teacher') {
            $_SESSION['name'] = $user['first_name']." ".$user['last_name'];
            header("Location: modules_teacher/dashboard");
        }
        exit();
    } else {
        header("Location: index.php?error=Invalid username or password");
        exit();
    }
} else {
    header("Location: index.php?error=All fields are required");
    exit();
}
