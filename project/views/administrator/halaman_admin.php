<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<?php 
class dashboard{
  function __construct(){
    include"menu.php";
    
  }
}
$halaman_utama = new dashboard;
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

    <title>Admin | Digital Toko</title>
</head>

<body>
    <div class="row" style="margin: 60px;">
        <h1 align="center">Selamat Datang Di Halaman Admin</h1>
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