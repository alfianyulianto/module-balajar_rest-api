<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Services;



class FilterJWT implements FilterInterface
{
  use ResponseTrait;
  public function before(RequestInterface $request, $arguments = null)
  {
    $header = $request->getServer("HTTP_AUTHORIZATION");
    try {
      helper('jwt');    // panggil helper
      $encodedToken = getJWT($header);
      validateJWT($encodedToken);
      return $request;
    } catch (\Throwable $th) {
      return Services::response()->setJSON(
        [
          'error' => $th->getMessage()
        ]
      )->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
    }
  }
  // eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZmlhbnl1bGlhbnRvMzZAZ21haWwuY29tIiwiaWF0IjoxNjU3MDg4MDA2LCJleHAiOjE2NTcwOTE2MDZ9.FtdQt-gLQ2c4VfR-lY-x2flDKogE08uk-VNy4hKeW5A

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
