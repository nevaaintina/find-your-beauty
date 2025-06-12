<?php
// session_start();

include('auth.php');
include('../koneksi/koneksi.php');
include('../../includes/db.php');


// Ambil data dari form
$nama_produk = $_POST['nama_produk'];
$brand_produk = $_POST['brand_produk'];
$kategori_produk = $_POST['kategori_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];
$jenis_kulit = $_POST['jenis_kulit'];

// Validasi input
if (empty($nama_produk)) {
  header("Location:tambahproduk.php?notif=tambahkosong&jenis=nama_produk");
  exit;
} else if (empty($brand_produk)) {
  header("Location:tambahproduk.php?notif=tambahkosong&jenis=brand_produk");
  exit;
} else if (empty($kategori_produk)) {
  header("Location:tambahproduk.php?notif=tambahkosong&jenis=kategori_produk");
  exit;
} else if (empty($deskripsi_produk)) {
  header("Location:tambahproduk.php?notif=tambahkosong&jenis=deskripsi_produk");
  exit;
} else if (empty($jenis_kulit)) {
  header("Location:tambahproduk.php?notif=tambahkosong&jenis=jenis_kulit");
  exit;
}

// Proses upload file foto
$lokasi_file = $_FILES['foto_produk']['tmp_name'];
$nama_file = $_FILES['foto_produk']['name'];
$direktori = 'foto_produk/' . $nama_file;

if (!empty($lokasi_file)) {
  move_uploaded_file($lokasi_file, $direktori);
}

// Simpan ke database
$sql = "INSERT INTO `produk` (`nama_produk`, `brand_produk`, `kategori_produk`, `deskripsi_produk`, `jenis_kulit`, `foto_produk`) 
        VALUES ('$nama_produk', '$brand_produk', '$kategori_produk', '$deskripsi_produk', '$jenis_kulit', '$nama_file')";

mysqli_query($koneksi, $sql);

// Redirect ke halaman produk
header("Location:produk.php?notif=tambahberhasil");
exit;
?>
