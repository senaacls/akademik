<?php
include("config.php");
if(isset($_POST['simpan']))
{
	$nim 			= htmlentities($_POST['nim']);
	$matakuliah 	= htmlentities($_POST['matakuliah']);
	$jumlahsks 		= htmlentities($_POST['sks']);
	$semester		= htmlentities($_POST['semester']);
	$grade 			= htmlentities($_POST['grade']);
	
	$result = simpannilai($nim,$matakuliah,$jumlahsks,$semester,$grade);
	header("location: grade.php?nim=$nim");
}