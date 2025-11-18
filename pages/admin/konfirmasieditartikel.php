<?php
// session_start();
include('auth.php');
include('../../includes/db.php');
// 

if (isset($_SESSION['id_artikel'])) {
  $id_artikel = $_SESSION['id_artikel'];
  $judul_artikel = $_POST['judul_artikel'];
  $konten = $_POST['konten'];
  $kategori_artikel = $_POST['kategori_artikel'];
  $penulis = $_POST['penulis'];
  $tanggal_terbit = $_POST['tanggal_terbit'];

  // Ambil nama foto lama dari database
  $sql_f = "SELECT `foto_artikel` FROM `artikel` WHERE `id_artikel`='$id_artikel'";
  $query_f = mysqli_query($koneksi, $sql_f);
  $data_f = mysqli_fetch_row($query_f);
  $foto_artikel = $data_f[0];

  // Validasi kosong
  if (empty($judul_artikel)) {
    header("Location:editartikel.php?notif=editkosong&jenis=judul_artikel");
    exit;
  } else if (empty($konten)) {
    header("Location:editartikel.php?notif=editkosong&jenis=konten");
    exit;
  } else if (empty($kategori_artikel)) {
    header("Location:editartikel.php?notif=editkosong&jenis=kategori_artikel");
    exit;
  } else if (empty($penulis)) {
    header("Location:editartikel.php?notif=editkosong&jenis=penulis");
    exit;
  } else if (empty($tanggal_terbit)) {
    header("Location:editartikel.php?notif=editkosong&jenis=tanggal_terbit");
    exit;
  }

  // Proses upload jika ada file
  $lokasi_file = $_FILES['foto_artikel']['tmp_name'];
  $nama_file = $_FILES['foto_artikel']['name'];
  $direktori = 'file_artikel/' . $nama_file;

  if (!empty($lokasi_file)) {
    if (move_uploaded_file($lokasi_file, $direktori)) {
      // Hapus foto lama jika ada
      if (!empty($foto_artikel)) {
        unlink("file_artikel/$foto_artikel");
      }

      $sql = "UPDATE `artikel` 
              SET `judul_artikel`='$judul_artikel', 
                  `konten`='$konten',
                  `kategori_artikel`='$kategori_artikel',
                  `penulis`='$penulis',
                  `tanggal_terbit`='$tanggal_terbit',
                  `foto_artikel`='$nama_file'
              WHERE `id_artikel`='$id_artikel'";
    }
  } else {
    // Update tanpa ubah foto
      $sql = "UPDATE `artikel` 
              SET `judul_artikel`='$judul_artikel', 
                  `konten`='$konten',
                  `kategori_artikel`='$kategori_artikel',
                  `penulis`='$penulis',
                  `tanggal_terbit`='$tanggal_terbit'
              WHERE `id_artikel`='$id_artikel'";
    }

  mysqli_query($koneksi, $sql);
  header("Location:artikel.php?notif=editberhasil");
  exit;
} else {
  // Kalau tidak ada id_artikel di session
  header("Location:artikel.php");
  exit;
}
?>
