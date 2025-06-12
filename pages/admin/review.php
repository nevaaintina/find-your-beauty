<?php
include('auth.php');
include('../../includes/db.php');

if((isset($_GET['aksi']))&&(isset($_GET['data']))){
if($_GET['aksi']=='hapus'){
$id_review = $_GET['data'];
//hapus data
$sql_dp = "DELETE from `review`
where `id_review` = '$id_review'";
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
            <h3><i class="fa fa-envelope-o"></i> Review</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Review</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Review</h3>
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
                        <th width="20%">Kategori Produk</th>
                        <th width="20%">Rating</th>
                        <th width="20%">Komentar</th>
                        <th width="20%">Tanggal Review</th>
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
                    
                    $sql_u = "SELECT r.id_review, p.nama_produk,p.kategori_produk,r.rating,
                    r.komentar, r.tanggal_review FROM review r inner join  produk p on r.id_produk = p.id_produk";


                    if (isset($_GET["katakunci"])) {
                      $katakunci_review = $_GET["katakunci"];
                      $sql_u .= " WHERE `id_review` LIKE '%$katakunci_review%'
                      OR `kategori_produk` LIKE '%$katakunci_review%' 
                      OR `nama_produk` LIKE '%$katakunci_review%' 
                      OR `rating` LIKE '%$katakunci_review%' 
                      OR `tanggal_review` LIKE '%$katakunci_review%'";
                    }
                    $sql_u .= " ORDER BY `id_review` LIMIT $posisi, $batas";
                    $query_u = mysqli_query($koneksi, $sql_u);
                    $no = $posisi + 1;
                    
                    while ($data_u = mysqli_fetch_row($query_u)) {
                      $id_review = $data_u[0];
                      $nama_produk = $data_u[1];
                      $kategori_produk = $data_u[2];
                      $rating = $data_u[3];
                      $komentar = $data_u[4];
                      $tanggal_review = $data_u[5];

                      echo "<tr>
                      <td>$no</td>
                      <td>$nama_produk</td>
                      <td>$kategori_produk</td>
                       <td>$rating</td>
                        <td>$komentar</td>
                        <td>$tanggal_review</td>
                      <td align='center'>
                      <a href=\"javascript:if(confirm('Anda yakin ingin menghapus data $nama_produk?')) window.location.href='review.php?aksi=hapus&data=$id_review&notif=hapusberhasil'\" class='btn btn-xs btn-warning'><i class='fas fa-trash'></i> Hapus</a>
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
                $sql_jum = "SELECT r.id_review, p.nama_produk,r.rating,
                    r.komentar, r.tanggal_review FROM review r inner join  produk p on r.id_produk = p.id_produk";

                if (isset($_GET["katakunci"])) {
                  $katakunci_review = $_GET["katakunci"];
                  $sql_jum .= " WHERE `id_review` LIKE '%$katakunci_review%'
                      OR `kategori_produk` LIKE '%$katakunci_review%' 
                      OR `nama_produk` LIKE '%$katakunci_review%' 
                      OR `rating` LIKE '%$katakunci_review%' 
                      OR `tanggal_review` LIKE '%$katakunci_review%'";
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
                      $katakunci_review = $_GET["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='review.php?katakunci=$katakunci_review&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='review.php?katakunci=$katakunci_review&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='review.php?katakunci=$katakunci_review&halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='review.php?katakunci=$katakunci_review&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='review.php?katakunci=$katakunci_review&halaman=$jum_halaman'>Last</a></li>";
                      }
                    }else{
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='review.php?halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='review.php?halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='review.php?halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='review.php?halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='review.php?halaman=$jum_halaman'>Last</a></li>";
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
