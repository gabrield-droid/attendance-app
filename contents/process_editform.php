<?php
    $deadline = date_create($_POST['tenggat'], timezone_open("Asia/Makassar"))->getTimestamp();

    $query = mysqli_query($con, "UPDATE forms SET
        name = '$_POST[nama_absen]',
        tenggat = '$deadline'
    WHERE id_form='$_GET[id]'");
?>

<div class="nav-form">
    <a href="?content=form_detail&id=<?= $_GET['id'] ?>">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    if ($query) {
?>

    <section class="login_box summary success">
        <h2>PENGEDITAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama absen: <?= $_POST['nama_absen'] ?></p>
            <p>Tenggat: <?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
    }
    else {
?>

    <section class="login_box summary fail">
        <h2>PENGEDITAN ABSEN GAGAL</h2>

<?php
    }
?>

    </section>