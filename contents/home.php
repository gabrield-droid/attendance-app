<?php
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
?>       

<section class="login_info not_logged">
    Halo, <?= $_SESSION['username']; ?> | <a href="logout"><div>Keluar</div></a>
</section>

<?php            
    } else {
?>

<section class="login_info logged">
    <a href="login">
        <div><h3>Masuk sebagai Admin</h3></div>
    </a>
</section>

<?php
    }
?>

<hr>
<section class="forms_list">
    <?php include "forms.php"; ?>
</section>