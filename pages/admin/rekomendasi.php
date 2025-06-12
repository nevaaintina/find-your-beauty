<?php

include('auth.php');
include('../../includes/db.php');

if((isset($_GET['aksi']))&&(isset($_GET['data']))){
if($_GET['aksi']=='hapus'){
$id_rekomendasi = $_GET['data'];
//hapus data
$sql_dp = "DELETE from `rekomendasi`
where `id_rekomendasi` = '$id_rekomendasi'";
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
            <h3><i class="fa fa-suitcase"></i> Rekomendasi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Rekomendasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Rekomendasi</h3>
                <div class="card-tools">
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
                        <th width="20%">Produk</th>
                        <th width="20%">Jenis Kulit</th>
                        <th width="20%">Masalah</th>
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
                    
                    $sql_u = "SELECT r.id_rekomendasi, p.nama_produk, p.jenis_kulit, r.masalah 
                    FROM rekomendasi r inner join  produk p on r.id_produk=p.id_produk";

                    if (isset($_GET["katakunci"])) {
                      $katakunci_rekomendasi = $_GET["katakunci"];
                      $sql_u .= " WHERE `nama_produk` LIKE '%$katakunci_rekomendasi%'
                      OR `jenis_kulit` LIKE '%$katakunci_rekomendasi%' 
                      OR `masalah` LIKE '%$katakunci_rekomendasi%'";
                    }
                    $sql_u .= " ORDER BY `id_rekomendasi` LIMIT $posisi, $batas";
                    $query_u = mysqli_query($koneksi, $sql_u);
                    $no = $posisi + 1;
                    
                    while ($data_u = mysqli_fetch_row($query_u)) {
                      $id_rekomendasi = $data_u[0];
                      $nama_produk = $data_u[1];
                      $jenis_kulit = $data_u[2];
                      $masalah = $data_u[3];

                      echo "<tr>
                      <td>$no</td>
                      <td>$nama_produk</td>
                      <td>$jenis_kulit</td>
                       <td>$masalah</td>
                      <td align='center'>
                      <a href=\"javascript:if(confirm('Anda yakin ingin menghapus data $id_rekomendasi?')) window.location.href='rekomendasi.php?aksi=hapus&data=$id_rekomendasi&notif=hapusberhasil'\" class='btn btn-xs btn-warning'><i class='fas fa-trash'></i> Hapus</a>
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
                $sql_jum = "SELECT r.id_rekomendasi,p.nama_produk,p.jenis_kulit,r.masalah 
                    FROM rekomendasi r inner join  produk p on r.id_produk = p.id_produk";

                if (isset($_GET["katakunci"])) {
                  $katakunci_rekomendasi = $_GET["katakunci"];
                  $sql_jum .= " WHERE `nama_produk` LIKE '%$katakunci_rekomendasi%' 
                      OR `jenis_kulit` LIKE '%$katakunci_rekomendasi%' 
                      OR `masalah` LIKE '%$katakunci_rekomendasi%'";
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
                      $katakunci_rekomendasi = $_GET["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?katakunci=$katakunci_rekomendasi&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?katakunci=$katakunci_rekomendasi&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?katakunci=$katakunci_rekomendasi&halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?katakunci=$katakunci_rekomendasi&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?katakunci=$katakunci_rekomendasi&halaman=$jum_halaman'>Last</a></li>";
                      }
                    }else{
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='rekomendasi.php?halaman=$jum_halaman'>Last</a></li>";
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
