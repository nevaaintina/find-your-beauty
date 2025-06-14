<?php
include('auth.php');
include('../../includes/db.php');

if(isset($_GET['data'])){
  $id_produk = $_GET['data'];
  $_SESSION['id_produk']=$id_produk;

  //get data riwayat pendidikan
  $sql_m = "SELECT nama_produk, foto_produk,brand_produk,kategori_produk, 
  deskripsi_produk, jenis_kulit FROM produk WHERE id_produk='$id_produk'";
  $query_m = mysqli_query($koneksi, $sql_m);
  while($data_m = mysqli_fetch_row($query_m)){
    $nama_produk= $data_m[0];
    $foto_produk= $data_m[1];
    $brand_produk = $data_m[2];
    $kategori_produk = $data_m[3];
    $deskripsi_produk = $data_m [4];
    $jenis_kulit = $data_m [5];
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
            <h3><i class="fas fa-edit"></i> Edit Produk</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Data Produk</a></li>
              <li class="breadcrumb-item active">Edit Data Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Produk</h3>
        <div class="card-tools">
          <a href="produk.php" class="btn btn-sm btn-warning float-right">
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
      <form class="form-horizontal" action="konfirmasieditproduk.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?php echo $nama_produk; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="fpto_produk" class="col-sm-3 col-form-label">Foto Produk</label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto_produk" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="brand_produk" class="col-sm-3 col-form-label">Brand</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="brand_produk" id="brand_produk" value="<?php echo $brand_produk; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori_produk" class="col-sm-3 col-form-label">Kategori Produk</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="kategori_produk" id="kategori_produk" value="<?php echo $kategori_produk; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi_produk" class="col-sm-3 col-form-label">Deskripsi Produk</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="5"><?php echo $deskripsi_produk; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_kulit" class="col-sm-3 col-form-label">Jenis Kulit</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="jenis_kulit" id="jenis_kulit" value="<?php echo $jenis_kulit; ?>">
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