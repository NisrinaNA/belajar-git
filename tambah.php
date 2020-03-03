<?php 
	include 'lib/library.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nis			= @$_POST['nis'];
		$nama_lengkap	= @$_POST['nama_lengkap'];
		$jenis_kelamin	= @$_POST['jenis_kelamin'];
	//	$kelas			= $_POST['kelas'];
	//	$jurusan		= $_POST['jurusan'];
		$alamat			= @$_POST['alamat'];
		$goldar			= @$_POST['goldar'];
		$ibu			= @$_POST['ibu'];
		$kelas 			= @$_POST['id_kelas'];
		$foto			= @$_FILES['foto'];

		if (empty($nis)) { // Jika NIS kosong
			flash('error', 'Mohon masukkan NIS dengan benar!');
		} else if (empty($nama_lengkap)) { // Jika nama lengkap kosong
			flash('error', 'Mohon masukkan Nama Lengkap dengan benar!');
		} else {
			// Pada baris ini, validasi sudah dilakukan untuk semua field
		}

		if (!empty($foto) AND $foto['error'] == 0) {
			$path = './media/images/';
			$upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

			if (!$upload) {
				flash('error', "Upload file gagal");
				header('location: index.php');
			}
			$file = $foto['name'];
		}

		$sql = "INSERT INTO siswa (nis, nama_lengkap, jenis_kelamin, alamat, goldar, ibu, id_kelas, file) VALUES ('$nis', '$nama_lengkap', '$jenis_kelamin', '$alamat', '$goldar', '$ibu', '$kelas', '$file')";
		$mysqli->query($sql) or die ($mysqli->error);

		header ('location: index.php');
	}

	$success	= flash('success');
	$error		= flash('error');

	// ambil data kelas
	$sql = "SELECT * FROM t_kelas";
	$dataKelas = $mysqli->query($sql) or die ($mysqli->error);

	include 'views/v_tambah.php';
?>