<?php
    include __DIR__ . "/../library/generateID.php";

    $stmt = $db_con->prepare("SELECT form_id FROM forms WHERE form_id=?");
    do {
        $formID = generate_id();
        $stmt->bind_param("s", $formID); $stmt->execute(); $stmt->bind_result($f_formID);
    } while ($stmt->fetch());
    $stmt->close();

    $deadline = date_create($_POST['deadline'], timezone_open("Asia/Makassar"))->getTimestamp();

    $stmt = $db_con->prepare("INSERT INTO forms SET form_id = ?, name = ?, deadline_unix = ?");
    $stmt->bind_param("ssi", $formID, $_POST['form_name'], $deadline);
    $stmt->execute();

    if ($stmt) {
?>

    <section class="form_detail summary success">
        <div>
            <h2>PENAMBAHAN ABSEN BERHASIL</h2>
            <p>ID absen: <?= htmlspecialchars($formID) ?></p>
            <p>Nama absen: <?= htmlspecialchars($_POST['form_name']) ?></p>
            <p>Tenggat: <?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
    } else {
?>

    <section class="form_detail summary fail">
        <div>
            <h2>PENAMBAHAN ABSEN GAGAL</h2>
        </div>

<?php
    }
    $stmt->close();
?>

    </section>