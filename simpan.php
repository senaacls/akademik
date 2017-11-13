<?php
require_once "config.php";
if(isset($_POST['simpan']))
{
	$nim 		= filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_STRING);
	$nama 		= filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
	$alamat 	= filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
	$gender 	= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
	$fakultas 	= filter_input(INPUT_POST, 'fakultas', FILTER_SANITIZE_STRING);

	$gambar 	= $_FILES['foto']['name'];
	$tmp_dir 	= $_FILES['foto']['tmp_name'];
	$imagesize 	= $_FILES['foto']['size'];

	$dir = "images/";
    $target_file = $dir.basename($gambar);
	$imgext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$valid	= array('jpeg', 'jpg', 'png');

	if(in_array($imgext, $valid))
	{   
    	if($imagesize < 5000000)
    	{
    		move_uploaded_file($tmp_dir, $target_file);
			try{
				simpan($nim, $nama, $alamat, $gender, $fakultas, $target_file);
				header("location: mahasiswa.php");
			}catch (PDOException $e){
		        echo "ERROR : " . $e->getMessage();
		    }
    	}
    }
}

?>