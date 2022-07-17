<?php 

include '../model/database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $db->login_user($username, $password);
    if ($login) {
        session_start();
        $_SESSION['username'] = $username;
        header('location:../../../index.php');
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Username atau Password Salah');
        document.location='../../../login.php';
        </script>
        ";
    }
} else if ($aksi == "logout") {
    session_start();
    session_destroy();
    header('location:../../../login.php');  
}

?>