<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    $query = $db_con->query("DELETE from forms
    WHERE form_id='$_GET[id]'");

    if ($query) {
?>

    <section class="form-box summary success">
        <h2>PENGHAPUSAN ABSEN BERHASIL</h2>

<?php
    } else {
?>

    <section class="form-box summary fail">
        <h2>PENGHAPUSAN ABSEN GAGAL</h2>

<?php
    }
?>

    </section>