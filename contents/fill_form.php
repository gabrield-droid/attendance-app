<div class="nav-form">
    <a href="/">
        <div><h3>Kembali<h3></div>
    </a>
</div>
<?php
include "library/getTime.php";

$query = mysqli_query($con, "SELECT tenggat FROM forms WHERE id_form='$_GET[id]'");
$data = mysqli_fetch_array($query);

if (strtotime($data['tenggat']) - (getTimeFromNTP() + (3600 * 8)) < 0) {
?>

<section class="login_box summary fail">
    <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
} else {
?>

<section class="login_box">
    <h2><?= $_GET['name'] ?></h2>
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