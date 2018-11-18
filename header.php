<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="./resources/styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/basic-layout.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/header.css">
</head>

<body>

<header class="main-header">
    <h1>Painfully Mediocre Recipes</h1>
</header>
<nav class="menu-container">
    <div class="menu-item-container">
        <a href="index.php">Home</a>
    </div>
    <div class="menu-item-container">
        <a href="recipes.php">Recipes</a>
    </div>
    <div class="menu-item-container">
        <a href="calendar.php">Calendar</a>
    </div>
    <?php
        if (isset($_SESSION['active_username'])) {
            echo "<div class='form-container'>
                    <form action='./logic/logout.logic.php' method='post' class='logout-info'>
                        <div class='user-text-menu'>You are logged in as ".$_SESSION['active_username']."</div>
                        <button type='submit' name='logout-submit'>Logout</button>
                    </form>";
        } else {
            echo '<div class="form-container">
                    <form action="./logic/login.logic.php" method="post">
                        <input type="text" name="uid" placeholder="Username...">
                        <input type="password" name="pwd" placeholder="Password...">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="register.php">Don\'t have an account? Register here!</a>
                </div>';
        }
    ?>
</nav>

</body>
</html>