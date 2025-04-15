<div class="nav-form">
    <a href="?content=form_detail&id=<?= $_GET['id'] ?>">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<section class="form-box">
    <h2>HAPUS ABSEN</h2>
        <p>Apakah Anda yakin ingin menghapus absen ini?</p>
        <h3><?= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'] ?></h3>
        <a class="delete-button" href="?content=process_deleteform&id=<?= $_GET['id'] ?>">
            <div><h3>HAPUS ABSEN</h3></div>
        </a>
</section>