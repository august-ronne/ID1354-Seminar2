<?php
require "header.php";
date_default_timezone_set('Europe/Stockholm');
include './logic/dbhandler.logic.php';
include './logic/comments.logic.php';
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="./resources/styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/basic-layout.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/recipe.css">
</head>
<main>
    <div class="recipe-grid">
        <div class="image-container">
            <img src="./resources/images/pannkakor.png">
        </div>
        <header class="recipe-header">
            Swedish Style Pancakes
        </header>
        <ul class="ingredients">
            <li>- 2 and 1/2 dl all purpose flour</li>
            <li>- 1/2 tsp salt</li>
            <li>- 6 dl milk</li>
            <li>- 3 eggs</li>
            <li>- 3 tbsp butter</li>
            <li>- blueberry jam for serving</li>
        </ul>
        <header class="instructions-header">
            Cooking Instructions
        </header>
        <div class="instructions-body">
            Mix flour and salt in a bowl. Add half of the milk while whisking. Continue
            whisking until the batter is smooth, then add the remaining milk along
            with the eggs.
            <br>
            Melt the butter in a frying pan or the microwave. Add the melted butter to
            your batter. Pan fry the pancakes, trying to keep them as thin as possible.
            <br>
            Serve the pancakes with blueberry jam.
        </div>
        <header class="comments-header">Comments</header>
        <div class="comment-section">
            <?php
                $recipe = "pancakes";
                if (isset($_SESSION['active_username'])) {
                    echo "<form method='POST' action='./logic/comments.logic.php' class='comment-form'>
                            <input type='hidden' name='username' value='" . $_SESSION['active_username'] . "'>
                            <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
                            <input type='hidden' name='recipe' value='".$recipe."'>
                            <textarea name='message'></textarea><br>
                            <button type='submit' name='comment_submit' class='comment-delete'>Submit your comment</button>
                        </form>";
                }
                display_comments($conn, $recipe);
            ?>
        </div>
    </div>
</main>

<?php
require "footer.php";
?>
