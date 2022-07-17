<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS PERTEMUAN 8 -->
<?php
include ('../model/database.php');
$db = new Database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

    //ambil data barang berdasarkan kode barang
    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

    //mencari total harga 
    $total_harga = $data_barang['harga'] * $_POST['jumlah'];

    // mencari harga diskon
    $harga_diskon = $total_harga * $_POST['diskon'] / 100;

    // total byar setelah diskon
    $total_setelah_diskon = $total_harga - $harga_diskon;

    // $data = array(
    //     $_POST['no_ref'],
    //     $_POST['kd_barang'],
    //     $_POST['tanggal_keluar'],
    //     $_POST['jumlah'],
    //     $total_setelah_diskon,
    //     $harga_diskon,
    //     $_POST['penerima']
    // );
    $add = $db->input_barang_keluar(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['jumlah'],
        $total_setelah_diskon,
        $_POST['tanggal_keluar'],
        $_POST['diskon'],
        $_POST['penerima'],
    );

    if ($add) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Disimpan');
        document.location='../views/administrator/data_barang_keluar.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Disimpan');
        document.location='../views/administrator/data_barang_keluar.php';
        </script>
        ";
    }
} else if ($aksi == "update") {
    //ambil data barang berdasarkan kode barang
    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

    //mencari total harga 
    $total_harga = $data_barang['harga'] * $_POST['jumlah'];

    // mencari harga diskon
    $harga_diskon = $total_harga * $_POST['diskon'] / 100;

    // total byar setelah diskon
    $total_setelah_diskon = $total_harga - $harga_diskon;

    $upd = $db->update_barang_keluar(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['tanggal_keluar'],
        $_POST['jumlah'],
        $total_setelah_diskon,
        $_POST['diskon'],
        $_POST['penerima']
    );

    if ($upd) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Diperbarui');
        document.location='../views/administrator/data_barang_keluar.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Diperbarui');
        document.location='../views/administrator/data_barang_keluar.php';
        </script>
        ";
    }
} else if ($aksi == "delete") {
    $no_ref =  $_GET['id'];
    $del = $db->delete_barang_keluar($no_ref);

    if ($del) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Dihapus');
        document.location='../views/administrator/data_barang_keluar.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Dihapus');
        document.location='../views/administrator/data_barang_keluar.php';
        </script>
        ";
    }
} else {
    echo "Database anda error silahkan kembali lagi <a href = '../views/administrator/data_barang_keluar.php?'>Klik Disini</a>";
}