<?php
    $query = mysqli_query($con, "INSERT INTO forms SET name = '$_POST[nama_absen]', tenggat = '$_POST[tenggat]'");
?>
    <a href="index.php">Kembali</a>
<?php
    if ($query) {
?>
    <section class="login_box summary success">
        <h2>PENAMBAHAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama absen: <?= $_POST['nama_absen'] ?></p>
            <p>Tenggat: <?= $_POST['tenggat'] ?></p>
        </div>
<?php
    }
    else {
?>
    <section class="login_box summary fail">
        <h2>PENAMBAHAN ABSEN GAGAL</h2>
<?php
    }
?>
    </section>