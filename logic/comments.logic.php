<?php
require_once "dbhandler.logic.php";

if (isset($_POST['comment_delete'])) {
    delete_comment($conn);
} else if (isset($_POST['comment_submit'])) {
    submit_comment($conn);
}

function submit_comment(mysqli $conn) {
    $username = $_POST['username'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $recipe = $_POST['recipe'];
    $query = "INSERT INTO comments (username, date, message, recipeName) 
VALUES('$username', '$date', '$message', '$recipe')";
    mysqli_query($conn, $query);
    header("Location: ../".$_POST['recipe'].".php");
}

function delete_comment(mysqli $conn) {
    $cid = $_POST['comment_id'];
    $query = "DELETE FROM comments WHERE cid='$cid'";
    mysqli_query($conn, $query);
    header("Location: ../".$_POST['recipe'].".php");
}

function display_comments(mysqli $conn, String $recipe) {
    $sql = "SELECT * FROM comments WHERE recipeName='$recipe'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='comment-box'><header class='comment-header'>";
        echo "Written by user: " . $row['username'] . "<br></header><p class='comment-date'>";
        echo $row['date'] . "<br></p>";
        echo "<div class='comment-text'>" . nl2br($row['message']) . "</div>";
        if (isset($_SESSION['active_username'])) {
            if ($_SESSION['active_username'] == $row['username']) {
                echo "
                     <form class='delete-form' method='POST' action='./logic/comments.logic.php'>
                        <input type='hidden' name='comment_id' value='" . $row['cid'] . "'>
                        <input type='hidden' name='recipe' value='" . $recipe . "'>
                        <button  name='comment_delete' class='delete-comment-button'>Delete</button>
                     </form>
                     </div>";
            } else {
                echo "</div>";
            }
        } else {
            echo "</div>";
        }
    }
}