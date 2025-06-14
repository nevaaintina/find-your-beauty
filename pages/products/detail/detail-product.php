    
  <?php require('../../../components/header.php'); 
  require_once __DIR__ . '/../../../function/function.php';

  if (isset($_SESSION["id_user"])) {
    $idUser = $_SESSION["id_user"];
  }

  if (isset($_GET["produk"])){
    $produk = $_GET["produk"];
    $query = "SELECT * FROM produk WHERE id_produk = '$produk'";

    $result = query($query)[0];
  }

  if (isset($_POST["submit"])) {
      if (!isset($_SESSION["id_user"])) {
     echo "<script>
    alert('Silakan login terlebih dahulu untuk menambahkan wishlist!');
    window.location.href = '/find-your-beauty/pages/register/login.php';
    </script>";
  exit;
      }
  
  $wishlist = mysqli_query($koneksi, "SELECT * FROM wishlist WHERE id_user = '$idUser' AND id_produk = " . $result["id_produk"] . "");
  if (mysqli_num_rows($wishlist) == 0) {
    $query = "INSERT INTO wishlist (id_user, id_produk) VALUES ('$idUser', '" . $result["id_produk"] . "')";
    mysqli_query($koneksi, $query);
  } else {
    echo "<script>
    alert('anda telah menambahkan produk ini ke dalam wishlist!');
  </script>";
  }


if (mysqli_affected_rows($koneksi) == 1) {
  echo "<script>
    alert('Berhasil menambahkan ke wishlist!');
    window.location.href = '../../wishlist/wishlist.php';
  </script>";
  exit;
}


  


  }


  $queryReview = "SELECT review.*, user.username, user.foto, user.jenis_kulit FROM review
          JOIN user ON user.id_user = review.id_user
          WHERE review.id_produk = '$produk'";

  $review = query($queryReview);
  ?> 

  <!-- Main content -->
  <main class="flex-grow max-w-5xl mx-auto px-4 sm:px-6 md:px-10 py-6">
    <a href="javascript:history.back()" class="inline-block mb-4 bg-[#4a503d] text-[#d9d9c3] text-xs sm:text-sm font-semibold rounded-full px-4 py-1 hover:bg-[#3a3a2e] transition">
  ← Back
</a>

   <section class="flex flex-col md:flex-row md:space-x-10">
    <!-- Product image -->
    <div class="flex-shrink-0 mx-auto md:mx-0 mb-6 md:mb-0 w-40 sm:w-48 md:w-56">
     <img alt="NPURE Cica Beat The Sun SPF 50 PA+++ dark green tube with yellow sun icon and white text" class="w-full h-auto object-contain" height="400" src="../../admin/foto_produk/<?= $result['foto_produk'] ?>" width="224"/>
    </div>
    <!-- Product details -->
    <div class="flex-1">
     <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
      <div>
       <h2 class="text-xl font-semibold mb-1">
        <?= $result["brand_produk"] ?>
       </h2>
       <p class="text-sm sm:text-base font-normal text-[#3a3a2e]">
            <?= $result["nama_produk"] ?>
       </p>
      </div>
    <form action="" method="POST">
  <button class="mt-4 sm:mt-0 bg-[#4a503d] text-[#d9d9c3] text-xs sm:text-sm font-semibold rounded-full px-4 py-1 hover:bg-[#3a3a2e] transition" type="submit" name="submit">
    + Add To Wishlist
  </button>
    </form>

     </div>
     <div class="flex flex-col sm:flex-row sm:space-x-8 mb-6">
      <!-- Rating -->
      <div class="flex flex-col items-center justify-center border border-[#3a3a2e] rounded-lg w-20 h-20 mb-4 sm:mb-0">
       <span class="text-2xl font-semibold leading-none">
        4,8
       </span>
       <div class="flex space-x-1 mt-1 text-[#e74c3c]">
        <i class="fas fa-heart">
        </i>
        <i class="fas fa-heart">
        </i>
        <i class="fas fa-heart">
        </i>
        <i class="fas fa-heart">
        </i>
        <i class="fas fa-heart">
        </i>
       </div>
      </div>
      <!-- User reviews and recommendations -->
      <div class="flex flex-col justify-center border border-[#3a3a2e] rounded-lg px-4 py-2 text-xs sm:text-sm leading-tight">
       <p class="flex items-center mb-1">
        <i class="fas fa-user mr-2">
        </i>
        120 users
       </p>
       <p class="flex items-center mb-1">
        <i class="fas fa-check-circle mr-2">
        </i>
        Reviewed this
       </p>
       <p class="flex items-center">
        <i class="fas fa-user-check mr-2">
        </i>
        91% users
       </p>
       <p class="flex items-center">
        <i class="fas fa-thumbs-up mr-2">
        </i>
        Recommended this
       </p>
      </div>
     </div>
     <hr class="border-[#3a3a2e] mb-4"/>
     <h3 class="font-semibold mb-2">
      Description
     </h3>
     <p class="text-xs sm:text-sm leading-relaxed">
        <?= $result["deskripsi_produk"] ?>
     </p>
    </div>
   </section>
   <!-- Member's Review -->
   <section class="mt-10">
    <h3 class="font-semibold text-sm sm:text-base mb-4">
     MEMBER'S REVIEW
    </h3>
    <?php 
    if ($review == null) : ?>
  <div class="text-center text-sm text-[#4a4f2a] py-10">
    <i class="fas fa-comment-dots text-3xl text-[#4a4f2a]/50 mb-3"></i>
    <p class="font-semibold">Belum ada review untuk produk ini.</p>
    <p class="text-xs text-[#4a4f2a]/70">Jadilah yang pertama memberikan review dan bantu pengguna lain!</p>
  </div>

    <?php else : foreach($review as $row) : ?>
    <article class="flex flex-col sm:flex-row sm:space-x-4 border border-[#3a3a2e] rounded-lg p-4 mb-6">
     <div class="flex-shrink-0 flex flex-col items-center sm:items-start mb-4 sm:mb-0">
      <img alt="Profile image of Awalicia, a combination skin type woman with short hair" class="rounded-full w-16 h-16 object-cover mb-2" height="64" src="../../admin/foto/<?= $row['foto'] ?>" width="64"/>
      <p class="text-xs sm:text-sm font-semibold">
       <?= $row["username"] ?>
      </p>
      <p class="text-xs sm:text-sm font-normal">
        <?= $row["jenis_kulit"] ?>
      </p>
     </div>
     <div class="flex-1 text-xs sm:text-sm leading-relaxed">
      <div class="flex space-x-1 text-[#e74c3c] mb-2">
      <?= str_repeat('❤️', $row['rating']) ?>
      </div>
      <p>
       Awalicia, recommends this product!
       <br/>
       <?= $row["komentar"] ?>
      </p>
     </div>
    </article>
    <?php endforeach; ?>
    <?php endif; ?>
   </section>
  </main>
  <!-- Add to Reviews button -->
  <div class="max-w-5xl mx-auto px-4 sm:px-6 md:px-10 mb-10">
   <button class="bg-[#4a503d] text-[#d9d9c3] text-sm font-semibold rounded-full px-6 py-2 hover:bg-[#3a3a2e] transition w-full sm:w-auto">
    + Add To Reviews
   </button>
  </div>

    <?php require('../../../components/footer.php'); ?> 