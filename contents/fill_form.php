<?php
    $back = "/home";
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
    $back = "form_detail";
    }
?>

<div class="nav-form">
    <a href="<?= $back ?>">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<?php
include "library/getTime.php";

if ($_POST['name'] && $_POST['class'] && $_POST['student_id']) {
    include __DIR__ . "/process_fill_form.php";
}

$stmt = $db_con->prepare("SELECT name, deadline_unix FROM forms WHERE form_id=?"); $stmt->bind_param("s", $_GET['id']); $stmt->execute();
$stmt->bind_result($formName, $formDLUnix); $stmt->fetch(); $stmt->close();
$db_con->close();

if ($formDLUnix - getTimeFromNTP() < 0) {
?>

<section class="form-box summary fail">
    <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
} else {
?>

<section class="form-box">
    <h2><?= htmlspecialchars($formName) ?></h2>
    <p><strong>Tenggat:</strong> <?= date_create("@" . $formDLUnix)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
    <form method="post" action="">
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