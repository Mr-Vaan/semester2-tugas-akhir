<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<?php 
class dashboard{

  function __construct()
  {
    include "menu.php";
  }
}
$halaman_utama = new dashboard;

include ("../../model/database.php");

$db = new database();
// if (isset($_POST['cari'])) {
//     $data_barang_keluar = $db->data_barang_keluar($_POST['cari']);
//     $msg = "Menampilkan pencarian " . $_POST['cari'];
// } else {
//     $data_barang_keluar = $db->data_barang_keluar();
//     $msg = "Menampilkan semua data";
// }
$data_barang_keluar = $db->data_barang_keluar();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS Offline -->
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- name CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Digital Toko</title>
</head>

<body>

    <div class="row" style="margin: 60px;">
        <?php
        include("form_barang_keluar.php");
        ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color:blue; border-radius: 10px; color: white; padding: 10px;">
                Data Pengeluaran Barang</h3>
            <div class="table-responsive mt-2">
                <hr>
                <!-- <form action="data_barang_keluar.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Barang" name="cari" id="cari">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="cari" id="cari">Cari</button>
                        </div>
                    </div>
                </form> -->
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Ref</th>
                            <th scope="col">Tanggal Keluar</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Total Biaya</th>
                            <th scope="col">Penerima</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_barang_keluar as $row) {;
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['no_ref']; ?></td>
                            <td><?= $row['tanggal_keluar']; ?></td>
                            <td><?= $row['nm_barang']; ?></td>
                            <td><?= $db->rupiah($row['harga']); ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td><?= $row['diskon']; ?>%</td>
                            <td class="text-right"><?= $db->rupiah($row['total']); ?></td>
                            <td><?= $row['penerima']; ?></td>
                            <td align="center" width="150px">
                                <a class="btn btn-sm btn-warning"
                                    href="data_barang_keluar.php?edit=update&&id=<?= $row['no_ref'] ?>"
                                    role="button">Edit</a>
                                <a class="btn btn-sm btn-danger"
                                    href="../../process/proses_barang_keluar.php?aksi=delete&&id=<?= $row['no_ref']; ?>"
                                    onclick="return confirm('Apakah yakin ingin menghapus <?= $row['nm_barang']; ?> ?')"
                                    role="button"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script>
    var nav = document.querySelector('nav');

    window.onscroll = function() {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow-sm');
        } else {
            nav.classList.remove();
        }
    };
    </script>

    <script>
    function img(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.foto').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>