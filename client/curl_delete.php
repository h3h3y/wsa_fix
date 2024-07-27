<?php
$id = $_GET['id'] ?? '';
$url = "http://localhost:90/wsa0080/web/buku/$id";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
$header = [
    'Authorization: Bearer 100-token'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
header('Location: curl_get.php');


?>