// // JSON.stringify
// const mahasiswa = {
// 	nama: "Alfian Yulianto",
// 	nim: "L200180121",
// 	email: "L200180121@student.ums.ac.id"
// }
// console.log(JSON.stringify(mahasiswa));


// // JSON.parse
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
// 	if(xhr.readyState == 4 && xhr.status == 200) {
// 		let mahasiswa = JSON.parse(this.responseText);		// merubah apapun response yang berupa JSON menjadi object
// 		console.log(mahasiswa);
// 	}
// }
// xhr.open('get', 'coba.json', true);		// true jika asynchronouse
// xhr.send();

// JQuery
$.getJSON('coba.json', function(data) {
	console.log(data);	// dengan JQuery data yang awalnya JSON langsung menjadi object tanpa di parse
});