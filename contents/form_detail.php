<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3>Kembali<h3></div>
    </a>
    <div class="form-actions">
        <a href="?content=edit-form&id=<?= $_GET['id'] ?>">
            <div><h3>Edit Absen</h3></div>
        </a>
        <a href="./contents/process_exportform.php?id=<?= $_GET['id'] ?>">
            <div><h3>Ekspor Absen</h3></div>
        </a>
        <a href="?content=delete-form&id=<?= $_GET['id'] ?>">
            <div><h3>Hapus Absen</h3></div>
        </a>
    </div>
</div>
<h2><?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'] ?></h2>
<p><strong>Tautan pengisian:</strong> <a href="<?= $_SERVER['HTTP_HOST'] ?>/?content=fill_form&id=<?= $_GET['id'] ?>"><?= $_SERVER['HTTP_HOST'] ?>/?content=fill_form&id=<?= $_GET['id'] ?></a></p>
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