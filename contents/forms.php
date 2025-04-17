<?php
    $action = "?content=fill_form";
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
    $action = "?content=form_detail";
?>

<a class="form_detail" href="?content=addform">
    <div class="add_form">
        <h2><span> &#43; </span>TAMBAH ABSEN </h2>
    </div>
</a>

<?php
    }

    $forms = $db_con->query("SELECT * FROM forms");
    while ($form = $forms->fetch_assoc()) {
        $fDeadline = date_create("@" . $form['deadline_unix'])->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A");
?>

<a class="form_detail" href="<?= $action ?>&id=<?= $form['form_id'] ?>">
    <div>
        <h2><?= $form['name'] ?></h2>
        <p>Tenggat: <time datetime=<?= $fDeadline ?>><?= $fDeadline ?></time></p>
    </div>
</a>

<?php
    }
?>