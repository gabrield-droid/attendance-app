<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<?php
include "library/getTime.php";

$query = $db_con->query("SELECT name, deadline_unix FROM forms WHERE form_id='$_GET[id]'");
$form_properties = $query->fetch_assoc();

if ($form_properties['deadline_unix'] - getTimeFromNTP() < 0) {
?>

<section class="form-box summary fail">
    <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
} else {
?>

<section class="form-box">
    <h2><?= $form_properties['name'] ?></h2>
    <p><strong>Tenggat:</strong> <?= date_create("@" . $form_properties['deadline_unix'])->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
    <form method="post" action="?content=process_fill_form">
        <input type="hidden" name="form_id" value="<?= $_GET['id'] ?>">
        <input type="text" placeholder="Nama" name="name">
        <input type="text" placeholder="NIM" name="student_id">
        <input type="text" placeholder="Kelas" name="class">
        <input type="submit" value="ISI ABSEN">
    </form>

<?php
    }
?>

</section>