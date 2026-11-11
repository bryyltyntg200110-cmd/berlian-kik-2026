<?php
// 1. Load Autoload Composer (Untuk Blade)
require 'vendor/autoload.php';

// 2. Load File di folder Config
require 'config/database.php'; // Menyediakan variabel $pdo
require 'config/globals.php';  // Menyediakan konstanta & $GLOBALS
require 'config/helpers.php';  // Menyediakan fungsi dd() dan sanitize()

// 3. Load File Model
require 'models/UserModel.php';

use eftec\bladeone\BladeOne;

// 4. Inisialisasi Model & Ambil Data
$userModel = new UserModel($pdo);
$daftarUser = $userModel->getAllUsers(); // Mengambil data dari database

// Contoh penggunaan helper global dd() untuk debug (opsional, hapus jika tidak dipakai)
// dd($daftarUser); 

// 5. Inisialisasi Blade Engine
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
// Di BladeOne, kita bisa mengatur mode error (MODE_DEBUG sangat cocok untuk development)
$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

// 6. Siapkan data untuk View
$data = [
    'title' => APP_NAME, // Menggunakan konstanta global
    'users' => $daftarUser
];

// 7. Render View
// Cara manggilnya sama persis memakai method run() atau render()
echo $blade->run('home', $data);
