<?php
	// $mahasiswa = [
	// 	[
	// 		"nama"=>"Alfian Yulainto",
	// 		"nim"=>"L200180121",
	// 		"email"=>"l200180121@student.ums.ac.id"
	// 	],
	// 	[
	// 	"nama"=>"Erik Doank",
	// 	"nim"=>"L200200200",
	// 	"email"=>"l200200200@student.ums.ac.id",
	// 	]

	// ];
	// var_dump($mahasiswa);
	// $data = json_encode($mahasiswa);
	// echo $data;

	// PDO
	$dbh = new PDO("mysql:host=localhost;dbname=phpmvc", "root", "");
	$db = $dbh->prepare("SELECT * FROM mahasiswa");
	$db->execute();
	$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);
	$data = json_encode($mahasiswa);
	var_dump($data);

?>