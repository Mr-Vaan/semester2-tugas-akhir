<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS PERTEMUAN 8 -->
<?php
include ('../model/database.php');
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "tambah") {
    $db->input_distributor(
        $_POST["kd_distributor"],
        $_POST["nm_distributor"],
        $_POST["alamat"],
        $_POST["nohp"],
        $_POST["pemilik"],
        $_POST["tipe_produk"]
        );
        echo "<script>alert('Data Perusahaan Berhasil Ditambahkan');</script>";
        echo "<script>location='../views/administrator/data_distributor.php';</script>";
    // echo "<script language = 'JavaScript'>
    //     alert('DATA ANDA BERHASIL DITAMBAHKAN');
    //     document.location = 'data_distributor.php';
    //     </script>
    //     ";
} else if($aksi == "update"){
    $db->update_distributor(
        $_POST["kd_distributor"],
        $_POST["nm_distributor"],
        $_POST["alamat"],
        $_POST["nohp"],
        $_POST["pemilik"],
        $_POST["tipe_produk"]
        );       
        echo "<script language = 'JavaScript'>
            alert('Data Perusahaan Berhasil di Update');
            document.location = '../views/administrator/data_distributor.php';
            </script>
            ";
            
    // echo "<script language = 'JavaScript'>
    //     alert('DATA ANDA BERHASIL DIUPDATE');
    //     document.location = 'data_distributor.php';
    //     </script>";
} else if ($aksi == "delete") {

    $kd_distributor = $_GET['id'];
    if ($kd_distributor) {
        $delete = $db->delete_distributor($kd_distributor);
        if ($delete != null) {
            echo "<script> alert('Data Perusahaan Berhasil dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
        } else {
            echo "<script> alert('Data Perusahaan Gagal dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
        }
    } else {
        echo "<script> alert('Data Perusahaan Tidak ditemukan!')</script>";
        echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
    }
} else {
    echo `  
            <div class="alert alert-danger" role="alert">
                <strong>Data gagal disimpan! </strong><a href=../views/administrator/>data_distributor.php>Klik Disini!</a>
            </div>
        `;
}; 

    // if ($db->delete_distributor($kd_distributor)) {
    //     echo "
    //     <script language = 'JavaScript'>
    //     alert('Berhasil Menghapus Data Perusahaan');window.location.href='../views/administrator/data_distributor.php';
    //     </script>
    //     ";
    // } else {
    //     echo "
    //     <script language = 'JavaScript'>
    //     alert('Gagal Menghapus Data Perusahaan');window.location.href='../views/administrator/data_distributor.php';
    //     </script>
    //     ";
    // }

//     $delete = $db->delete_distributor($kd_distributor);
    
// } else {
//     echo "Database anda eror, silahkan proses kembali lg <a href='data_distributor.php?'>Klik disini</a>";
// }