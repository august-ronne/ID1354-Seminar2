<?php
require "header.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="./resources/styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/basic-layout.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/recipe-catalog.css">
</head>
<main>
    <div class="catalog-grid">
        <h1 class="catalog-header">Recipe Catalog</h1>
        <p class="catalog-body-text">Here you can find all of our recipes!<br><br>
        If a recipe interests you simply click on the link.</p>
        <a href="./pancakes.php" class="catalog-link">Swedish Style Pancakes</a>
        <a href="./meatballs.php" class="catalog-link">Swedish Meatballs</a>
    </div>
</main>

<?php
require "footer.php";
?>
