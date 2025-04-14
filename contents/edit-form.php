<?php
    $deadline = mysqli_fetch_array(mysqli_query($con, "SELECT tenggat FROM forms WHERE id_form='$_GET[id]'"))['tenggat'];
?>

<div class="nav-form">
    <a href="?content=form_detail&id=<?= $_GET['id'] ?>">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<section class="login_box">
    <h2>EDIT ABSEN</h2>
    <form method="post" action="?content=process_editform&id=<?= $_GET['id'] ?>">
        <label for="nama_absen">Nama absen:</label>
        <input type="text" id="nama_absen" name="nama_absen" placeholder="<?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name']?>" value="<?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name']?>">
        <label for="tenggat">Tenggat isi absen:</label>
        <input type="datetime-local" id="Tenggat" name="tenggat" value="<?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("Y-m-d H:i") ?>">
        <input type="submit" value="SIMPAN">
    </form>
</section>