<?php

class UserModel
{
   private $db;

   public function __construct($pdo)
   {
      // Menerima instance PDO dari luar (Dependency Injection)
      $this->db = $pdo;
   }

   // Mengambil semua data user
   public function getAllUsers()
   {
      $stmt = $this->db->query("SELECT * FROM appUser");
      return $stmt->fetchAll();
   }

   // Mengambil user berdasarkan ID
   public function findById($id)
   {
      $stmt = $this->db->prepare("SELECT * FROM appUser WHERE id = :id");
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();
   }
}
