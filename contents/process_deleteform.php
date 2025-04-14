<?php
    $query = mysqli_query($con, "DELETE from forms
    WHERE id_form='$_GET[id]'");
?>
<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<?php
    if ($query) {
?>
    <section class="form-box summary success">
        <h2>PENGHAPUSAN ABSEN BERHASIL</h2>
<?php
    }
    else {
?>
    <section class="form-box summary fail">
        <h2>PENGHAPUSAN ABSEN GAGAL</h2>
<?php
    }
?>
    </section>