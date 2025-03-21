<?php
    $contents = array("home", "login", "logout", "addform", "fill_form", "form_detail", "process_addform", "process_fill_form", "process_login");
    
    if (isset($_GET['content'])) {
        $content = $_GET['content'];
    }
    else {
        $content = "home";
    }

    foreach ($contents as $c) {
        if ($c == $content) {
            include "contents/$c.php";
            break;
        }
    }
?>