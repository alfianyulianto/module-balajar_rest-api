// var request = require("request");

// var options = {
//   method: "get",
//   url: "https://api.rajaongkir.com/starter/province",
//   headers: {
//     key: "035e8cfb5b5a0c9633fb329589b5832f",
//   },
// };

// request(options, function (error, response, body) {
//   if (error) throw new Error(error);

// console.log(body);
// });

$.ajax({
  type: "get",
  url: "https://api.rajaongkir.com/starter/province?key=035e8cfb5b5a0c9633fb329589b5832f",
  dataType: "json",
  headers: {
    "Content-Type": "application/x-www-form-urlencoded",
    "Access-Control-Allow-Origin": "*",
  },
  success: (response) => {
    console.log(response);
  },
});
