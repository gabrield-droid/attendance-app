<div class="nav-form">
    <a href="?content=form_detail&id=<?= $_GET['id'] ?>">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    $query = $db_con->query("SELECT name, deadline_unix FROM forms WHERE form_id='$_GET[id]'");
    $form_properties = $query->fetch_assoc();
    $fDeadline = date_create("@" . $form_properties['deadline_unix'])->setTimezone(timezone_open("Asia/Makassar"))->format("Y-m-d H:i");
?>

<section class="form-box">
    <h2>EDIT ABSEN</h2>
    <form method="post" action="?content=process_editform&id=<?= $_GET['id'] ?>">
        <label for="form_name">Nama absen:</label>
        <input type="text" name="form_name" placeholder="<?= $form_properties['name']?>" value="<?= $form_properties['name']?>">
        <label for="deadline">Tenggat isi absen (WITA):</label>
        <input type="datetime-local" name="deadline" placeholder="<?= $fDeadline ?>" value="<?= $fDeadline ?>">
        <input type="submit" value="SIMPAN">
    </form>
</section>