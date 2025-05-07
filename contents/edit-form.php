<div class="nav-form">
    <a href="form_detail">
        <div class="back-button"><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    $stmt = $db_con->prepare("SELECT name, deadline_unix FROM forms WHERE form_id=?"); $stmt->bind_param("i", $_GET['id']); $stmt->execute();
    $stmt->bind_result($formName, $formDLUnix); $stmt->fetch(); $stmt->close();
    $db_con->close();
    $fDeadline = date_create("@" . $formDLUnix)->setTimezone(timezone_open("Asia/Makassar"))->format("Y-m-d H:i");
?>

<section class="form-box">
    <h2>EDIT ABSEN</h2>
    <form method="post" action="form_detail">
        <label for="form_name">Nama absen:</label>
        <input type="text" name="form_name" placeholder="<?= htmlspecialchars($formName) ?>" value="<?= htmlspecialchars($formName) ?>">
        <label for="deadline">Tenggat isi absen (WITA):</label>
        <input type="datetime-local" name="deadline" placeholder="<?= $fDeadline ?>" value="<?= $fDeadline ?>">
        <input type="submit" value="SIMPAN">
    </form>
</section>