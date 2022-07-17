<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS PERTEMUAN 8 -->

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

</body>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
var typed = new Typed(".auto-type", {
    strings: ["COMING SOOON"],
    typeSpeed: 60,
    backSpeed: 60,
    loop: true
});
</script>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>