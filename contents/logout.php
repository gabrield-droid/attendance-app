<?php
    session_start();
    session_destroy();

    //echo "<p align='center'>Anda telah logout!</p>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
?>