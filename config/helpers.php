<?php
// Helper untuk mempermudah dump data (seperti dd() di Laravel)
if (!function_exists('dd')) {
   function dd($data)
   {
      echo "<pre style='background: #222; color: #a9f73d; padding: 20px; border-radius: 5px;'>";
      print_r($data);
      echo "</pre>";
      die();
   }
}

// Helper untuk mengamankan input dari XSS
if (!function_exists('sanitize')) {
   function sanitize($string)
   {
      return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
   }
}
