<?php
    $action = "?content=fill_form";
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
    $action = "?content=form_detail";
?>

<a class="form_detail" href="?content=addform">
    <div class="add_form">
        <h2><span>&#43;</span> TAMBAH ABSEN</h2>
    </div>
</a>

<?php
    }

    $query = mysqli_query($con, "SELECT * FROM forms");
    $no = 0;
    while ($data = mysqli_fetch_array($query)) {
        $no++;
?>

<a class="form_detail" href="<?= $action ?>&id=<?= $data['id_form'] ?>">
    <div>
        <h2><?= $data['name'] ?></h2>
        <p>Tenggat: <time datetime=<?= $data['tenggat'] ?>><?= $data['tenggat'] ?></time></p>
    </div>
</a>

<?php
    }
?>