<?php
// bootstrap code

$command = $_POST['command'];

if('handle-onedrive-file' === $command) {
 $file_name = $_POST['file_name'];
 //$file_size = $_POST['file_size'];
 $download_url = $_POST['download_url'];

 $ch = curl_init($download_url);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);

 $data = curl_exec($ch);
 $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
 $error = curl_errno($ch);
 curl_close($ch);

 // A file with the same name may exist, that must be handled.
 $file_save_path = '/some/path/' . $file_name;

 file_put_contents($file_save_path, $data);

 echo 'File successfully retrieved and stored!';
}
?>