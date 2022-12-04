<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table      = 'mahasiswa';    // nama tabel yang digunakan pada database
  protected $primaryKey = 'id';   // nama fild yang digunakan sebagai primary key

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';    // tipe data yang dikembalika

  protected $allowedFields = ['nrp', 'nama', 'email', 'jurusan'];   // field yang boleh di isi

  protected $validationRules = [
    'nrp' => 'required',
    'nama' => 'required',
    'email' => 'required|valid_email',
    'jurusan' => 'required'
  ];

  protected $validationMessages = [
    'nrp' => [
      'required' => 'Silahkan masukan nrp'
    ],
    'nama' => [
      'required' => 'Silahkan masukan nama'
    ],
    'email' => [
      'required' => 'Silahkan masukan email',
      'valid_email' => 'Email yang dimasukan tidak valid',
    ],
    'jurusan' => [
      'required' => 'Silahkan masukan jurusan'
    ],
  ];
}
