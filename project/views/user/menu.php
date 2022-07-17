<!-- MUHAMMAD IVAN CHRIANA - 20210120065 - TUGAS AKHIR -->
<?php 
session_start();
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="halaman_user.php"><span class="gede">D</span>igital <span
                    class="gede">T</span>oko</a>

            <div class="mx-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="produk.php">Produk Barang |</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact.php">Contact |</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="data_barang_masuk.php" id="navbarScrollingDropdown"
                            role="button" data-bs-toggle="dropdown">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Game</a></li>
                            <li><a class="dropdown-item" href="#">Motor</a></li>
                            <li><a class="dropdown-item" href="#">Mobil</a></li>
                            <li><a class="dropdown-item" href="#">Elektronik</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="">
                <ul class="me-auto mb-2 mb-lg-0">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" aria-current="page" href="#" id="navbarScrollingDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <img src="../administrator/icons/laki.png" width="30" height="30" class="rounded-circle"
                                alt="">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="pengaturan.php">Pengaturan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="navbar-nav ml-auto mb-2 mb-lg-0">
                <a class="nav-link active" aria-current="page" href="#" </a>
                    <a class="nav-link active" aria-current="page" href="register.php">Register</a>
            </div>
            <div class="navbar-nav ml-auto mb-2 mb-lg-0">
                <a class="nav-link active" aria-current="page" href="../../index.php" </a>
                    <a class="nav-link active" aria-current="page" href="../../index.php">Logout</a>
            </div>
        </div>
</nav>

<script>
var nav = document.querySelector('nav');

window.onscroll = function() {
    if (window.pageYOffset > 100) {
        nav.classList.add('bg-dark', 'shadow');
    } else {
        nav.classList.remove('bg-dark', 'shadow');
    }
};
</script>