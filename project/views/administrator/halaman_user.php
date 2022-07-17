<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->

<?php 
class dashboard{
  function __construct(){
    include"menu.php";
  }
}
$halaman_utama = new dashboard;
?>
<?php

// session_start();

// if (isset($_SESSION['username'])) {
//     echo "<script language = 'JavaScript'>
//                 document.location = 'index.php';
//             </script>";
// } else {
//     echo "<script language = 'JavaScript'>
//                 document.location = 'login.php';
//             </script>";
// }

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/style.css">
    <title>Digital Toko</title>
</head>

<body>
    <div class="Text-berjalan">
        <h1><span class="auto-type"></span></h1>
    </div>
    <div class="row" style="margin: 60px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Belanja Barang</h5>
                    <p class="card-text">
                        Digital Toko adalah aplikasi yang dibuat untuk membantu para Konsumen atau Pembeli yang sedang
                        mencari barang-barang yang ingin dibeli.
                    </p>
                    <a href="data_barang_masuk.php" class="btn btn-primary">Belanja</a>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
var typed = new Typed(".auto-type", {
    strings: ["Selamat Datang Di Digital Toko"],
    typeSpeed: 60,
    backSpeed: 60,
    loop: true
});
</script>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>