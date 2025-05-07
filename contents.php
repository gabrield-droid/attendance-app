<?php
    $contents = array("home", "login", "logout", "addform",
                        "fill_form", "form_detail", "edit-form",
                        "delete-form");
    
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