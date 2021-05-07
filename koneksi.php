<?php
/* include file konfigurasi */
$pdo = new PDO('sqlite:db_anisa.sqlite');

$name = $_POST['name'];
$koneksi = $_POST['koneksi'];
$id = $_POST['id'];

$sql = null;
/* operasi tambah atau edit? */
if($koneksi) {
	$sql = "INSERT INTO uploadzipp(name)
		VALUES('$name')";
}

$result = $pdo -> exec($sql);

//apakah operasi data sukses?
if($result) {
	echo '<script>alert("Berhasil!!")</script>';
	header('location:index.php');
} else {
	echo '<script>alert("Gagal!")</script>';
	header('location:index.php');
}
sqlite_close();?>
