<?php
// session_start();
include('auth.php');
include('../../includes/db.php');
// 

if (isset($_SESSION['id_produk'])) {
  $id_produk = $_SESSION['id_produk'];
  $nama_produk = $_POST['nama_produk'];
  $brand_produk = $_POST['brand_produk'];
  $kategori_produk = $_POST['kategori_produk'];
  $deskripsi_produk = $_POST['deskripsi_produk'];
  $jenis_kulit = $_POST['jenis_kulit'];

  // Ambil nama foto lama dari database
  $sql_f = "SELECT `foto_produk` FROM `produk` WHERE `id_produk`='$id_produk'";
  $query_f = mysqli_query($koneksi, $sql_f);
  $data_f = mysqli_fetch_row($query_f);
  $foto_produk = $data_f[0];

  // Validasi kosong
  if (empty($nama_produk)) {
    header("Location:editproduk.php?notif=editkosong&jenis=nama_produk");
    exit;
  } else if (empty($brand_produk)) {
    header("Location:editproduk.php?notif=editkosong&jenis=brand_produk");
    exit;
  } else if (empty($kategori_produk)) {
    header("Location:editproduk.php?notif=editkosong&jenis=kategori_produk");
    exit;
  } else if (empty($deskripsi_produk)) {
    header("Location:editproduk.php?notif=editkosong&jenis=deskripsi_produk");
    exit;
  } else if (empty($jenis_kulit)) {
    header("Location:editproduk.php?notif=editkosong&jenis=jenis_kulit");
    exit;
  }

  // Proses upload jika ada file
  $lokasi_file = $_FILES['foto_produk']['tmp_name'];
  $nama_file = $_FILES['foto_produk']['name'];
  $direktori = 'foto_produk/' . $nama_file;

  if (!empty($lokasi_file)) {
    if (move_uploaded_file($lokasi_file, $direktori)) {
      // Hapus foto lama jika ada
      if (!empty($foto_produk)) {
        unlink("foto_produk/$foto_produk");
      }

      $sql = "UPDATE `produk` 
              SET `nama_produk`='$nama_produk', 
                  `brand_produk`='$brand_produk',
                  `kategori_produk`='$kategori_produk',
                  `deskripsi_produk`='$deskripsi_produk',
                  `jenis_kulit`='$jenis_kulit',
                  `foto_produk`='$nama_file' 
              WHERE `id_produk`='$id_produk'";
    }
  } else {
    // Update tanpa ubah foto
    $sql = "UPDATE `produk` 
            SET `nama_produk`='$nama_produk', 
                `brand_produk`='$brand_produk',
                `kategori_produk`='$kategori_produk',
                `deskripsi_produk`='$deskripsi_produk',
                `jenis_kulit`='$jenis_kulit' 
            WHERE `id_produk`='$id_produk'";
  }

  mysqli_query($koneksi, $sql);
  header("Location:produk.php?notif=editberhasil");
  exit;
} else {
  // Kalau tidak ada id_produk di session
  header("Location:produk.php");
  exit;
}
?>
