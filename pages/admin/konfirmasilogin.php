<?php
include('../../includes/db.php');

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (empty($user)) {
        header("Location:index.php?gagal=userKosong");
        exit;
    }

    if (empty($pass)) {
        header("Location:index.php?gagal=passKosong");
        exit;
    }

    $username = mysqli_real_escape_string($koneksi, $user);
    $password = mysqli_real_escape_string($koneksi, MD5($pass));

    $sql = "SELECT id_user, username, level FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $jumlah = mysqli_num_rows($query);

    if ($jumlah == 1) {
        $row = mysqli_fetch_assoc($query);
        session_start();
        session_regenerate_id(true); 

        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['level'] = $row['level'];

        header("Location: profil.php");
        exit;
    } else {
        header("Location:index.php?gagal=userpassSalah");
        exit;
    }
}
?>
