<?php
    $stmt = $db_con->prepare("SELECT name FROM forms WHERE form_id=?"); $stmt->bind_param("s", $_GET['id']); $stmt->execute(); $stmt->bind_result($formName); $stmt->fetch();
    $stmt->close();
    $db_con->close();
?>

<div class="nav-form">
    <a href="form_detail">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>
<section class="form-box">
    <h2>HAPUS ABSEN</h2>
    <form method="post" action="/home">
        <input type="hidden" name="delete_form_id" value="<?= $_GET['id'] ?>">
        <p>Apakah Anda yakin ingin menghapus absen ini?</p>
        <h3><?= htmlspecialchars($formName) ?></h3>
        <input type="submit" class="delete-button" value="HAPUS ABSEN">
    </form>
</section>