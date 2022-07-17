<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<?php
function update_data() {
    $db = new database();
    $kd_barang = $_GET['id'];
    $barang = $db->tampil_update_barang($kd_barang);
    $data_distributor = $db->data_distributor();
?>

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
        Update Barang</h3>
    <form method="POST" action="<?php echo"../../process/proses_barang.php?aksi=update"; ?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kd_barang" class="form-control" placeholder="Masukkan Kode Barang"
                value="<?php echo $barang['kd_barang'] ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nm_barang" class="form-control" placeholder="Masukkan Nama Barang"
                value="<?php echo $barang['nm_barang'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Barang</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang"
                value="<?php echo $barang['harga'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok Barang</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Barang"
                value="<?php echo $barang['stok'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Distributor</label>
            <select name="distributor" class="form-control">
                <option value="<?php echo $barang['distributor'] ?>"><?php echo $barang['distributor'] ?></option>
                <?php
                    foreach ($data_distributor as $row) {
                    ?>
                <option value="<?php echo $row['kd_distributor'] ?>"><?php echo $row['nm_distributor'] ?></option>
                <?php
                    }
                    ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan Barang</label>
            <textarea class="form-control" name="ket" rows="3"
                placeholder="Masukkan Keterangan Barang"><?php echo $barang['ket'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Barang</label>
            <input type="file" name="foto" class="form-control" placeholder="Masukkan Foto Gambar">
        </div>

        <div class="mb-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="Update Data">
            <a href="data_barang.php" class="btn btn-success">Kembali</a>
        </div>
    </form>
</div>

<?php } ?>
<?php  
function tambah_data() { 

    $db = new database();
    $data_distributor = $db->data_distributor();
    ?>
<!-- --------------------------------- BATAS ------------------------------------- -->

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input
        Barang</h3>

    <form method="POST" action="<?php echo"../../process/proses_barang.php?aksi=tambah"; ?>"
        enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kd_barang" class="form-control" placeholder="Masukkan Kode Barang"
                value="KD<?= rand(1000, 9999) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nm_barang" class="form-control" placeholder="Masukkan Nama Barang">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Barang</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok Barang</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Barang">
        </div>

        <div class="mb-3">
            <label class="form-label">Distributor</label>
            <select name="distributor" class="form-control" id="distributor">
                <option selected disabled>Default</option>
                <?php foreach ($data_distributor as $row) :; ?>
                <option value="<?= $row['kd_distributor']; ?>"><?= $row['nm_distributor']; ?></option>
                <?php endforeach;; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan Barang</label>
            <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Barang"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Barang</label>
            <input type="file" rows="3" name="foto" class="form-control" onclick="img(this)"
                placeholder="Masukkan Foto Gambar">
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
    update_data();
} else {
    tambah_data();
}
?>