<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<section class="form-box">
    <h2>TAMBAH ABSEN</h2>
    <form method="post" action="?content=process_addform">
        <label for="nama_absen">Nama absen:</label>
        <input type="text" id="nama_absen" placeholder="Nama absen" name="nama_absen">
        <label for="tenggat">Tenggat isi absen (WITA):</label>
        <input type="datetime-local" id="Tenggat" name="tenggat">
        <input type="submit" value="TAMBAHKAN">
    </form>
</section>