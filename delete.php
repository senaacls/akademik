<?php
include("config.php");
$nim= $_GET['nim'];
if(isset($nim));
{
	$result=hapus($nim);
	header("location: mahasiswa.php");
}
	