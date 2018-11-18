<?php

if (isset($_POST['login-submit'])) {
    require 'dbhandler.logic.php';
    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    Header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['active_username'] = $row['username'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    Header("Location: ../index.php?error=wrongpwd");
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit();
}