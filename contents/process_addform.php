<?php
    $deadline = date_create($_POST['tenggat'], timezone_open("Asia/Makassar"))->getTimestamp();
    $query = mysqli_query($con, "INSERT INTO forms SET name = '$_POST[nama_absen]', tenggat = '$deadline'");
?>

<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    if ($query) {
?>

    <section class="form-box summary success">
        <h2>PENAMBAHAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama absen: <?= $_POST['nama_absen'] ?></p>
            <p>Tenggat: <?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
    }
    else {
?>

    <section class="form-box summary fail">
        <h2>PENAMBAHAN ABSEN GAGAL</h2>

<?php
    }
?>

    </section>