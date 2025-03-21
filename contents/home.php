<?php
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
?>        
<section class="login_info" class="not_logged">
    <p>Halo, <? echo $_SESSION['username']; ?> | <a href="?content=logout">Keluar</a></p>
</section>
<?php            
    } else {
?>
<section class="login_info logged">
    <p><a href="?content=login">Login untuk membuat absen</a></p>
</section>
    <hr>
<?php
    }
?>
<section class="forms_list">
    <? include "contents/forms.php"; ?>
</section>