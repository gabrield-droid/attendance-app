<?php
    $deadline = date_create($_POST['deadline'], timezone_open("Asia/Makassar"))->getTimestamp();

    $stmt = $db_con->prepare("UPDATE forms SET
        name = ?, deadline_unix = ?
    WHERE form_id=?");
    $stmt->bind_param("sis", $_POST['form_name'], $deadline, $_GET['id']);
    $stmt->execute();

    if ($stmt) {
?>

    <section class="form-box summary success">
        <h2>PENGEDITAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama absen: <?= htmlspecialchars($_POST['form_name']) ?></p>
            <p>Tenggat: <?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
    }
    else {
?>

    <section class="form-box summary fail">
        <h2>PENGEDITAN ABSEN GAGAL</h2>

<?php
    }
    $stmt->close();
?>

    </section>