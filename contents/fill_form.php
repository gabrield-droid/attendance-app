<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<?php
include "library/getTime.php";

$query = mysqli_query($con, "SELECT tenggat FROM forms WHERE id_form='$_GET[id]'");
$data = mysqli_fetch_array($query);

if ($data['tenggat'] - getTimeFromNTP() < 0) {
?>

<section class="form-box summary fail">
    <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
} else {
?>

<section class="form-box">
    <h2><?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'] ?></h2>
    <p><strong>Tenggat:</strong> <?= date_create("@" . $data['tenggat'])->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
    <form method="post" action="?content=process_fill_form">
        <input type="hidden" name="id_form" id="id_form" value="<?= $_GET['id'] ?>">
        <input type="text" placeholder="nama" name="nama">
        <input type="text" placeholder="nim" name="nim">
        <input type="text" placeholder="kelas" name="kelas">
        <input type="submit" value="Isi absen">
    </form>

<?php
    }
?>

</section>