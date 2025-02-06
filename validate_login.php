<?php
// validate_login.php

session_start();
include "db_conn.php";

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query based on the selected role
    // $query = "";
    // switch ($role) {
    //     case 'registrar':
    //         $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND del_status != 'deledete'";
    //         break;
    //     case 'student':
    //         $query = "SELECT * FROM student WHERE username = '$username' AND password = '$password'  AND del_status != 'deledete'";
    //         break;
    //     case 'teacher':
    //         $query = "SELECT * FROM teacher WHERE username = '$username' AND password = '$password'  AND del_status != 'deledete'";
    //         break;
    //     default:
    //         header("Location: index.php?error=Invalid role selected");
    //         exit();

    // }

    $query_registrar = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND del_status != 'deleted'";
    $query_student = "SELECT * FROM student WHERE username = '$username' AND password = '$password' AND del_status != 'deleted'";
    $query_teacher = "SELECT * FROM teacher WHERE username = '$username' AND password = '$password' AND del_status != 'deleted'";

    $result = mysqli_query($conn, $query_registrar);
    $result2 = mysqli_query($conn, $query_student);
    $result3 = mysqli_query($conn, $query_teacher);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];
        header("Location: modules/dashboard/");
        exit();
    }else if (mysqli_num_rows($result2) === 1) {
        $user = mysqli_fetch_assoc($result2);
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['first_name']." ".$user['last_name'];
        header("Location: modules_student/dashboard/index.php");
        exit();
    }else if (mysqli_num_rows($result3) === 1) {
        $user = mysqli_fetch_assoc($result3);
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['first_name']." ".$user['last_name'];
        header("Location: modules_teacher/dashboard/index.php");
        exit();
    }else {
        header("Location: index.php?error=Invalid username or password");
        exit();
    }
} else {
    header("Location: index.php?error=All fields are required");
    exit();
}
