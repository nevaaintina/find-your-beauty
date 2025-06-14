<?php
// session_start();
include('auth.php');
include('../../includes/db.php');

    $judul_artikel = $_POST['judul_artikel'];
    $kategori_artikel = $_POST['kategori_artikel'];
    $penulis = $_POST['penulis'];
    $konten = $_POST['konten'];
    $tanggal_terbit = $_POST['tanggal_terbit'];

if(empty($judul_artikel)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=judul_artikel");
} else if(empty($konten)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=konten");
} else if(empty($kategori_artikel)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=kategori_artikel");
} else if(empty($penulis)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=penulis");
} else if(empty($tanggal_terbit)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=tanggal_terbit");
} else {
    // Proses upload file foto
$lokasi_file = $_FILES['foto_artikel']['tmp_name'];
$nama_file = $_FILES['foto_artikel']['name'];
var_dump($nama_file);
$direktori = 'file_artikel/' . $nama_file;

if (!empty($lokasi_file)) {
  move_uploaded_file($lokasi_file, $direktori);
}

    $sql = "INSERT INTO artikel(judul_artikel, konten, kategori_artikel, penulis, tanggal_terbit, foto_artikel) 
            VALUES ('$judul_artikel','$konten','$kategori_artikel','$penulis','$tanggal_terbit', '$nama_file')";
    mysqli_query($koneksi,$sql);
    header("Location:artikel.php?notif=tambahberhasil");
}
