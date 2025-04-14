<div class="nav-form">
    <a href="?content=form_detail&id=<?= $_GET['id'] ?>">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<section class="form-box">
    <h2>HAPUS ABSEN</h2>
    <!--<form method="post" action="?content=process_deleteform&id=<?= $_GET['id'] ?>">-->
        <p>Apakah Anda yakin ingin menghapus absen ini?</p>
        <h3><?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'] ?></h3>
    <!--    <label for="nama_absen">Nama absen:</label>
        <input type="text" id="nama_absen" name="nama_absen" placeholder="<?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name']?>" value="<?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name']?>">
        <label for="tenggat">Tenggat isi absen:</label>
        <input type="datetime-local" id="Tenggat" name="tenggat" value="<?= mysqli_fetch_array(mysqli_query($con, "SELECT tenggat FROM forms WHERE id_form='$_GET[id]'"))['tenggat']?>">
        <input type="submit" value="SIMPAN">
    </form>-->
        <a class="delete-button" href="?content=process_deleteform&id=<?= $_GET['id'] ?>">
            <div><h3>HAPUS</h3></div>
        </a>
</section>