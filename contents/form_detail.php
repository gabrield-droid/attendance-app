<a href="index.php">Kembali</a>
<div>tombol</div>
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