<?php
    ob_start();

    include "library/config.php";

    if ($_GET['content'] == "process_exportform") {
        include "contents/process_exportform.php";
    }
?>
<!DOCTYPE html>
<html>
    <head></head>
        <title>Absensi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
    <body>
        <div class="container">
        <?php
            include "contents/header.php";
            include "contents.php";
        ?>
        </div>
    </body>
</html>
