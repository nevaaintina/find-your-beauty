<?php
// session_start();
include('auth.php');
include('../../includes/db.php');

    $judul_artikel = $_POST['judul_artikel'];
    $kategori_artikel = $_POST['kategori_artikel'];
    $penulis = $_POST['penulis'];
    $tanggal_terbit = $_POST['tanggal_terbit'];

if(empty($judul_artikel)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=judul_artikel");
} else if(!isset($_FILES['konten']) || $_FILES['konten']['error'] != 0){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=konten");
} else if(empty($kategori_artikel)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=kategori_artikel");
} else if(empty($penulis)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=penulis");
} else if(empty($tanggal_terbit)){
    header("Location:tambahartikel.php?data=&notif=tambahkosong&jenis=tanggal_terbit");
} else {
    // Proses upload file
    $konten = '';
    if (isset($_FILES['konten']) && $_FILES['konten']['error'] == 0) {
        $folder = '../admin//file_artikel/';
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $file_tmp = $_FILES['konten']['tmp_name'];
        $file_name = basename($_FILES['konten']['name']);
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $file_name);
        $file_dest = $folder . $new_name;

        if (move_uploaded_file($file_tmp, $file_dest)) {
            $konten = $new_name;
        } else {
            header("Location:tambahartikel.php?notif=gagalupload");
            exit;
        }
    }

    $sql = "INSERT INTO artikel(judul_artikel, konten, kategori_artikel, penulis, tanggal_terbit) 
            VALUES ('$judul_artikel','$konten','$kategori_artikel','$penulis','$tanggal_terbit')";
    mysqli_query($koneksi,$sql);
    header("Location:artikel.php?notif=tambahberhasil");
}
