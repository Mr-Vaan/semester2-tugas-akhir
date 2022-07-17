<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<!-- UNTUK TOMBOL EDIT DAN HAPUS MASIH ERROR -->
<?php
class dashboard
{
    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include ("../../model/database.php");
$db = new Database();
if (isset($_POST['cari'])) {
    $data_barang_masuk = $db->data_barang_masuk($_POST['dari'], $_POST['sampai']);
    $msg = "Data Barang Masuk dari tanggal " . date('D, d F Y', strtotime($_POST['dari'])) . " Sampai Dengan " . date('D, d F Y', strtotime($_POST['sampai']));
    $link = "data_barang_masuk.php?dari=" . $_POST['dari'] . "&sampai=" . $_POST['sampai'] . "&judul=" . urlencode($msg);
} else {
    $data_barang_masuk = $db->data_barang_masuk();
    $msg = "Menampilkan Semua Data Barang Masuk";
    $link = "data_barang_masuk.php";
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS Offline -->
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <!-- Bootstrap CSS Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <title>Digital Toko</title>
</head>

<body>

    <div class="row" style="margin: 60px;">
        <?php
        include("form_barang_masuk.php");
        ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: blue; border-radius: 10px; color: white; padding: 10px;">
                Data Barang Masuk</h3>
            <div class="table-responsive mt-2">
                <h2 class="mt-2">Pencarian Data</h2>
                <form action="data_barang_masuk.php" method="post" role="form">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" name="dari" id="dari" class="form-control form-control-sm" value=""
                                    require>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" name="sampai" id="sampai" class="form-control form-control-sm"
                                    value="" require>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-sm" name="cari" id="cari">
                                <i class="fa fa-print" aria-hidden="true"></i>Cari Data
                            </button>
                            <a href="./print/cetak_barang_masuk.php?<? $link ?>" target="_blank"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-print" aria-hidden="true"></i>Cetak Data
                            </a>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Ref</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Jumlah Beli</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Penerima</th>
                            <th scope="col">Total</th>
                            <th scope="col">Distributor</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                        <!-- <th>No Ref</th>
                            <th width="150px">Tanggal Masuk</th>
                            <th>Nama Barang</th>
                            <th>Nama Distributor</th>
                            <th>Penerima</th>
                            <th width="200px">Keterangan</th>
                            <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_barang_masuk as $row) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?php echo $row['no_ref'] ?></td>
                            <td><?php echo $row['kd_barang'] ?></td>
                            <td><?php echo $row['tgl_masuk'] ?></td>
                            <td><?php echo $row['jumlah'] ?></td>
                            <td><?php echo $row['nm_barang'] ?></td>
                            <td><?php echo $row['penerima'] ?></td>
                            <td class="text-right"><?= $db->rupiah($row['total']); ?></td>
                            <td><?php echo $row['nm_distributor'] ?></td>
                            <td><?php echo $row['ket'] ?></td>
                            <td>
                                <a name="" id="" class="btn btn-m btn-info"
                                    href="data_barang_masuk.php?edit=update&&id=<?php echo $row['kd_barang'] ?>"
                                    role="button">Edit</a> |
                                <a name="" id="" class="btn btn-m btn-danger"
                                    href="data_barang_masuk.php?hapus=hapus&&id=<?php echo $row['no_ref'] ?>"
                                    onclick="return confirm('Yakin Ingin Menghapus Data?');" role="button">Hapus
                                </a>
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

    <!-- <script>
    function img(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }
    </script> -->

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>