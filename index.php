<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$start = new Game();
?>
<html>
<head>
    <link rel="stylesheet" href="css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Reversi v.0.1</title>
</head>
<body>
<div class="row">
    <div class="col">
        <div class="button-admin">
            <form method="post">
                <input type="hidden" name="SD">
                <input type="submit" class="waves-effect waves-light btn indigo darken-1" value="Restart">
            </form>
        </div>
    </div>
<div class="board">
    <?= $start->initGame(); ?>
</div>
</div> <!-- row -->
<div class="tech-inf">
    <?= $start->info(); ?>
</div>
</body>
</html>
