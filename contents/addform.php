<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3>Kembali<h3></div>
    </a>
</div>
<section class="login_box">
    <h2>TAMBAH ABSEN</h2>
    <form method="post" action="?content=process_addform">
        <label for="nama_absen">Nama absen:</label>
        <input type="text" id="nama_absen" placeholder="Nama Absen" name="nama_absen">
        <label for="tenggat">Tenggat isi absen:</label>
        <input type="datetime-local" id="Tenggat" name="tenggat">
        <input type="submit" value="Tambahkan">
    </form>
</section>