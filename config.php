<?php
define("DB_USER", "root");
define("DB_PASSWORD", "daksa");
define("DB_DATABASE", "akademik");
define("DB_HOST", "localhost");

try {
    $conn = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

function listmahasiswa()
{
	global $conn;
	
	$sql = "select * from mahasiswa ";
	$stmt = $conn->prepare($sql);
	
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_NUM);

}

function simpan($nim,$nama,$alamat,$gender,$fakultas,$foto)
{
	global $conn;
	
	$sql = "insert into mahasiswa(nim,nama,alamat,gender,fakultas,foto) ";
	$sql .= " values(?,?,?,?,?,?)";
	
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $nim, PDO::PARAM_STR);
	$stmt->bindParam(2, $nama, PDO::PARAM_STR);
	$stmt->bindParam(3, $alamat, PDO::PARAM_STR);
	$stmt->bindParam(4, $gender, PDO::PARAM_STR);
	$stmt->bindParam(5, $fakultas, PDO::PARAM_STR);
	$stmt->bindParam(6, $foto);

	$stmt->execute();
	
	return true;
}

function hapus($nim)
{
	global $conn;
	
	$sql = "delete from mahasiswa where nim =  :nim";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nim', $nim);   
	$stmt->execute();

	return true;
}

function getdata($nim)
{
	global $conn;
	
	$sql = "select *  from mahasiswa WHERE nim =  :nim";
	$stmt = $conn->prepare($sql);
	$stmt->execute(array(":nim"=>$nim));
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	return $result;
}


function changedata($nim,$nama,$alamat,$gender,$fakultas)
{
	global $conn;
	
	$sql = " update mahasiswa set nama =:nama,alamat =:alamat, gender =:gender, fakultas =:fakultas ";
	$sql .= " where nim =:nim ";
	
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":nim", $nim);
	$stmt->bindParam(":nama", $nama);
	$stmt->bindParam(":alamat", $alamat);
	$stmt->bindParam(":gender", $gender);
	$stmt->bindParam(":fakultas", $fakultas);
	
	$stmt->execute();
	
	return true;
}

function nilai($nim)
{
	global $conn;
	
	$sql = "select * from nilai WHERE nim =  :nim";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nim', $nim);
	$stmt->execute();
	
	return $stmt;
}

function simpannilai($nim,$matakuliah,$jumlahsks,$semester,$grade)
{
	global $conn;
	
	$sql = "insert into nilai(nim,matakuliah,jumlahsks,semester,grade) ";
	$sql .= " values(?,?,?,?,?)";
	
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $nim);
	$stmt->bindParam(2, $matakuliah);
	$stmt->bindParam(3, $jumlahsks);
	$stmt->bindParam(4, $semester);
	$stmt->bindParam(5, $grade);

	$stmt->execute();
	
	return true;
}


function hapusdata($matakuliah)
{
	global $conn;
	
	$sql = "delete from nilai where matakuliah =  :matakuliah";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':matakuliah', $matakuliah);   
	$stmt->execute();

	return true;
}

