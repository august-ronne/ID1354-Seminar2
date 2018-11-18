<?php
require "header.php";
if (isset($_SESSION['active_username'])) {
    header("Location: ./index.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="./resources/styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/basic-layout.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/register.css">
</head>

<main>
    <div class="register-container">
        <section class="register-content">
            <h1 class="register-header">Register a new account</h1>
            <p class="register-info">We are so glad you want to join us.<br> To
            create a new account, simply fill in the forms below and click on
            'Sign up'!</p>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="signuperror">Fill in all the fields!</p>';
                }
            }
            ?>
            <form action="./logic/register.logic.php" method="post" class="register-form">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Sign up</button>
            </form>
        </section>
    </div>
</main>

<?php
require "footer.php"
?>
