<?php 
	include 'lib/library.php';

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$nis			= $_GET['nis'];
		$nama_lengkap	= $_GET['nama_lengkap'];
		$jenis_kelamin	= $_GET['jenis_kelamin'];
	//	$kelas			= $_GET['kelas'];
	//	$jurusan		= $_GET['jurusan'];
		$alamat			= $_GET['alamat'];
		$goldar			= $_GET['goldar'];
		$ibu			= $_GET['ibu'];

		if (!empty($nis)) {
			$sql = "DELETE FROM siswa WHERE nis = '$nis'";

			if ($mysqli->query($sql)) {
				echo 1;
			} else {
				echo 0;
			}
		}

		$sql = "DELETE FROM siswa WHERE nis = '$nis'";

		$mysqli->query($sql) or die ($mysqli->error);

		header('location: index.php');
	}
?>