<?php
include("config.php");
$matakuliah= $_GET['matakuliah'];
if(isset($matakuliah));
{
	$result=hapusdata($matakuliah);
	header("location: mahasiswa.php");
}
	