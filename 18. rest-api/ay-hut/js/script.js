function tampilMenu() {
  $.getJSON("data/pizza.json", function (data) {
    // console.log(data);

    let menu = data.menu;
    // console.log(menu);

    // format rupian
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }

      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    $.each(menu, function (i, data) {
      // console.log(i); // index
      // console.log(data); // data

      $("#daftar-menu").append(`
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="img/menu/${data.gambar}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${data.nama}</h5>
          <p class="card-text">${data.deskripsi}</p>
          <h5 class="card-title">${formatRupiah(`${data.harga}`, "Rp. ")}</h5>
          <a href="#" class="btn btn-primary">Pesan Sekarang</a>
        </div>
      </div>
    </div>`);
    });
  });
}
tampilMenu();

// tombol li di klik
$(".nav-link").on("click", function () {
  $(".nav-link").removeClass("active"); // hapus kelas active
  $(this).addClass("active"); // tambahkan kelas active di link yang di klik

  let kategori = $(this).html(); // ambil isi html dari link yang di klik
  $("h1").html(kategori);

  // jika yang di klik All Menu
  if (kategori == "All Menu") {
    $("#daftar-menu").html("");
    return tampilMenu();
  }

  $.getJSON("data/pizza.json", function (data) {
    // console.log(data);

    let menu = data.menu;
    // console.log(menu);
    let content = "";

    // format rupian
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }

      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    $.each(menu, function (i, data) {
      // console.log(i);
      // console.log(data);

      // cek apakah menunya sesuai dengan kategori yang di klik
      if (data.kategori == kategori.toLowerCase()) {
        content += `<div class="col-md-4">
          <div class="card mb-3">
            <img src="img/menu/${data.gambar}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">${data.nama}</h5>
              <p class="card-text">${data.deskripsi}</p>
              <h5 class="card-title">${formatRupiah(
                `${data.harga}`,
                "Rp. "
              )}</h5>
              <a href="#" class="btn btn-primary">Pesan Sekarang</a>
            </div>
          </div>
        </div>`;
      }
    });

    $("#daftar-menu").html(content);
  });
});
