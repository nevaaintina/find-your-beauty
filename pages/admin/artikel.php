<?php
include('auth.php');
include('../../includes/db.php');

if((isset($_GET['aksi']))&&(isset($_GET['data']))){
if($_GET['aksi']=='hapus'){
$id_artikel = $_GET['data'];
//hapus data
$sql_dp = "DELETE from `artikel`
where `id_artikel` = '$id_artikel'";
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
            <h3><i class="fa fa-suitcase"></i> Artikel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Artikel</h3>
                <div class="card-tools">
                  <a href="tambahartikel.php" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  Artikel</a>
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
                        <th width="20%">Judul Artikel</th>
                        <th width="20%">Konten</th>
                        <th width="20%">Kategori Artikel</th>
                        <th width="20%">Penulis</th>
                        <th width="20%">Tanggal Terbit</th>
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
                    
                    $sql_u = "SELECT a.id_artikel,a.judul_artikel,a.konten, a.kategori_artikel, 
                    a.penulis, a.tanggal_terbit FROM artikel a";

                    if (isset($_GET["katakunci"])) {
                      $katakunci_artikel = $_GET["katakunci"];
                      $sql_u .= " WHERE `tanggal_terbit` LIKE '%$katakunci_artikel%'
                      OR `judul_artikel` LIKE '%$katakunci_artikel%' 
                      OR `kategori_artikel` LIKE '%$katakunci_artikel%' 
                      OR `penulis` LIKE '%$katakunci_artikel%'";
                    }
                    $sql_u .= " ORDER BY `id_artikel` LIMIT $posisi, $batas";
                    $query_u = mysqli_query($koneksi, $sql_u);
                    $no = $posisi + 1;
                    
                    while ($data_u = mysqli_fetch_row($query_u)) {
                      $id_artikel = $data_u[0];
                      $judul_artikel = $data_u[1];
                      $konten = $data_u[2];
                      $kategori_artikel = $data_u[3];
                      $penulis = $data_u[4];
                      $tanggal_terbit = $data_u[5];
                      echo "<tr>
                      <td>$no</td>
                      <td>$judul_artikel</td>
                       <td>$konten</td>
                        <td>$kategori_artikel</td>
                        <td>$penulis</td>
                        <td>$tanggal_terbit</td>
                      <td align='center'>
                      <a href='editartikel.php?data=$id_artikel' class='btn btn-xs btn-info'><i class='fas fa-edit'></i> Edit</a>
                      <a href=\"javascript:if(confirm('Anda yakin ingin menghapus data $id_artikel?')) window.location.href='artikel.php?aksi=hapus&data=$id_artikel&notif=hapusberhasil'\" class='btn btn-xs btn-warning'><i class='fas fa-trash'></i> Hapus</a>
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
                $sql_jum = "SELECT a.id_artikel,a.judul_artikel,a.konten, a.kategori_artikel, 
                    a.penulis, a.tanggal_terbit FROM artikel a";
                if (isset($_GET["katakunci"])) {
                  $katakunci_artikel = $_GET["katakunci"];
                  $sql_jum .= " WHERE `tanggal_terbit` LIKE '%$katakunci_artikel%'
                      OR `judul_artikel` LIKE '%$katakunci_artikel%' 
                      OR `kategori_artikel` LIKE '%$katakunci_artikel%' 
                      OR `penulis` LIKE '%$katakunci_artikel%'";
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
                      $katakunci_artikel = $_GET["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?katakunci=$katakunci_artikel&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?katakunci=$katakunci_artikel&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='artikel.php?katakunci=$katakunci_artikel&halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?katakunci=$katakunci_artikel&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?katakunci=$katakunci_artikel&halaman=$jum_halaman'>Last</a></li>";
                      }
                    }else{
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                        if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link'href='artikel.php?halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link'href='artikel.php?halaman=$jum_halaman'>Last</a></li>";
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
