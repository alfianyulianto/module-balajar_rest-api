<?php

namespace App\Controllers;

use  CodeIgniter\API\ResponseTrait;
use App\Models\OtentikasiModel;

class Otentikasi extends BaseController
{
  use ResponseTrait;
  public function index()
  {
    $validation = \Config\Services::validation();   // load library
    $validation->setRules([
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'Silahkan masukan email',
          'valid_email' => 'Silahkan masukan email yang valid'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Silahkan masukan password'
        ]
      ]
    ]);
    if (!$validation->withRequest($this->request)->run()) {
      return $this->fail($validation->getErrors());
    }

    $otentikasiModel = new OtentikasiModel();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $data = $otentikasiModel->getEmail($email);   // memanggil fungsi getEmail yang ada di OtentikasiModel
    if (password_verify($data['password'], $password)) {
      return $this->fail("Password tidak sesuai");
    }

    helper('jwt');    // memanggil jwt_helper
    $response = [
      'message' => "Otentikasi berhasil dilakukan",
      'data' => $data,
      'access_token' => createJWT($email)   // menggunakakn fungsi createJWT yang ada di jwt_helper
    ];
    return $this->respond($response);
  }
}
