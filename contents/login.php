<div class="nav-form">
    <a href="/home">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
if ($_POST['username'] && $_POST['password']) {
    include __DIR__ . "/process_login.php";
}
?>

<section class="form-box">
    <h2>MASUK SEBAGAI ADMIN</h2>
    <form method="post" action="">
        <input type="text" placeholder="Nama pengguna" name="username">
        <input type="password" placeholder="Kata sandi" name="password">
        <input type="submit" value="MASUK">
    </form>
</section>