<?php
    $timestamp = getTimeFromNTP();
    $stmt = $db_con->prepare("SELECT deadline_unix FROM forms WHERE form_id=?"); $stmt->bind_param("i", $_POST['form_id']); $stmt->execute();
    $stmt->bind_result($deadline); $stmt->fetch(); $stmt->close();

    if ($deadline - $timestamp < 0) {
?>
    <section class="form-box summary fail">
        <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
    }
    else {
        $stmt = $db_con->prepare("INSERT INTO records SET
            form_id = ?, name = ?, class = ?, student_id = ?, timestamp_unix = ?
        ");
        $stmt->bind_param("isssi", $_POST['form_id'], $_POST['name'], $_POST['class'], $_POST['student_id'], $timestamp);
        $stmt->execute();

        if ($stmt) {
?>

    <section class="form-box summary success">
        <h2>PENGISIAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama: <?= htmlspecialchars($_POST['name']) ?></p>
            <p>NIM: <?= htmlspecialchars($_POST['student_id']) ?></p>
            <p>Kelas: <?= htmlspecialchars($_POST['class']) ?></p>
            <p>Waktu pengisian: <?= date_create("@" . $timestamp)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
        }
        else {
?>

    <section class="form-box summary fail">
        <h2>PENGISIAN ABSEN GAGAL</h2>
        <div>
            <p>Nama: <?= htmlspecialchars($_POST['name']) ?></p>
            <p>NIM: <?= htmlspecialchars($_POST['student_id']) ?></p>
            <p>Kelas: <?= htmlspecialchars($_POST['class']) ?></p>
            <p>Waktu pengisian: <?= date_create("@" . $timestamp)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
        }
        $stmt->close();
    }
?>

    </section>