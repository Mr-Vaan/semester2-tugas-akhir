<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS PERTEMUAN 8 -->
<?php
class database{
	
	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db   = "toko";
	var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
	}

	// ======================== Barang ===========================

	// ====== Tambah Barang ======
	function input_barang($kd_barang, $nm_barang, $harga, $stok, $distributor,$ket,$foto_baru){
		$query = "Insert into tbl_barang values('$kd_barang','$nm_barang','$harga','$stok','$distributor','$ket','$foto_baru')";

		$insert = mysqli_query($this->koneksi, $query);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	// ====== Read Semua Barang ======

	function data_barang(){
		if(isset($_POST['cari'])){
			$cari = $_POST['cari'];
			$data_barang = mysqli_query($this->koneksi,"SELECT tbl_barang.*, tbl_distributor.* FROM tbl_barang INNER JOIN tbl_distributor ON tbl_barang.distributor = tbl_distributor.kd_distributor WHERE tbl_barang.kd_barang LIKE '%$cari%' OR tbl_barang.nm_barang LIKE '%$cari%' OR harga LIKE '%$cari%' OR stok LIKE '%$cari%' OR nm_distributor LIKE '%$cari%'");
			while ($row = mysqli_fetch_array($data_barang)) {
				$hasil_barang[] = $row;
			}
			return $hasil_barang;
		} else {
			$data_barang = mysqli_query($this->koneksi,"SELECT tbl_barang.*, tbl_distributor.* FROM tbl_barang INNER JOIN tbl_distributor ON tbl_barang.distributor = tbl_distributor.kd_distributor");
			while ($row = mysqli_fetch_array($data_barang)) {
				$hasil_barang[] = $row;
			}
			return $hasil_barang;
		}
		
		// $data_barang = mysqli_query($this->koneksi,"select tbl_barang.*, tbl_distributor.* from tbl_barang JOIN tbl_distributor ON tbl_barang.distributor = tbl_distributor.kd_distributor");
		// // while($row = mysqli_fetch_array($data_barang)){
		// // 	$hasil_barang[] = $row;
		// // }
		// return $data_barang;
	}

	// ====== Update Barang ======
	function update_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket)
    {
		// query sql insert ke database
        $query = "UPDATE tbl_barang SET nm_barang='$nm_barang', harga='$harga', stok='$stok', distributor='$distributor', ket='$ket' WHERE kd_barang='$kd_barang'";

        // eksekusi query
        $update = mysqli_query($this->koneksi, $query);
        if ($update) {
            return true;
        } else {
            return false;
        }

        // $query = mysqli_query($this->koneksi, "update tbl_barang set nm_barang='$nm_barang', harga='$harga', stok='$stok', distributor='$distributor', ket='$ket', foto='$foto_baru' where kd_barang='$kd_barang'");
        // return $query;
    }

	function tampil_update_barang($kd_barang) {
		$data_barang = mysqli_query($this->koneksi, "select * from tbl_barang where kd_barang='$kd_barang'");
		$hasil = mysqli_fetch_array($data_barang);
		return $hasil;
	}
	// ====== Delete Barang ======
	function delete_barang($kd_barang)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tbl_barang WHERE kd_barang='$kd_barang'")->fetch_array();
        // die(var_dump($data));
        if (file_exists("../views/administrator/dokumen/" . $data['foto'])) {
            unlink("../views/administrator/dokumen/" . $data['foto']);
        }

        $query = "DELETE FROM tbl_barang WHERE kd_barang='$kd_barang'";
        $delete = mysqli_query($this->koneksi, $query);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
		// $data = mysqli_query($this->koneksi, "select * from tbl_barang where kd_barang='$kd_barang'")->fetch_array();
		// // unlink("../img/".$data['foto']);
		
		// if (file_exists("Dokumen/" .$data['foto'])) {
        //     unlink('Dokumen/'. $data['foto']);
        // }
        // $query = "delete from tbl_barang where kd_barang='$kd_barang'";
        // $delete = mysqli_query($this->koneksi, $query);
        // if ($delete) {
        //     return true;
        // } else {
        //     return false;
        //}
	// 	$dok = mysqli_query($this->koneksi,"Select * from tbl_barang where kd_barang = '$kd_barang' ");
	// 	$data_file = $dok->fetch_array();
	// 	unlink(''.$data_file['foto']);

	// 	$query = mysqli_query($this->koneksi,"Delete from tbl_barang where kd_barang = '$kd_barang' ");
	// }
	
	//------------------ Distributor --------------------------
	function data_distributor(){
		if (isset($_POST['cari'])) {
			$cari = $_POST['cari'];
			$data_distributor = mysqli_query($this->koneksi,"SELECT * FROM tbl_distributor WHERE kd_distributor LIKE '%$cari%' OR nm_distributor LIKE '%$cari%'");
			while ($row = mysqli_fetch_array($data_distributor)) {
				$hasil_distributor[] = $row;
			}
			return $hasil_distributor;
		} else {
			$data_distributor = mysqli_query($this->koneksi,"SELECT * FROM tbl_distributor");
			while ($row = mysqli_fetch_array($data_distributor)) {
				$hasil_distributor[] = $row;
			}
			return $hasil_distributor;
		}
		// $data_distributor = mysqli_query($this->koneksi,"select * from tbl_distributor");
		// while($row = mysqli_fetch_array($data_distributor)){
		// 	$hasil_distributor[] = $row;
		// }
		// return $data_distributor;
	}
	// ====== Insert Distributor ======
	function input_distributor($kd_distributor, $nm_distributor, $alamat, $nohp,$pemilik, $tipe_produk){
		mysqli_query($this->koneksi,"Insert into tbl_distributor values ('$kd_distributor','$nm_distributor','$alamat','$nohp','$pemilik', '$tipe_produk')");
	}
	// ====== Tampil Update Distributor ======
	function tampil_update_distributor($kd_distributor) {
		$query = mysqli_query($this->koneksi,"Select * From tbl_distributor where kd_distributor = '$kd_distributor' ");
		return $query->fetch_array();
	}

	// ====== Update Distributor ======
	function update_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk){
		$query = mysqli_query($this->koneksi,"Update tbl_distributor set nm_distributor = '$nm_distributor', alamat = '$alamat', nohp = '$nohp', pemilik = '$pemilik', tipe_produk = '$tipe_produk' where kd_distributor = '$kd_distributor' ");
	}

	// ====== Delete Distributor ======
	function delete_distributor($kd_distributor){
		$query = "DELETE FROM tbl_distributor WHERE kd_distributor = '$kd_distributor'";
		$delete = mysqli_query($this->koneksi, $query);
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}


	//  ================================ Data Barang Masuk =====================================
	function data_barang_masuk($dari = false, $sampai = false){
		if ($dari && $sampai) {
            $query = "SELECT * FROM tbl_barang_masuk LEFT JOIN tbl_barang ON tbl_barang_masuk.kd_barang=tbl_barang.kd_barang LEFT JOIN tbl_distributor ON tbl_barang_masuk.kd_distributor=tbl_distributor.kd_distributor WHERE tbl_barang_masuk.tgl_masuk BETWEEN '$dari' AND '$sampai'";
        } else {
            $query = "SELECT * FROM tbl_barang_masuk LEFT JOIN tbl_barang ON tbl_barang_masuk.kd_barang=tbl_barang.kd_barang LEFT JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor";
        }
        $join = mysqli_query($this->koneksi, $query);

        return $join;
		// if (isset($_POST['cari'])) {
		// 	$cari = $_POST['cari'];
		// 	$data_barang_masuk = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang_masuk WHERE kd_barang_masuk LIKE '%$cari%' OR kd_barang LIKE '%$cari%' OR nm_barang LIKE '%$cari%' OR kd_distributor LIKE '%$cari%' OR nm_distributor LIKE '%$cari%' OR tgl_masuk LIKE '%$cari%'");
		// 	while ($row = mysqli_fetch_array($data_barang_masuk)) {
		// 		$hasil_barang_masuk[] = $row;
		// 	}
		// 	return $hasil_barang_masuk;
		// } else {
		// 	$data_barang_masuk = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang_masuk");
		// 	while ($row = mysqli_fetch_array($data_barang_masuk)) {
		// 		$hasil_barang_masuk[] = $row;
		// 	}
		// 	return $hasil_barang_masuk;
		// }

		// $data_barang_masuk = mysqli_query($this->koneksi,"select * from tbl_barang_masuk");
		// while($row = mysqli_fetch_array($data_barang_masuk)){
		// 	$hasil_barang_masuk[] = $row;
		// }
		// return $data_barang_masuk;
	}

	function input_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total, $sisa_stok)
    {
        // query sql insert ke database
        $query = "INSERT INTO tbl_barang_masuk VALUES('$no_ref','$kd_barang','$kd_distributor', '$jumlah', '$tgl_masuk', '$penerima', '$ket', '$total')";

        // eksekusi query
        $insert = mysqli_query($this->koneksi, $query);
        $update = mysqli_query($this->koneksi, "UPDATE tbl_barang SET stok='$sisa_stok' WHERE kd_barang='$kd_barang'");
        if ($insert && $update) {
            return true;
        } else {
            return false;
        }
    }
    // function input_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total, $sisa_stok){
	// 	$query = mysqli_query($this->koneksi,"Insert into tbl_barang_masuk values ('$no_ref','$kd_barang','$kd_distributor','$jumlah','$tgl_masuk','$penerima','$ket','$total','$sisa_stok')");
	// 	$insert = mysqli_query($this->koneksi, $query);
	// 	$update = mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$sisa_stok' WHERE kd_barang = '$kd_barang'");
	// 	if ($insert && $update) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }
	// ====== Tampil Update Barang Masuk ======
	// function tampil_update_barang_masuk($no_ref) {
	// 	$query = mysqli_query($this->koneksi,"Select * From tbl_barang_masuk where no_ref = '$no_ref' ");
	// 	return $query->fetch_array();
	// }
	// // ====== Update Barang Masuk ======
	// function update_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total, $stok){
	// 	$query = mysqli_query($this->koneksi,"Update tbl_barang_masuk set kd_barang = '$kd_barang', kd_distributor = '$kd_distributor', jumlah = '$jumlah', tgl_masuk = '$tgl_masuk', penerima = '$penerima', ket = '$ket', total = '$total', stok = '$stok' where no_ref = '$no_ref' ");
	// }
	// ====== Delete Barang Masuk ======
	// =============================== Data Barang Keluar ================================

	function data_barang_keluar($cari = false) {
		if ($cari) {
			$query = "SELECT * FROM tbl_barang_keluar LEFT JOIN tbl_barang ON tbl_barang_keluar.kd_barang=tbl_barang.kd_barang LEFT JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor WHERE kd_barang_keluar LIKE '%$cari%' OR kd_barang LIKE '%$cari%' OR nm_barang LIKE '%$cari%' OR kd_distributor LIKE '%$cari%' OR nm_distributor LIKE '%$cari%' OR tgl_keluar LIKE '%$cari%'";
		} else {
			$query = "SELECT * FROM tbl_barang_keluar LEFT JOIN tbl_barang ON tbl_barang_keluar.kd_barang=tbl_barang.kd_barang LEFT JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor";
		}
		$join = mysqli_query($this->koneksi, $query);
		return $join;
		// if (isset($_POST['cari'])) {
		// 	$cari = $_POST['cari'];
		// 	$data_barang_keluar = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang_keluar WHERE kd_barang_keluar LIKE '%$cari%' OR kd_barang LIKE '%$cari%' OR nm_barang LIKE '%$cari%' OR kd_distributor LIKE '%$cari%' OR nm_distributor LIKE '%$cari%' OR tgl_keluar LIKE '%$cari%'");
		// 	while ($row = mysqli_fetch_array($data_bar
	}

	function input_barang_keluar($no_ref, $kd_barang, $jumlah, $total, $tanggal_keluar, $diskon, $penerima)
    {
        return mysqli_query($this->koneksi, "insert into tbl_barang_keluar values ('$no_ref', '$kd_barang', '$tanggal_keluar', '$jumlah', '$total', '$diskon', '$penerima')");
    }

	function delete_barang_keluar($no_ref)
    {
        return mysqli_query($this->koneksi, "delete from tbl_barang_keluar where no_ref = '$no_ref'");
    }

	public function tampil_update_barang_keluar($no_ref)
    {
        $query = mysqli_query($this->koneksi, "select * from tbl_barang_keluar JOIN tbl_barang ON tbl_barang_keluar.kd_barang = tbl_barang.kd_barang where no_ref = '$no_ref' ");

        return mysqli_fetch_assoc($query);
    }

	public function update_barang_keluar($no_ref, $kd_barang, $tanggal_keluar, $jumlah, $total, $diskon, $penerima)
    {
        return mysqli_query($this->koneksi, "update tbl_barang_keluar set kd_barang='$kd_barang', tanggal_keluar='$tanggal_keluar', jumlah='$jumlah', total='$total', diskon='$diskon', penerima='$penerima' where no_ref='$no_ref'");
    }

	// ==================================== LOGIN ===================================
	function login_user($username, $password){
		$data = mysqli_query($this->koneksi,"Select * from tbl_user where username = '$username' and password = '$password' ");
		$row = mysqli_num_rows($data);

		if($row > 0) {
			$login = mysqli_fetch_array($data);
			# code...
			if($login['status'] == 'Administrator') {
				session_start();
				$_SESSION['username'] = $login['username'];
				$_SESSION['passuser'] = $login['password'];
				
				echo "<script language = 'JavaScript'>
				confirm('Login Berhasil');
				document.location = '../views/administrator/halaman_admin.php';
				</script>";
			} else if($login['status'] == 'Pegawai') {
				session_start();
				$_SESSION['username'] = $login['username'];
				$_SESSION['passuser'] = $login['password'];
				
				echo "<script language = 'JavaScript'>
				confirm('Login Berhasil');
				document.location = '../views/user/halaman_user.php';
				</script>";
			} else if($login['status'] == 'Pelanggan') {
				session_start();
				$_SESSION['username'] = $login['username'];
				$_SESSION['passuser'] = $login['password'];
				
				echo "<script language = 'JavaScript'>
				confirm('Login Berhasil');
				document.location = '../views/user/halaman_user.php';
				</script>";
			} else {
				echo "<script language = 'JavaScript'>
				confirm('Login Gagal');
				document.location = 'index.php';
				</script>";
			}
		} else{
		echo "<script language = 'JavaScript'>
		document.location = 'login.php';
		</script>";
		}
	}

	// ==================================== LOGOUT ===================================
	function logout(){
		session_start();
		session_destroy();
		echo "<script language = 'JavaScript'>
		document.location = 'login.php';
		</script>";
	}

	// ==================================== RUPIAH ===================================
	function rupiah($rupiah) {
		$hasil_rupiah = "Rp " . number_format($rupiah,2,',','.');
		return $hasil_rupiah;
	}
};



?>