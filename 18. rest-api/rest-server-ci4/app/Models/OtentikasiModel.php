<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class OtentikasiModel extends Model
{
  protected $table      = 'otentikasi';    // nama tabel yang digunakan pada database
  protected $primaryKey = 'id';   // nama fild yang digunakan sebagai primary key

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';    // tipe data yang dikembalika

  protected $allowedFields = ['email', 'password'];   // field yang boleh di isi

  function getEmail($email)
  {
    $builder = $this->table("otentikasi");
    $data = $builder->where('email', $email)->first();
    if (!$data) {
      throw new Exception("Data otentikasi tidak ditemukan");
    }
    return $data;
  }
}
