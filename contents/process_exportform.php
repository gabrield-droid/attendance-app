<?php
    include "../library/config.php";

    $form_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'];
    $filename =  str_replace(" ", "_", $form_name) . '.csv';
    
    $delimiter = ",";
    
    $f = fopen("php://memory", "w");
    $fields = array("No.", "Nama", "NIM", "Kelas", "Timestamp");
    
    fputcsv($f, $fields, $delimiter);
    
    $query = mysqli_query($con, "SELECT nama, nim, kelas, timestamp FROM records WHERE id_form='$_GET[id]'");
    $no = 0;
    while ($data = mysqli_fetch_array($query)) {
        $no++;
        $datetime = date_create("@" . $data['timestamp'])->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A");
        $record = array($no, $data['nama'], $data['nim'], $data['kelas'], $datetime);
        fputcsv($f, $record, $delimiter);
    }
    
    mysqli_close($con);
    
    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);

    fclose($f);

    exit;
?>