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
    // Menampilkan data berdasarkan kata kunci pencarian
    $data_distributor = $db->data_distributor($_POST['cari']);
} else {
    // Menampilkan Semua Data Distributor
    $data_distributor = $db->data_distributor();
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS Offline -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Bootstrap CSS Online-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Digital Toko</title>
</head>

<body>
    <div class="row" style="margin: 60px;">
        <?php include "../administrator/form_distributor.php"; ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3
                style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
                Data Distributor</h3>

            <form action="../administrator/data_distributor.php" method="POST">
                <div class="form-group ">
                    <input type="text" name="cari" class="col-lg-5"
                        style="border: 1px solid dark; border-radius: 7px; height: 38px; padding: 10px;"
                        placeholder="Search Enginee...">
                    <button type="submit" value="cari" class="btn btn-success mb-2 mt-1">Cari Data</button>
                </div>
            </form>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Distributor</th>
                        <th scope="col">Nama Distributor</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Pemilik</th>
                        <th scope="col">Tipe Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach ($data_distributor as $row) {
                    ?>
                    <tr>
                        <th><?php echo $no++; ?></th>
                        <td><?php echo"$row[kd_distributor]"; ?></td>
                        <td><?php echo"$row[nm_distributor]"; ?></td>
                        <td><?php echo"$row[alamat]"; ?></td>
                        <td><?php echo"$row[nohp]"; ?></td>
                        <td><?php echo"$row[pemilik]"; ?></td>
                        <td><?php echo"$row[tipe_produk]"; ?></td>
                        <td><a href="<?php echo "data_distributor.php?&edit=update&&id=$row[kd_distributor]"; ?>"
                                class="btn btn-m btn-success">Edit</a> |
                            <a href="<?php echo "../../process/proses_distributor.php?aksi=delete&&id=$row[kd_distributor]"; ?>"
                                class="btn btn-m btn-warning"
                                onclick="javascript: return confirm('Apa kamu yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script Navbar -->
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
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>