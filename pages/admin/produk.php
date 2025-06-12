<?php
include('auth.php');
include('../../includes/db.php');

if((isset($_GET['aksi']))&&(isset($_GET['data']))){
if($_GET['aksi']=='hapus'){
$id_produk = $_GET['data'];
// Hapus data terkait terlebih dahulu
  mysqli_query($koneksi, "DELETE FROM review WHERE id_produk = '$id_produk'");
  mysqli_query($koneksi, "DELETE FROM rekomendasi WHERE id_produk = '$id_produk'");
  mysqli_query($koneksi, "DELETE FROM wishlist WHERE id_produk = '$id_produk'");
//hapus data
$sql_dp = "DELETE from `produk`
where `id_produk` = '$id_produk'";
mysqli_query($koneksi,$sql_dp);
}
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fa fa-graduation-cap"></i>Produk</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Produk</h3>
                <div class="card-tools">
                  <a href="tambahproduk.php" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  Produk</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="" action="">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
               <div class="col-sm-12">
                <?php if(!empty($_GET['notif'])){?>
                <?php if($_GET['notif']=="tambahberhasil"){?>
                <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                <?php } else if($_GET['notif']=="editberhasil"){?>
                <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                <?php } else if($_GET['notif']=="hapusberhasil"){?>
                <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                <?php }?>
                <?php }?>
              </div>
                <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama Produk</th>
                        <th width="20%">Foto Produk</th>
                        <th width="20%">Brand</th>
                        <th width="20%">Kategori</th>
                        <th width="20%">Deskripsi</th>
                        <th width="20%">Jenis Kulit</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $batas = 2;
                    if (!isset($_GET['halaman'])) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $halaman = $_GET['halaman'];
                      $posisi = ($halaman-1) * $batas;
                    }
                    
                    $sql_u = "SELECT p.id_produk,p.nama_produk,p.foto_produk,p.brand_produk, p.kategori_produk,
                    p.deskripsi_produk, p.jenis_kulit FROM produk p";

                    if (isset($_GET["katakunci"])) {
                      $katakunci_produk = $_GET["katakunci"];
                      $sql_u .= " WHERE `nama_produk` LIKE '%$katakunci_produk%'
                      OR `brand_produk` LIKE '%$katakunci_produk%' 
                      OR `kategori_produk` LIKE '%$katakunci_produk%' 
                      OR `jenis_kulit` LIKE '%$katakunci_produk%'";
                    }
                    $sql_u .= " ORDER BY `id_produk` LIMIT $posisi, $batas";
                    $query_u = mysqli_query($koneksi, $sql_u);
                    $no = $posisi + 1;
                    
                    while ($data_u = mysqli_fetch_row($query_u)) {
                      $id_produk = $data_u[0];
                      $nama_produk = $data_u[1];
                      $foto_produk = $data_u[2];
                      $brand_produk = $data_u[3];
                      $kategori_produk = $data_u[4];
                      $deskripsi_produk = $data_u[5];
                      $jenis_kulit = $data_u[6];
                      echo "<tr>
                      <td>$no</td>
                      <td>$nama_produk</td>
                      <td><img src='foto_produk/$foto_produk' width='60' class='img-thumbnail'></td>
                       <td>$brand_produk</td>
                        <td>$kategori_produk</td>
                        <td>$deskripsi_produk</td>
                        <td>$jenis_kulit</td>
                      <td align='center'>
                      <a href='editproduk.php?data=$id_produk' class='btn btn-xs btn-info'><i class='fas fa-edit'></i> Edit</a>
                      <a href=\"javascript:if(confirm('Anda yakin ingin menghapus data $id_produk?')) window.location.href='produk.php?aksi=hapus&data=$id_produk&notif=hapusberhasil'\" class='btn btn-xs btn-warning'><i class='fas fa-trash'></i> Hapus</a>
                      </td>
                      </tr>";
                      $no++;
                    }
                    ?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <?php
                $sql_jum = "SELECT p.id_produk,p.nama_produk,p.foto_produk,p.brand_produk, p.kategori_produk,
                    p.deskripsi_produk, p.jenis_kulit FROM produk p";

                if (isset($_GET["katakunci"])) {
                  $katakunci_produk = $_GET["katakunci"];
                  $sql_jum .= " WHERE `nama_produk` LIKE '%$katakunci_produk%'
                      OR `brand_produk` LIKE '%$katakunci_produk%' 
                      OR `kategori_produk` LIKE '%$katakunci_produk%' 
                      OR `jenis_kulit` LIKE '%$katakunci_produk%'";
                }
                $query_jum = mysqli_query($koneksi, $sql_jum);
                $jum_data = mysqli_num_rows($query_jum);
                $jum_halaman = ceil($jum_data / $batas);
                ?>
                
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php
                  if($jum_halaman==0){
                    //tidak ada halaman
                  }else if($jum_halaman==1){
                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                  }else{
                    $sebelum = $halaman-1;
                    $setelah = $halaman+1;
                    if (isset($_GET["katakunci"])){
                      $katakunci_produk = $_GET["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='produk.php?katakunci=$katakunci_produk&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='produk.php?katakunci=$katakunci_produk&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='produk.php?katakunci=$katakunci_produk&halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='produk.php?katakunci=$katakunci_produk&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='produk.php?katakunci=$katakunci_produk&halaman=$jum_halaman'>Last</a></li>";
                      }
                    }else{
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='produk.php?halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='produk.php?halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='produk.php?halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='produk.php?halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='produk.php?halaman=$jum_halaman'>Last</a></li>";
                      }
                    }
                    }?>
                    </ul>
                  </div>
                </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

</div>
<!-- ./wrapper -->

<?php include("includes/script.php") ?>
</body>
</html>
