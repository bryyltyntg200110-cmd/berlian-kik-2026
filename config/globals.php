<?php
// Daftarkan variabel global di dalam array atau define sebagai konstanta
define('APP_NAME', 'Aplikasi PHP Native + Blade');
define('BASE_URL', 'http://127.0.0');

// Bisa juga menggunakan variabel array global jika nilainya dinamis
$GLOBALS['config'] = [
   'maintenance' => false,
   'version'     => '1.0.0'
];
