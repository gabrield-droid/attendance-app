<?php
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
?>       

<section class="login_info not_logged">
    Halo, <?= $_SESSION['username']; ?> | <a href="?content=logout"><div>Keluar</div></a>
</section>

<?php            
    } else {
?>

<section class="login_info logged">
    <a href="?content=login">
        <div><h3>Login sebagai admin</h3></div>
    </a>
</section>

<?php
    }
?>

<hr>
<section class="forms_list">
    <?php include "forms.php"; ?>
</section>