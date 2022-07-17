<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<?php 
function update_data() { 
    $db = new database();
    $kd_distributor = $_GET['id'];
    $distributor = $db->tampil_update_distributor($kd_distributor);
    $data_barang = $db->data_barang();
?>

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
        Update Distributor</h3>

    <form method="POST" action="<?php echo"../../process/proses_distributor.php?aksi=update"; ?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Kode Distributor</label>
            <input type="text" name="kd_distributor" class="form-control" placeholder="Masukkan Kode Distributor"
                value="<?= $distributor['kd_distributor'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Distributor</label>
            <input type="text" name="nm_distributor" class="form-control" placeholder="Masukkan Nama Distributor"
                value="<?= $distributor['nm_distributor'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Anda Sebagai Distributor"
                value="<?= $distributor['alamat'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="nohp" class="form-control" placeholder="Masukkan Nomor Handphone"
                value="<?= $distributor['nohp'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Pemilik</label>
            <input type="text" name="pemilik" class="form-control" placeholder="Nama Pemilik"
                value="<?= $distributor['pemilik'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe Produk</label>
            <input type="text" name="tipe_produk" class="form-control" placeholder="Masukkan Tipe Produk"
                value="<?= $distributor['tipe_produk'] ?>">
        </div>

        <div class="mb-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="Update Data">
            <a href="data_distributor.php" class="btn btn-success">Kembali</a>
        </div>
    </form>
</div>

<?php }

function Tambah_data() { ?>
<!-- ==================================== BATAS ======================================== -->
<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
        Registrasi Distributor</h3>

    <form method="POST" action="<?php echo"../../process/proses_distributor.php?aksi=tambah"; ?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Kode Distributor</label>
            <input type="text" name="kd_distributor" class="form-control" placeholder="Masukkan Kode Distributor">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Distributor</label>
            <input type="text" name="nm_distributor" class="form-control" placeholder="Masukkan Nama Distributor">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Perusahaan Anda">
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="nohp" class="form-control" placeholder="Masukkan Nomor Handphone">
        </div>

        <div class="mb-3">
            <label class="form-label">Pemilik</label>
            <input type="text" name="pemilik" class="form-control" placeholder="Nama Pemilik">
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe Produk</label>
            <input type="text" name="tipe_produk" class="form-control" placeholder="Masukkan Tipe Produk">
        </div>

        <div class="mb-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
            <input type="reset" class="btn btn-secondary" value="Reset">
        </div>

    </form>

</div>

<?php } ?>

<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if ($edit == "update") {
    Update_data();
} else {
    Tambah_data();
}

?>