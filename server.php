<?php
// server.php

require_once __DIR__ . '/config/globals.php';

$host = defined('APP_HOST') ? APP_HOST : '127.0.0.1';
$port = defined('APP_PORT') ? APP_PORT : '7070';

// 1. Cek apakah port sudah terpakai
$connection = @fsockopen($host, $port);

if (is_resource($connection)) {
   fclose($connection);

   echo "\033[31m[ERROR] Gagal menjalankan server: Port {$port} sudah digunakan oleh aplikasi lain!\033[0m\n\n";
   echo "Silakan gunakan port lain di config/globals.php atau matikan aplikasi tersebut.\n";
   echo "---------------------------------------------------------------------------\n";
   echo "Cara mematikan (kill) port {$port} secara manual:\n\n";

   // Deteksi OS User
   if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      // Panduan untuk Windows
      echo "👉 \033[33mUntuk Windows (Command Prompt / CMD):\033[0m\n";
      echo "   1. Cari PID yang memakai port:\n";
      echo "      netstat -ano | findstr :{$port}\n";
      echo "   2. Kill berdasarkan PID yang ditemukan (misal PID nya 1234):\n";
      echo "      taskkill /PID 1234 /F\n";
   } else {
      // Panduan untuk Linux / macOS (karena path proyekmu /media/..., kemungkinan besar Linux)
      echo "👉 \033[33mUntuk Linux / macOS (Terminal):\033[0m\n";
      echo "   --------------------------------------------------------\n";
      echo "   check port yg digunakan \033[32m  sudo lsof -i :7070 \033[0m\n";
      echo "   ========================================================\n";
      echo "   Jalankan perintah satu baris ini untuk langsung kill port:\n";
      echo "   \033[32mfuser -k {$port}/tcp\033[0m\n\n";
      echo "   Atau jika butuh akses root:\n";
      echo "   \033[32msudo fuser -k {$port}/tcp\033[0m\n";
   }
   echo "---------------------------------------------------------------------------\n";
   exit(1); // Hentikan script dengan error code
}

// 2. Jika port kosong, jalankan server seperti biasa
echo "Starting PHP development server at http://{$host}:{$port} ...\n";
passthru("php -d display_errors=1 -d display_startup_errors=1 -d error_reporting=E_ALL -S {$host}:{$port}");
