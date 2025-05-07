<?php
    $action = "fill_form";
    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
    $action = "form_detail";
?>

<a class="form_detail" href="addform">
    <div class="add_form">
        <h2><span> &#43; </span>TAMBAH ABSEN </h2>
    </div>
</a>

<?php
    }

    if ($_POST['deadline'] && $_POST['form_name']) {
        include __DIR__ . "/process_addform.php";
    }

    if ($_POST['delete_form_id']) {
        include __DIR__ . "/process_deleteform.php";
    }

    $stmt = $db_con->prepare("SELECT * FROM forms"); $stmt->execute();
    $stmt-> bind_result($formId, $formName, $formDLUnix);
    while ($stmt->fetch()) {
        $fDeadline = date_create("@" . $formDLUnix)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A");
?>

<a class="form_detail" href="<?= $formId ?>/<?= $action ?>">
    <div>
        <h2><?= htmlspecialchars($formName) ?></h2>
        <p>Tenggat: <time datetime=<?= $fDeadline ?>><?= $fDeadline ?></time></p>
    </div>
</a>

<?php
    }
    $stmt->close();
    $db_con->close();
?>