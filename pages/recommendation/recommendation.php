<?php 
  require('../../components/header.php');   
  require_once __DIR__ . '/../../function/function.php';

  $result = query("SELECT produk.nama_produk, produk.jenis_kulit, produk.id_produk, produk.foto_produk FROM rekomendasi
            JOIN produk ON produk.id_produk = rekomendasi.id_produk
  ");

?>
  <!-- Main content -->
  <main class="flex-grow max-w-7xl mx-auto px-3 py-6">
   <h2 class="font-playfair italic font-bold text-center text-sm sm:text-base text-[#3a3a3a] mb-6 border-t border-b border-[#3a3a3a] py-2">
    Best Recommendation Products This Month
   </h2>
   <section class="grid grid-cols-1 sm:grid-cols-3 gap-6">
    <!-- Card 1 -->
     <?php foreach($result as $row) : ?>
    <article class="bg-[#ede9d0] rounded-lg p-4 flex flex-col items-center text-center">
     <img class="mb-3" height="120" src="../admin/foto_produk/<?= $row['foto_produk'] ?>" alt="<?= $row['nama_produk'] ?>" width="80"/>
     <h3 class="font-bold text-xs leading-tight">
        <?= $row["nama_produk"] ?>
     </h3>
     <p class="text-[10px] mt-1">
      Jenis Kulit :
      <br/>
      <b>
        <?= $row["jenis_kulit"] ?>
      </b>
     </p>
     <p class="text-pink-500 mt-1 text-xs">
      ❤️❤️❤️
     </p>
     <a href="/find-your-beauty/pages/products/detail/detail-product.php?produk=<?=$row["id_produk"] ?>" class="mt-2 text-[10px] text-[#3a3a3a] hover:underline" type="button">
      Lihat Produk
     </a>
    </article>
    <?php endforeach ?>
   </section>
  </main>
<?php 
  require('../../components/footer.php');
?>