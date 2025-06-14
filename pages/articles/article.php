  <?php 
  
  include_once('../../components/header.php'); 
  require_once __DIR__ . '/../../function/function.php';

  $result = query("SELECT * FROM artikel");

  
  ?>
  <!-- Main content -->
  <main class="flex-grow px-6 py-6 max-w-6xl mx-auto">
    <!-- latest article heading -->
    <div class="flex items-center justify-center space-x-3 mb-6">
      <hr class="border-t border-[#3a3b1a] w-24"/>
    <h2 class="italic-playfair text-[#3a3b1a] text-lg select-text">
     Latest Article
    </h2>
    <hr class="border-t border-[#3a3b1a] w-24"/>
   </div>
   <!-- latest articles cards -->
   <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
     <?php foreach($result as $row)  : ?>
    <article class="bg-[#f3f0d7] rounded-xl p-4 max-w-md mx-auto sm:mx-0" style="min-width: 320px;">
     <img alt="Teenage girl smiling and applying skincare cream on her face in a bright setting" class="rounded-xl mb-3 w-full object-cover" height="180" src="../admin/file_artikel/<?= $row['foto_artikel'] ?>" width="320"/>
     <a href="detail-article.php?id=<?=$row["id_artikel"]?>">
     <h3 class="text-sm font-semibold text-[#000000cc] mb-1 leading-snug">
      <?= $row["judul_artikel"] ?>
     </h3>
     </a>
     <p class="text-[9px] text-[#3a3b1a] font-light">
      by <?= $row["penulis"] ?>
     </p>
    </article>
    <?php endforeach ?>
   </div>
  </main>
  

<?php include_once('../../components/footer.php'); ?>