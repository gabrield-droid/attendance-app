<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
    <div class="form-actions">
        <a href="?content=edit-form&id=<?= $_GET['id'] ?>">
            <div><h3><span class="symbol"> &#128221; </span><span class="text">Edit Absen </span></h3></div>
        </a>
        <a href="./contents/process_exportform.php?id=<?= $_GET['id'] ?>">
            <div><h3><span class="symbol"> &#128190; </span><span class="text">Ekspor Absen </span></h3></div>
        </a>
        <a href="?content=delete-form&id=<?= $_GET['id'] ?>">
            <div><h3><span class="symbol"> &#128465; </span><span class="text">Hapus Absen </span></h3></div>
        </a>
    </div>
</div>

<?php
    $stmt = $db_con->prepare("SELECT name, deadline_unix FROM forms WHERE form_id=?"); $stmt->bind_param("i", $_GET['id']); $stmt->execute();
    $stmt->bind_result($formName, $formDLUnix); $stmt->fetch(); $stmt->close();
?>

<h2><?= htmlspecialchars($formName) ?></h2>
<p><strong>Tenggat absen   :</strong> <?= date_create("@" . $formDLUnix)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
<p><strong>Tautan pengisian:</strong> <a href="http://<?= $_SERVER['HTTP_HOST'] ?>?content=fill_form&id=<?= $_GET['id'] ?>">http://<?= $_SERVER['HTTP_HOST'] ?>/?content=fill_form&id=<?= $_GET['id'] ?></a></p>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>

<?php
    $stmt = $db_con->prepare("SELECT name, student_id, class, timestamp_unix FROM records WHERE form_id=?");
    $stmt->bind_param("i", $_GET['id']); $stmt->execute();
    $stmt->bind_result($recordName, $recordStudentID, $recordClass, $recordTSUnix);
    $no = 0;
    while ($stmt->fetch()) {
        $no++;
?>

        <tr>
            <td><?= $no ?></td>
            <td><?= htmlspecialchars($recordName) ?></td>
            <td><?= htmlspecialchars($recordStudentID) ?></td>
            <td><?= htmlspecialchars($recordClass) ?></td>
            <td><?= date_create("@" . $recordTSUnix)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></td>
        </tr>

<?php
    }
    $stmt->close();
    $db_con->close();
?>
    </tbody>
</table>