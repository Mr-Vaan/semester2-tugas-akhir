<?php
class database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "toko";

    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->koneksi) {
            die("Koneksi database gagal! : " . mysqli_connect_errno() . " - " . mysqli_connect_error());
        }
    }
    // ====== LOGIN Model ======
    public function login_user($username, $password)
    {
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($this->koneksi, $sql);
        $row = mysqli_num_rows($query);
        if ($row > 0) {
            $login = mysqli_fetch_array($query);
            if ($login['status'] == "Administrator") {
                session_start();
                $_SESSION['namauser'] = $login['username'];
                $_SESSION['passuser'] = $login['password'];

                $_SESSION['status'] = $login['status'];
                $_SESSION['nama']   = $login['nm_user'];

                header('location:../views/administrator/halaman_admin.php');
            } else if($login['status'] == 'Pegawai') {
				session_start();
				$_SESSION['username'] = $login['username'];
				$_SESSION['passuser'] = $login['password'];
				
				echo "<script language = 'JavaScript'>
				confirm('Login Berhasil');
				document.location = '../views/administrator/halaman_user.php';
				</script>";
			} else if($login['status'] == 'Pelanggan') {
				session_start();
				$_SESSION['username'] = $login['username'];
				$_SESSION['passuser'] = $login['password'];
				
				echo "<script language = 'JavaScript'>
				confirm('Login Berhasil');
				document.location = '../views/administrator/halaman_user.php';
				</script>";
			} else {
				echo "<script language = 'JavaScript'>
				confirm('Login Gagal');
				document.location = '../login.php';
				</script>";
			}
        } else {
            echo '<script>
                alert("Username atau Password Salah");
                window.location = "../login.php";
                </script>';
        }
    }
}