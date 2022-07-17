<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS PERTEMUAN 8 -->
<?php
include '../model/database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi == "tambah"){

	//ambil data brang
    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

    //kalkulasi harga
    $total = $_POST['jumlah'] * $data_barang['harga'];
    $sisa_stok = $_POST['stok'] + $_POST['jumlah'];

    $insert = $db->input_barang_masuk(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['kd_distributor'],
        $_POST['jumlah'],
        $_POST['tgl_masuk'],
        $_POST['penerima'],
        $_POST['ket'],
        $total,
        $sisa_stok
    );

    if ($insert) {
		echo "<script>alert('Data Barang Masuk Berhasil Di Tambah');</script>";
		echo "<script>location='../views/administrator/data_barang_masuk.php';</script>";
	} else {
		echo '<div class="alert alert-danger" role="alert">
			<strong>Data Barang Masuk Gagal Di Tambah </strong><a href=../views/administrator/data_barang_masuk.php>Klik Disini!</a>
		</div>';
	}

} else if($aksi == "update"){
	$kd_barang = $_POST['kd_barang'];
	//ambil data brang
    if ($kd_barang != null) {

        $update = $db->update_barang(
            $kd_barang,
            $_POST['nm_barang'],
            $_POST['harga'],
            $_POST['stok'],
            $_POST['distributor'],
            $_POST['ket']
        );

        if ($update) {
            // tampil pesan berhasil
            echo "<script> alert('Data berhasil disimpan!')</script>";

            // redirect jika berhasil
            echo "<script> window.location = '../views/administrator/data_barang_masuk.php'</script>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses update! </strong><a href=../views/administrator/data_barang_masuk.php>Klik Disini!</a>
            </div>';
        }
    } else {
		echo '<div class="alert alert-danger" role="alert">
			<strong>Data Gagal Di Update!!! </strong><a href=../views/administrator/data_barang_masuk.php>Coba Lagi!</a>
		</div>';
	} 
} else if($aksi == "hapus"){
    $kd_barang = $_GET['kd_barang'];
    $delete = $db->delete_barang($kd_barang);
    if ($delete) {
        echo "<script>alert('Data Barang Berhasil Di Hapus');</script>";
        echo "<script>location='../views/administrator/data_barang_masuk.php';</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert">
            <strong>Data Barang Gagal Di Hapus </strong><a href=../views/administrator/data_barang_masuk.php>Klik Disini!</a>
        </div>';
    }
}
?>