var settings = {
  "url": "http://localhost:8080/mahasiswa",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZmlhbnl1bGlhbnRvMzZAZ21haWwuY29tIiwiaWF0IjoxNjU3ODU1NzM5LCJleHAiOjE2NTc5NDIxMzl9.RSA3vnnoZpC1Oh9np3HVpHARFe15Flyw9iBmYTIm8vw"
  },
};

$.ajax(settings).done(function (response) {
  console.log(response);
});