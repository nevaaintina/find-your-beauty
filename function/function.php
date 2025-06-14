<?php 
require(__DIR__ . '/../includes/db.php');

function query($query) {
    
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function register($data) {
    global $koneksi;

    $name = strtolower($data["name"]);
    $username = strtolower($data["username"]);
    $email= strtolower($data["email"]);
    $password = mysqli_real_escape_string($koneksi,$data["password"] );
    $confirm_password = mysqli_real_escape_string($koneksi,$data["confirm_password"] );

    $query = "SELECT email FROM user WHERE
    email = '$email'
    ";

    $result = mysqli_query($koneksi, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>alert('maaf email telah digunakan!')
        </script>";
        return false;
    }

    if ($password !== $confirm_password) {
        echo "
        <script>alert('konfirmasi password harus sama!')
        </script>";
        return false;

    } 

    $password = md5($password);

    $query = "INSERT INTO user (nama,username,email,password,level,foto,jenis_kulit) VALUES
    ('$name','$username','$email','$password','user','','normal')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function readDocxText($filePath) {
    $zip = new ZipArchive;

    if ($zip->open($filePath) === TRUE) {
        $content = $zip->getFromName('word/document.xml');
        $zip->close();

        $content = strip_tags($content);
        return $content;
    } else {
        return 'Tidak bisa membuka file.';
    }
}