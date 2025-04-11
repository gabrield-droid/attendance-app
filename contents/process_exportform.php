<?php
    include "../library/config.php";

    $query = mysqli_query($con, "SELECT nama, nim, kelas, timestamp FROM records WHERE id_form='$_GET[id]'");
    $records = mysqli_fetch_all($query, MYSQLI_ASSOC);    
    $form_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM forms WHERE id_form='$_GET[id]'"))['name'];
    
    mysqli_close($con);
    
    $filename =  str_replace(" ", "_", $form_name) . '.csv';
    $delimiter = ",";

    $f = fopen("php://memory", "w");
    $fields = array_keys(current($records));

    fputcsv($f, $fields, $delimiter);
    
    foreach ($records as $record) {
        fputcsv($f, $record, $delimiter);
    }

    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);

    fclose($f);

    exit;
?>