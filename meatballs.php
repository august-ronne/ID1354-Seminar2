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
            <img src="./resources/images/kotbullar.png">
        </div>
        <header class="recipe-header">
            Swedish Meatballs
        </header>
        <ul class="ingredients">
            <li>1 and 1/2 dl milk</li>
            <li>5 tbsp breadcrumbs</li>
            <li>500g beef or pork mince</li>
            <li>1/2 onion (peeled and grated)</li>
            <li>1 egg</li>
            <li>1 tsp salt</li>
            <li>1 tsp black pepper</li>
            <li>butter for pan frying</li>
        </ul>
        <header class="instructions-header">
            Cooking Instructions
        </header>
        <div class="instructions-body">
            Mix milk and breadcrumbs. Let the mixture rest for 10 minutes.
            Add mince, onion, salt, and pepper to the mixture. Work the mixture
            until it is well mixed.<br><br>
            Wet your hands with cold water and form meatballs. Use approximately
            1 tbsp of mixture for each meatball. Fry them in butter, being careful
            not too overcrowd the pan. Shake the frying pan occasionally to ensure
            they keep their round shape.<br><br>
            Serve the meatballs with mashed potatoes and lingonberry jam.
        </div>
        <header class="comments-header">Comments</header>
        <div class="comment-section">
            <?php
            $recipe = "meatballs";
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
