function searchMovie() {
  $("#movie-list").html("");

  $.ajax({
    type: "get",
    url: "http://omdbapi.com/",
    data: {
      apikey: "5325cbf7",
      s: $("#search-input").val(),
    },
    dataType: "json",
    success: function (result) {
      if (result.Response == "True") {
        let movies = result.Search;
        // console.log(movies);

        $.each(movies, function (i, data) {
          $("#movie-list").append(`
            <div class="col-md-4">
            <div class="card mb-3" style="width: 18rem;">
              <img src="${data.Poster}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">${data.Title}</h5>
                <h6 class="card-subtitle mb-2 text-muted">${data.Year}</h6>
                <a class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${data.imdbID}">See Detail</a>
              </div>
            </div>
            </div>
          `);
        });
        $("#search-input").val("");
      }
    },
  });
}

// tombol button di klik
$("#search-button").on("click", function () {
  searchMovie();
});

// tombol enter di pencet
$("#search-input").on("keyup", function (e) {
  // console.log(e);

  if (e.which == 13) {
    searchMovie();
  }
});

// tombol see detail di klik
// event bunding
$("#movie-list").on("click", ".see-detail", function () {
  // console.log($(this).data("id"));

  $.ajax({
    type: "get",
    url: "http://omdbapi.com",
    data: {
      apikey: "5325cbf7",
      i: $(this).data("id"),
    },
    dataType: "json",
    success: function (movie) {
      // console.log(movie);

      if (movie.Response == "True") {
        $(".modal-body").html(`
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <img src="${movie.Poster}" class="img-fluid" alt="">
            </div>
            <div class="col-md-8">
              <ul class="list-group">
                <li class="list-group-item"><h3>${movie.Title}</h3></li>
                <li class="list-group-item">Released : ${movie.Released}</li>
                <li class="list-group-item">Genre : ${movie.Genre}</li>
                <li class="list-group-item">Actors : ${movie.Actors}</li>
              </ul>
            </div>
          </div>
        </div>`);
      }
    },
  });
});
