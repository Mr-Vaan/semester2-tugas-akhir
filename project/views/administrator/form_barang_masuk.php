<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<!-- UNTUK TOMBOL EDIT DAN DELETE MASIH ERROR -->
<?php
function update_data()
{
	$db = new Database();
	$kd_barang = $_GET["id"];
	$barang = $db->tampil_update_barang($kd_barang);
	$data_distributor = $db->data_distributor();
    $data_barang = $db->data_barang();
    $data_barang_masuk = $db->data_barang_masuk();

    
?>
<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: blue; border-radius: 10px; color: white; padding: 10px;">
        Update Barang Masuk</h3>
    <form method="post" action="<?php echo "../../process/proses_barang_masuk.php?aksi=update"; ?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kd_barang" class="form-control" value="<?php echo $barang['kd_barang'] ?>"
                readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <input type="text" name="nm_barang" class="form-control" placeholder="Masukkan Nama Produk"
                value="<?php echo $barang['nm_barang'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Barang</label>
            <input type="text" min="1" name="harga" class="form-control" placeholder="Masukkan Harga Barang"
                value="<?php echo $barang['harga'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok Barang</label>
            <input type="text" min="1" name="stok" class="form-control" placeholder="Masukkan Stok Barang"
                value="<?php echo $barang['stok'] ?>">
        </div>

        <div class="mb-3">
            <label for="distributor">Distributor</label>
            <select class="form-control" name="distributor" id="distributor">
                <option selected disabled>Default</option>
                <?php foreach ($data_distributor as $row) :; ?>
                <option value="<?= $row['kd_distributor']; ?>"
                    <?= $row['kd_distributor'] == $barang['distributor'] ? "selected" : ""; ?>>
                    <?= $row['nm_distributor']; ?></option>
                <?php endforeach;; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="ket" rows="3"
                placeholder="Masukkan Keterangan Barang"><?php echo $barang['ket'] ?></textarea>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="simpan" value="Update Data">
            <a href="data_barang_masuk.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?php }
function tambah_data()
{
    $db = new Database();
    $data_distributor = $db->data_distributor();
    $data_barang = $db->data_barang();
?>

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: blue; border-radius: 10px; color: white; padding: 10px;">
        Tambah Barang Belanja</h3>
    <form method="post" action="<?php echo "../../process/proses_barang_masuk.php?aksi=tambah"; ?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">No Ref</label>
            <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Kode Barang"
                value="<?= 'REF' . time(); ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Barang Masuk</label>
            <input type="date" name="tgl_masuk" class="form-control" placeholder="Masukkan Nama Barang">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Barang</label>
            <input type="number" min="1" name="jumlah" id="jumlah" class="form-control"
                placeholder="Masukan jumlah barang masuk">
        </div>

        <div class="mb-3">
            <label for="kd_barang">Nama Barang</label>
            <!-- <select class="form-control" name="kd_barang" id="kd_barang" onchange="changeValue(this)"> -->
            <select class="form-control" name="kd_barang" id="kd_barang" onchange="changeValue(this.value)">
                <?php

                    $jsArray = "var prdName = new Array();\n";
                    ?>

                <option selected disabled> Default </option>
                <?php foreach ($data_barang as $row) : ?>
                <option value="<?= $row['kd_barang']; ?>"><?= $row['kd_barang'] . " - " . $row['nm_barang'] ?></option>

                <?php $jsArray .= "prdName['" . $row['kd_barang'] . "'] = {
                            nm_barang: '" . addslashes($row['nm_barang']) . "',
                            harga: '" . addslashes($row['harga']) . "',
                            stok: '" . addslashes($row['stok']) . "',
                        };\n"; ?>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nm_barang" id="nm_barang" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Barang</label>
            <input type="text" name="harga" id="harga" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok Barang</label>
            <input type="text" name="stok" id="stok" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="kd_distributor">Distributor</label>
            <select class="form-control" name="kd_distributor" id="kd_distributor">
                <option selected disabled>-- Pilih Distributor -- </option>
                <?php foreach ($data_distributor as $row) :; ?>
                <option value="<?= $row['kd_distributor']; ?>"><?= $row['nm_distributor']; ?></option>
                <?php endforeach;; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Penerima</label>
            <input type="text" name="penerima" class="form-control" placeholder="Masukkan Stok Barang">
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Alamat"></textarea>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan Data">
            <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
        </div>

    </form>

    <script>
    <?php echo $jsArray; ?>

    function changeValue(id) {
        document.getElementById('nm_barang').value = prdName[id].nm_barang;
        document.getElementById('harga').value = prdName[id].harga;
        document.getElementById('stok').value = prdName[id].stok;
    }
    </script>

</div>
<?php }

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if ($edit == "update") {
    update_data();
} else {
    tambah_data();
}
?>