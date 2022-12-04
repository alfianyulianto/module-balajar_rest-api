<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;    // library untuk mengeluarkan output / response
use App\Models\MahasiswaModel;    // model

class Mahasiswa extends ResourceController
{
  use ResponseTrait;    // mnegunakan library response

  protected $mahasiswaModel;

  public function __construct()
  {
    // intansiasi model
    $this->mahasiswaModel = new MahasiswaModel();
  }

  // get all mahasiswa
  public function index()
  {
    $data = $this->mahasiswaModel->orderBy('nama', 'asc')->findAll(); // mengurutkan data dari nama secara naik (ascending)

    return $this->respond($data, 200);
  }

  // get mahasiswa by Id
  public function show($id = null)
  {
    $data = $this->mahasiswaModel->where('id', $id)->findAll();

    // cek apakah data ada
    if ($data) {
      return $this->respond($data, 200);
    } else {
      return $this->failNotFound("Data tidak ditemukan untuk id $id");
    }
  }

  // create mahasiswa
  public function create()
  {
    $data = [
      'nrp' => $this->request->getVar('nrp'),
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'jurusan' => $this->request->getVar('jurusan'),
    ];

    $result =  $this->mahasiswaModel->save($data);   // insert ke model

    // validation with model
    if (!$result) {    // jika data di model tidak valid
      return $this->fail($this->mahasiswaModel->errors());
    }

    $response = [
      'status' => 201, //success
      'error' => null,
      'message' => [
        'success' => 'Berhasil memasukan data mahasiswa'
      ]
    ];
    return $this->respond($response);
  }

  //  update mahasiswa by Id
  public function update($id = null)
  {
    $data = $this->request->getRawInput();    // untuk menangkap semua data (put, patch, delete)
    $data['id'] = $id;

    $isExists = $this->mahasiswaModel->where('id', $id)->findAll();   // cek id

    $result =  $this->mahasiswaModel->save($data);   // update ke model

    // cek apakah data nya ditemukan
    if (!$isExists) {    // jika data tidak ditemukan
      return $this->failNotFound("Data tidak ditemukan untuk id $id");
    }

    // jika ada error saat menyimpan
    if (!$result) {
      return $this->fail($this->mahasiswaModel->errors());
    }

    $response = [
      'status' => 200,
      'error' => null,
      'message' => [
        'success' => "Data mahasiswa dengan id $id berhasil di update"
      ]
    ];
    return $this->respond($response);
  }

  // delete mahasiswa by Id
  public function delete($id = null)
  {
    $data = $this->mahasiswaModel->where('id', $id)->findAll();

    if ($data) {
      $this->mahasiswaModel->delete($id);
      $response = [
        'status' => 200,
        'error' => null,
        'message' => [
          'success' => "Data berhasil dihapus"
        ]
      ];

      return $this->respondDeleted($response);
    } else {
      return $this->failNotFound('Data tidak ditemukan');
    }
  }
}
