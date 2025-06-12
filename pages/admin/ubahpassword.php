<?php
// session_start();

include('auth.php');
include('../../includes/db.php');


if (isset($_POST['simpan'])) {
    $id_user = $_SESSION['id_user'];
    $password_lama = md5($_POST['password_lama']);
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // Validasi konfirmasi
    if (empty($konfirmasi_password)) {
        $error = "Mohon maaf, konfirmasi password baru wajib diisi.";
    } elseif ($password_baru !== $konfirmasi_password) {
        $error = "Konfirmasi password tidak cocok.";
    } else {
        // Cek apakah password lama cocok
        $sql = "SELECT * FROM user WHERE id_user = '$id_user' AND password = '$password_lama'";
        $query = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($query) > 0) {
            $password_baru_md5 = md5($password_baru);
            $update = "UPDATE user SET password = '$password_baru_md5' WHERE id_user = '$id_user'";
            mysqli_query($koneksi, $update);
            $success = "Password berhasil diubah.";
        } else {
            $error = "Password lama salah.";
        }
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
            <h3><i class="fas fa-user-lock"></i> Ubah Password</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Ubah Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengaturan Password</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php if(!empty($_GET['notif'])){
if($_GET['notif']=="editberhasil"){?>
<div class="alert alert-success" role="alert">
Data Berhasil Diubah</div>
<?php }?>
<?php }?>

      <form class="form-horizontal" method="post" action="">
  <div class="card-body">
    <?php if (!empty($error)) { ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } elseif (!empty($success)) { ?>
      <div class="alert alert-success"><?php echo $success; ?></div>
    <?php } ?>

    <div class="form-group row">
      <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
      <div class="col-sm-7">
        <input type="password" class="form-control" id="pass_lama" name="password_lama" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
      <div class="col-sm-7">
        <input type="password" class="form-control" id="pass_baru" name="password_baru" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
      <div class="col-sm-7">
        <input type="password" class="form-control" id="konfirmasi" name="konfirmasi_password" required>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="col-sm-10">
      <button type="submit" name="simpan" class="btn btn-info float-right">
        <i class="fas fa-save"></i> Simpan
      </button>
    </div>
  </div>
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
