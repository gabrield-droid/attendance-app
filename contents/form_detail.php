<div class="nav-form">
    <a href="/">
        <div><h3>Kembali<h3></div>
    </a>
    <div class="form-actions">
        <a href="?content=edit-form&id=<?= $_GET['id'] ?>">
            <div><h3>Edit Absen</h3></div>
        </a>
        <a href="?content=export-response-form&id=<?= $_GET['id'] ?>">
            <div><h3>Ekspor absen</h3></div>
        </a>
        <a href="?content=copy-link&id=<?= $_GET['id'] ?>">
            <div><h3>Salin Tautan</h3></div>
        </a>
        <a href="?content=delete-form&id=<?= $_GET['id'] ?>">
            <div><h3>Hapus Absen</h3></div>
        </a>
    </div>
</div>
<h2><?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'] ?></h2>
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
            <td><?= $data['timestamp'] ?></td>
        </tr>

<?php
    }
?>
    </tbody>
</table>