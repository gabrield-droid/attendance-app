<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    $deadline = date_create($_POST['deadline'], timezone_open("Asia/Makassar"))->getTimestamp();
    $query = $db_con->query("INSERT INTO forms SET name = '$_POST[form_name]', deadline_unix = '$deadline'");

    if ($query) {
?>

    <section class="form-box summary success">
        <h2>PENAMBAHAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama absen: <?= $_POST['form_name'] ?></p>
            <p>Tenggat: <?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
    } else {
?>

    <section class="form-box summary fail">
        <h2>PENAMBAHAN ABSEN GAGAL</h2>

<?php
    }
?>

    </section>