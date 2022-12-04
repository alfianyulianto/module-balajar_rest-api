<?php
	$data = file_get_contents('coba.json');
	$mahasiswa = json_decode($data, true);

	var_dump($mahasiswa);
	var_dump($mahasiswa[0]);
	echo $mahasiswa[0]['pembimbing']['pembimbing1'];
?>