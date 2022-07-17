<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<?php
class dashboard
{
    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include("../../model/database.php");

$db = new database();
if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
    $data_barang = $db->data_barang($cari);
} else {
    $data_barang = $db->data_barang();
}
$data_barang = $db->data_barang();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS Offline -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Bootstrap CSS Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Digital Toko</title>
</head>

<body>
    <div class="row" style="margin: 60px;">
        <?php include "../administrator/form_barang.php"; ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3
                style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
                Data Barang</h3>
            <form action="../administrator/data_barang.php" method="POST">
                <div class="form-group ">
                    <input type="text" name="cari" class="col-lg-5"
                        style="border: 1px solid dark; border-radius: 7px; height: 38px; padding: 10px;"
                        placeholder="Search Enginee...">
                    <button type="submit" value="cari" class="btn btn-success mb-2 mt-1">Cari Data</button>
                </div>
            </form>

            <table class="table" style="border: 1px solid lightblue; border-radius: 10px;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Distributor</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($data_barang as $row) {
                    ?>
                    <tr>
                        <th><?php echo $no++; ?></th>
                        <td><?php echo "<img src='Dokumen/$row[foto]' width='100' height='100'>"; ?></td>
                        <td><?php echo $row['kd_barang'] ?></td>
                        <td><?php echo $row['nm_barang'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td><?php echo $row['stok'] ?></td>
                        <td><?php echo $row['nm_distributor'] ?></td>
                        <td><?php echo $row['ket'] ?></td>
                        <td>
                            <a href="<?php echo "data_barang.php?edit=update&&id=$row[kd_barang]"; ?>"
                                class="btn btn-m btn-success" role="button">Edit
                            </a> |
                            <a href="<?php echo "../../process/proses_barang.php?aksi=delete&&id=$row[kd_barang]"; ?>"
                                class="btn btn-m btn-warning"
                                onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete
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