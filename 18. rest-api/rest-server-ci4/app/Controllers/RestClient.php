<?php

namespace App\Controllers;

class RestClient extends BaseController
{

  public function index()
  {
    // MENGGUNAKAN JAVASCRIPT
    // return view('tamplate/rest-client');

    // $client = new \GuzzleHttp\Client();
    // $headers = [
    //   'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZmlhbnl1bGlhbnRvMzZAZ21haWwuY29tIiwiaWF0IjoxNjU3ODU1NzM5LCJleHAiOjE2NTc5NDIxMzl9.RSA3vnnoZpC1Oh9np3HVpHARFe15Flyw9iBmYTIm8vw'
    // ];
    // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://localhost:8080/mahasiswa', $headers);
    // $res = $client->sendAsync($request)->wait();
    // echo $res->getBody();


    // $client = new \GuzzleHttp\Client();
    // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZmlhbnl1bGlhbnRvMzZAZ21haWwuY29tIiwiaWF0IjoxNjU3Njg4NDY0LCJleHAiOjE2NTc3NzQ4NjR9.ffst39HlTGu85uL0YuymTYEr7xrmZ107MaeErUssCLwc";
    // $url = "http://localhost:8080/mahasiswa";
    // $headers = [
    //   'auth' => 'Bearer ' . $token,
    // ];
    // $res = $client->request('GET', $url, [
    //   'auth' => ['user', 'pass']
    // ]);
    // echo $res->getBody();

    // $client = new \GuzzleHttp\Client();
    // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZmlhbnl1bGlhbnRvMzZAZ21haWwuY29tIiwiaWF0IjoxNjU3ODU1NzM5LCJleHAiOjE2NTc5NDIxMzl9.RSA3vnnoZpC1Oh9np3HVpHARFe15Flyw9iBmYTIm8vw";
    // $url = "http://localhost:8080/mahasiswa";
    // $res = $client->request('GET', $url, [
    //   'auth' => "Bearer " . $token,
    // ]);
    // echo $res->getBody();

    // $url = "http://localhost:8080/mahasiswa";
    // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZmlhbnl1bGlhbnRvMzZAZ21haWwuY29tIiwiaWF0IjoxNjU3ODU1NzM5LCJleHAiOjE2NTc5NDIxMzl9.RSA3vnnoZpC1Oh9np3HVpHARFe15Flyw9iBmYTIm8vw";
    // $options = array('http' => array(
    //   'method'  => 'GET',
    //   'header' => 'Authorization: Bearer ' . $token
    // ));
    // $context  = stream_context_create($options);
    // $response = file_get_contents($url, false, $context);
    // $data = json_decode($response, true);
    // echo $data;
  }
}
