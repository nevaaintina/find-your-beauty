<?php 
require(__DIR__ . '/../includes/db.php');

// ✅ Tambahkan BASE_URL agar bisa digunakan untuk redirect dinamis
if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/find-your-beauty'); // Ganti sesuai domain kamu
}

// Fungsi query database
if (!function_exists('query')) {
    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

// Fungsi register
if (!function_exists('register')) {
    function register($data, $files) {
        global $koneksi;

        $name = strtolower($data["name"]);
        $username = strtolower($data["username"]);
        $email = strtolower($data["email"]);
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $confirm_password = mysqli_real_escape_string($koneksi, $data["confirm_password"]);

        // Cek email
        $cekEmail = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");
        if (mysqli_fetch_assoc($cekEmail)) {
            echo "<script>alert('Maaf, email telah digunakan!');</script>";
            return false;
        }

        if ($password !== $confirm_password) {
            echo "<script>alert('Konfirmasi password harus sama!');</script>";
            return false;
        }

        // Upload foto
        $namaFile = $files['foto']['name'];
        $tmpName = $files['foto']['tmp_name'];
        $error = $files['foto']['error'];

        if ($error === 4) {
            echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
            return false;
        }

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        if (!in_array($ekstensiFoto, $ekstensiValid)) {
            echo "<script>alert('File harus berupa gambar (jpg/jpeg/png)!');</script>";
            return false;
        }

        $namaFileBaru = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $username)) . '.' . $ekstensiFoto;
        $uploadPath = __DIR__ . '/../pages/admin/foto/' . $namaFileBaru;
        move_uploaded_file($tmpName, $uploadPath);

        $password = md5($password);

        $query = "INSERT INTO user (nama, username, email, password, level, foto)
                  VALUES ('$name', '$username', '$email', '$password', 'user', '$namaFileBaru')";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
}

// Fungsi baca file .docx (jika diperlukan)
if (!function_exists('readDocxText')) {
    function readDocxText($filePath) {
        $zip = new ZipArchive;
        if ($zip->open($filePath) === TRUE) {
            $content = $zip->getFromName('word/document.xml');
            $zip->close();
            return strip_tags($content);
        } else {
            return 'Tidak bisa membuka file.';
        }
    }
}
