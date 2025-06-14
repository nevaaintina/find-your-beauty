   <?php 
   include_once('../../components/header.php'); 
   include_once('../../function/function.php');
   
   if (isset($_SESSION["id_user"])) {
      $idUser = $_SESSION["id_user"];

      
      $query = "SELECT wishlist.id_wishlist, produk.* FROM wishlist
      JOIN user ON user.id_user = wishlist.id_user
      JOIN produk ON produk.id_produk = wishlist.id_produk
      WHERE user.id_user = '$idUser'";

      $result = mysqli_query($koneksi, $query);
      $numRow = mysqli_num_rows($result);

      while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

   }

   if (isset($_GET["delete"])) {
      $id = $_GET["delete"];
       $query = "DELETE FROM wishlist WHERE
    id_wishlist = $id
    ";
    mysqli_query($koneksi, $query);

   header("Location: wishlist.php");
   exit;

   }
   ?> 
  <!-- Main content -->
  <main class="flex-grow px-4 py-6 max-w-3xl mx-auto w-full">
   <div class="flex justify-center items-center mb-6 space-x-6">
    <h2 class="italic font-semibold text-base border-b border-[#4a4f2a] pb-1">
     My Wishlist
    </h2>
    <p class="text-xs">
     Total Produk : <?= $numRow ?>
    </p>
   </div>
   <!-- Wishlist items container -->
   <section class="space-y-6">
    <!-- Item 1 -->
     <?php if ($numRow == 0) : ?>
   <div class="text-center text-sm text-[#4a4f2a] py-12">
    <i class="fas fa-heart-broken text-3xl text-[#4a4f2a]/50 mb-4"></i>
    <p class="font-semibold">Wishlist kamu masih kosong</p>
    <p class="text-xs text-[#4a4f2a]/70">Yuk, tambahkan produk yang kamu suka ke wishlist!</p>
  </div>
     <?php else: foreach($rows as $row) : ?>
    <article class="bg-[#f0edd2] rounded-lg p-4 flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6 border border-[#4a4f2a]/30">
     <div class="bg-white rounded-lg p-3 flex-shrink-0 w-20 h-20 flex items-center justify-center">
      <img alt="Bottle of Skintific Mugwort Purifying Micellar Water with green label" class="max-w-full max-h-full object-contain" height="80" src="../admin/foto_produk/<?= $row['foto_produk'] ?>" width="80"/>
     </div>
     <div class="flex-1 flex flex-col space-y-1 text-xs sm:text-sm">
      <strong class="text-[#4a4f2a]">
       <?= $row["nama_produk"] ?>
      </strong>
      <span>
       Mugwort Purifying Micellar Water
      </span>
      <div class="flex items-center space-x-1 text-pink-600">
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
       <span class="text-[#4a4f2a] font-normal">
        4,5
       </span>
      </div>
      <span>
       <?= $row["jenis_kulit"] ?>
      </span>
      <div class="flex space-x-4 mt-3">
       <a href="wishlist.php?delete=<?=$row["id_wishlist"]?>" class="bg-[#4a4f2a] text-[#d9d9d9] rounded-full px-4 py-1 text-[10px] sm:text-xs font-light" onclick="return confirm('apakah anda yakin ingin menghapus wishlist?')">
        - Hapus
       </a>
       <button class="bg-[#4a4f2a] text-[#d9d9d9] rounded-full px-4 py-1 text-[10px] sm:text-xs font-light" type="button">
        Tambahkan Ke Review
       </button>
      </div>
     </div>
    </article>
    <?php endforeach; 
   endif;
    ?>
   </section>
  </main>
  <!-- Footer -->
   <?php include_once('../../components/footer.php'); ?> 