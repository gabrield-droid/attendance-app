<?php
    include "library/getTime.php";
    $timestamp = date("Y-m-d\TH:i:s\Z", getTimeFromNTP());

    $query = mysqli_query($con, "INSERT INTO records SET
        id_form = '$_POST[id_form]',
        nama = '$_POST[nama]',
        kelas = '$_POST[kelas]',
        nim = '$_POST[nim]',
        timestamp = '$timestamp'
    ");
?>
<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<?php
    if ($query) {
?>
    <section class="login_box summary success">
        <h2>PENGISIAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama: <?= $_POST['nama'] ?></p>
            <p>NIM: <?= $_POST['nim'] ?></p>
            <p>Kelas: <?= $_POST['kelas'] ?></p>
        </div>
<?php
    }
    else {
?>
    <section class="login_box summary fail">
        <h2>PENGISIAN ABSEN GAGAL</h2>
<?php
    }
?>
    </section>