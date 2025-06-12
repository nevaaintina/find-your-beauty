<?php
session_start();
include('auth.php');
include('../../includes/db.php');

if(isset($_GET['data'])){
  $id_artikel = $_GET['data'];
  $_SESSION['id_artikel']=$id_artikel;

  //get data riwayat pekerjaan
  $sql_m = "SELECT judul_artikel, konten, kategori_artikel, penulis, tanggal_terbit FROM artikel WHERE id_artikel='$id_artikel'";
  $query_m = mysqli_query($koneksi, $sql_m);
  while($data_m = mysqli_fetch_row($query_m)){
    $judul_artikel= $data_m[0];
    $konten = $data_m[1];
    $kategori_artikel = $data_m[2];
    $penulis = $data_m[3];
    $tanggal_terbit = $data_m[4];
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
            <h3><i class="fas fa-edit"></i> Edit Data Artikel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="artikel.php">Data Artikel</a></li>
              <li class="breadcrumb-item active">Edit Data Artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Artikel</h3>
        <div class="card-tools">
          <a href="artikel.php" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
        <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
        <?php if($_GET['notif']=="editkosong"){?>
        <div class="alert alert-danger" role="alert">Maaf data
        <?php echo $_GET['jenis'];?> wajib di isi</div>
        <?php }?>
        <?php }?>
      </div>
      <form class="form-horizontal" action="konfirmasitambahartikel.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="judul_artikel" class="col-sm-3 col-form-label">Judul Artikel</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul_artikel" id="judul_artikel" value="<?php echo $judul_artikel; ?>">
            </div>
          </div>   
          <div class="form-group row">
            <label for="konten" class="col-sm-3 col-form-label">Konten</label>
            <div class="col-sm-7">
              <input type="file" class="form-control" name="konten" id="konten">
            </div>
          </div>  
          <div class="form-group row">
            <label for="kategori_artikel" class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="kategori_artikel" id="kategori_artikel" value="<?php echo $kategori_artikel; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="penulis" class="col-sm-3 col-form-label">Penulis</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="penulis" id="penulis" value="<?php echo $penulis; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal_terbit" class="col-sm-3 col-form-label">Tanggal Terbit</label>
            <div class="col-sm-7">
              <input type="date" class="form-control" name="tanggal_terbit" id="tanggal_terbit" value="<?php echo $tanggal_terbit; ?>">
            </div>
          </div>            
          
          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
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
