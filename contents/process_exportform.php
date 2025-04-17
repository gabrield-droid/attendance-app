<?php
    include "../library/config.php";

    $form_name = $db_con->query("SELECT name FROM forms WHERE form_id='$_GET[id]'")->fetch_assoc()['name'];
    $filename =  str_replace(" ", "_", $form_name) . '.csv';
    
    $delimiter = ",";
    
    $f = fopen("php://memory", "w");
    $fields = array("No.", "Nama", "NIM", "Kelas", "Timestamp");
    
    fputcsv($f, $fields, $delimiter);
    
    $query = $db_con->query("SELECT name, student_id, class, timestamp_unix FROM records WHERE form_id='$_GET[id]'");
    $no = 0;
    while ($record = $query->fetch_assoc()) {
        $no++;
        $fTimestamp = date_create("@" . $record['timestamp_unix'])->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A");
        $record_csv = array($no, $record['name'], $record['student_id'], $record['class'], $fTimestamp);
        fputcsv($f, $record_csv, $delimiter);
    }
    
    $db_con->close();
    
    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);

    fclose($f);

    exit;
?>