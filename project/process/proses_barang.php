<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS PERTEMUAN 8 -->
<?php
include ('../model/database.php');
$db = new database();

$aksi = $_GET['aksi'];
	if($aksi == "tambah"){
		$foto 		= $_FILES['foto']['name'];
		$file_tmp	= $_FILES['foto']['tmp_name'];
		$angka_acak	= rand(1,9999);
		$foto_baru	= $angka_acak.'-'.$foto;
		$folder		= "../views/administrator/Dokumen/";

		$images = move_uploaded_file($file_tmp, $folder .$foto_baru);
	
		if($images) {
			$db->input_barang(
				$_POST['kd_barang'],
				$_POST['nm_barang'],
				$_POST['harga'],
				$_POST['stok'],
				$_POST['distributor'],
				$_POST['ket'],
				$foto_baru
			);
			echo "
			<script language = 'JavaScript'>
				alert('Data Barang Berhasil Di Tambah!');window.location.href='../views/administrator/data_barang.php';
			</script>
			";
		} else {
			echo "
			<script language = 'JavaScript'>
			alert('DATA ERROR NOT FOUND');
			document.location='../views/administrator/data_barang.php';
			</script>
			";
		}
	} else if($aksi == "update"){
		$kd_barang = $_POST['kd_barang'];
		if ($kd_barang != null){
			$update = $db->update_barang(
				$_POST['kd_barang'],
				$_POST['nm_barang'],
				$_POST['harga'],
				$_POST['stok'],
				$_POST['distributor'],
				$_POST['ket']
				);
			
			if($update) {
				// Pesam berhasil
				echo "<script>alert('Data Item Berhasil Di Update');</script>";
				// Redirect 
				echo "<script>location='../views/administrator/data_barang.php';</script>";
			} else {
				echo '<div class="alert alert-danger" role="alert">
					<strong>Data Item Gagal Di Update </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
				</div>';
			}
		} else {
			echo '
				<div class="alert alert-danger" role="alert">
					<strong>Data ERROR 404 Not Found </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
				</div>
			';
		}
	} else if($aksi == "delete"){
		$kd_barang = $_GET['id'];
		if ($kd_barang != null){
			$delete = $db->delete_barang($kd_barang);
			echo "<script>alert('Data Item Berhasil Di Hapus');</script>";
			echo "<script>location='../views/administrator/data_barang.php';</script>";
		} else {
			echo '
				<div class="alert alert-danger" role="alert">
					<strong>Data ERROR 404 Not Found </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
				</div>
			';
		}
	

		// 	if($delete) {
		// 		// Pesam berhasil
		// 		echo "<script>alert('Data Item Berhasil Di Hapus');</script>";
		// 		// Redirect 
		// 		echo "<script>location='../views/administrator/data_barang.php';</script>";
		// 	} else {
		// 		echo"
		// 		<script language = 'JavaScript'>
		// 		alert('Data Anda Berhasil Di Hapus');
		// 		document.location='../views/administrator/data_barang.php';
		// 		</script>
		// 	";
		// 	}
		// } else {
		// 	echo '
		// 		<div class="alert alert-danger" role="alert">
		// 			<strong>Data ERROR 404 Not Found </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
		// 		</div>
		// 	';
		// }
		// if ($kd_barang) {
		// 	$delete = $db->delete_barang($kd_barang);
		// 	if($delete) {
		// 		// Pesam berhasil
		// 		echo "<script>alert('Data Item Berhasil Di Hapus');</script>";
		// 		// Redirect 
		// 		echo "<script>location='../views/administrator/data_barang.php';</script>";	
		// 	} else {
		// 		echo '
		// 		<div class="alert alert-danger" role="alert">
		// 			<strong>Data Item Gagal di Hapus</strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
		// 		</div>';
		// 	}
		// } else {
		// 	echo '
		// 		<div class="alert alert-danger" role="alert">
		// 			<strong>Data ERROR 404 Not Found</strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
		// 		</div>
		// 	';
		// }
	} 	
















	// 	$db->delete_barang($kd_barang);
	// 	header("location:../../views/administrator/data_barang.php");
	// } else {
	// 	echo "Database anda eror, silahkan proses kembali lg <a href='data_barang.php'>Klik disini</a>";
	// }

?>