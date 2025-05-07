<?php
    $stmt = $db_con->prepare("DELETE from forms WHERE form_id=?"); $stmt->bind_param("i", $_POST['delete_form_id']); $stmt->execute();

    if ($stmt) {
?>

    <section class="form_detail summary success">
        <div>
            <h2>PENGHAPUSAN ABSEN BERHASIL</h2>
        </div>

<?php
    } else {
?>

    <section class="form_detail summary fail">
        <div>
            <h2>PENGHAPUSAN ABSEN GAGAL</h2>
        </div>

<?php
    }
    $stmt->close();
?>

    </section>