<?php

use App\Models\OtentikasiModel;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWT($otentikasiHeader)
{
  if (is_null($otentikasiHeader)) {
    throw new Exception("Otentikasi JWT Gagal");
  }
  return explode(" ", $otentikasiHeader)[1];
}

// cek apakah JWT yang dikirim client untuk mengakses rest api apakah valid
function validateJWT($encodedToken)
{
  // ambil key yang sudah di set pada .env
  $key = getenv('JWT_SECRET_KEY');
  // return $key;

  // JWT::decode() - untuk decoding sebuah string JWT
  // ada 3 parameter 
  // parameter pertama string JWT
  // parameetr kedua key
  // parameetr ketiga algoritma
  // $decodedToken = JWT::decode($encodedToken, $key, ['HS256']);
  $decodedToken = JWT::decode($encodedToken,  new Key($key, 'HS256'));
  $otentikasiModel = new OtentikasiModel();
  $otentikasiModel->getEmail($decodedToken->email); // ketika seorang client mengirimkan dari JWT ketika ingin melakukan request ke pada server maka juga akan mengirimkan data berupa email
}

// create JWT
function createJWT($email)
{
  $waktuRequest = time();
  $waktuToken = getenv('JWT_TIME_TO_LIVE');
  $waktuExpired = $waktuRequest + $waktuToken;

  $payload = [    // buat data
    'email' => $email,
    'iat' => $waktuRequest,
    'exp' => $waktuExpired
  ];

  // JWT::encode() - untuk encoding JWT
  // ada 3 parameter
  // parameter pertama payload atau data 
  // parameter kedua key 
  // parameter ketiga algoritma
  $jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'), 'HS256');
  return $jwt;
}
