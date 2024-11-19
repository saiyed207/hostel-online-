<?php

$file = isset($_GET['file']) ? $_GET['file'] : null;

if ($file) {

    $fileDir = __DIR__ . DIRECTORY_SEPARATOR . $file;

    if (file_exists($fileDir)) {
     
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileDir) . '"');
        header('Content-Length: ' . filesize($fileDir));
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        
        readfile($fileDir);
        exit;
    } else {
       
        echo 'File not found.';
    }
} else {
   
    echo 'Invalid file parameter.';
}
?>
