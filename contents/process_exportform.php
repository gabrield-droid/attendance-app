<?php
    $stmt = $db_con->prepare("SELECT name FROM forms WHERE form_id=?"); $stmt->bind_param("i", $_GET['id']); $stmt->execute();
    $stmt->bind_result($form_name); $stmt->fetch(); $stmt->close();
    $filename =  str_replace(" ", "_", $form_name) . '.csv';
    
    $delimiter = ",";
    
    $f = fopen("php://memory", "w");
    $fields = array("No.", "Nama", "NIM", "Kelas", "Timestamp");
    
    fputcsv($f, $fields, $delimiter);
    
    $stmt = $db_con->prepare("SELECT name, student_id, class, timestamp_unix FROM records WHERE form_id=?");
    $stmt->bind_param("i", $_GET['id']); $stmt->execute();
    $stmt->bind_result($recordName, $recordStudentID, $recordClass, $recordTSUnix);
    $no = 0;
    while ($stmt->fetch()) {
        $no++;
        $fTimestamp = date_create("@" . $recordTSUnix)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A");
        $record_csv = array($no, $recordName, $recordStudentID, $recordClass, $fTimestamp);
        fputcsv($f, $record_csv, $delimiter);
    }
    
    $stmt->close();
    $db_con->close();
    
    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);

    fclose($f);

    exit;
?>