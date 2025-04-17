<div class="nav-form">
    <a href="/">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<section class="form-box">
    <h2>TAMBAH ABSEN</h2>
    <form method="post" action="?content=process_addform">
        <label for="form_name">Nama absen:</label>
        <input type="text" placeholder="Nama absen" name="form_name">
        <label for="deadline">Tenggat isi absen (WITA):</label>
        <input type="datetime-local" name="deadline">
        <input type="submit" value="TAMBAHKAN">
    </form>
</section>