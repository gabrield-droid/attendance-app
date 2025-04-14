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
<h2><?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'] ?></h2>
<?php $deadline = mysqli_fetch_array(mysqli_query($con, "SELECT tenggat FROM forms WHERE id_form='$_GET[id]'"))['tenggat']; ?>
<p><strong>Tenggat absen   :</strong> <?= date_create("@" . $deadline)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
<p><strong>Tautan pengisian:</strong> <a href="http://<?= $_SERVER['HTTP_HOST'] ?>?content=fill_form&id=<?= $_GET['id'] ?>">http://<?= $_SERVER['HTTP_HOST'] ?>/?content=fill_form&id=<?= $_GET['id'] ?></a></p>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>

<?php
    $query = mysqli_query($con, "SELECT * FROM records WHERE id_form='$_GET[id]'");
    $no = 0;
    while ($data = mysqli_fetch_array($query)) {
        $no++;
?>

        <tr>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['kelas'] ?></td>
            <td><?= date_create("@" . $data['timestamp'])->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></td>
        </tr>

<?php
    }
?>
    </tbody>
</table>