<?php
// session_start();
include('auth.php');
include('../../includes/db.php');


if (isset($_SESSION['id_artikel'])) {
    $id_artikel = $_SESSION['id_artikel'];
    $judul_artikel = $_POST['judul_artikel'];
    $kategori_artikel = $_POST['kategori_artikel'];
    $penulis = $_POST['penulis'];
    $tanggal_terbit = $_POST['tanggal_terbit'];

    // Validasi input
    if (empty($judul_artikel)) {
        header("Location:editartikel.php?data=$id_artikel&notif=editkosong&jenis=judul_artikel");
        exit;
    } else if (!isset($_FILES['konten']) || $_FILES['konten']['error'] != 0) {
        header("Location:editartikel.php?data=$id_artikel&notif=editkosong&jenis=konten");
        exit;
    } else if (empty($kategori_artikel)) {
        header("Location:editartikel.php?data=$id_artikel&notif=editkosong&jenis=kategori_artikel");
        exit;
    } else if (empty($penulis)) {
        header("Location:editartikel.php?data=$id_artikel&notif=editkosong&jenis=penulis");
        exit;
    } else if (empty($tanggal_terbit)) {
        header("Location:editartikel.php?data=$id_artikel&notif=editkosong&jenis=tanggal_terbit");
        exit;
    } else {
        // Proses upload file konten
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

                // Update query termasuk konten baru
                $sql = "UPDATE artikel SET 
                        judul_artikel='$judul_artikel',
                        konten='$konten',
                        kategori_artikel='$kategori_artikel',
                        penulis='$penulis',
                        tanggal_terbit='$tanggal_terbit' 
                        WHERE id_artikel='$id_artikel'";
            } else {
                header("Location:editartikel.php?data=$id_artikel&notif=gagalupload");
                exit;
            }
        }

        mysqli_query($koneksi, $sql);
        header("Location:artikel.php?notif=editberhasil");
    }
}
?>
