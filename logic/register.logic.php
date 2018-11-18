<?php
if (isset($_POST['signup-submit'])) {
    require_once 'dbhandler.logic.php';

    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $password_repeat = $_POST['pwd-repeat'];


    if (empty(trim(($username))) || empty(trim(($email))) ||
        empty(trim(($password))) || empty(trim(($password_repeat)))) {
        header("Location: ../register.php?error=emptyfields&uid=".$username.
            "&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduid&email=".$email);
        exit();
    }
    else if ($password !== $password_repeat) {
        header("Location: ../register.php?error=passwordcheck&uid=".$username.
            "&mail=".$email);
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result_check = mysqli_stmt_num_rows($stmt);
            if ($result_check > 0) {
                header("Location : ../register.php?error=usertaken&mail=".$email);
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, email, password) VALUES(?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }
                else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../completedreg.php");
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../register.php");
}