<?php 
include_once('components/header.php');
include_once('components/navbar.php');
require_once __DIR__ . '/function/function.php';

// Ambil artikel terbaru
$article = query("SELECT * FROM artikel ORDER BY tanggal_terbit DESC LIMIT 1");
$article = $article ? $article[0] : null;

// Siapkan konten preview jika ada artikel
$preview = '';
if ($article) {
    $konten = strip_tags($article["konten"]);
    $kata = explode(' ', $konten);
    $preview = implode(' ', array_slice($kata, 0, 30));
}

// Ambil 4 produk unggulan berdasarkan rating tertinggi
$produkUnggulan = query("
    SELECT p.id_produk, p.nama_produk, p.foto_produk, p.brand_produk,
    IFNULL(AVG(r.rating), 0) AS rata_rating, COUNT(r.id_review) AS jumlah_review
    FROM produk p LEFT JOIN review r ON p.id_produk = r.id_produk
    GROUP BY p.id_produk ORDER BY rata_rating DESC LIMIT 4");
?>

<!-- Banner -->
<section class="max-w-7xl mx-auto mt-6 px-6 py-6">
  <div class="relative h-72 md:h-96 rounded-md overflow-hidden group">
    <!-- 2 Layer untuk transisi gambar -->
    <div class="absolute inset-0 w-full h-full bg-cover bg-center rounded-md transition-opacity duration-1000 opacity-100" id="banner1"></div>
    <div class="absolute inset-0 w-full h-full bg-cover bg-center rounded-md transition-opacity duration-1000 opacity-0" id="banner2"></div>

    <!-- Overlay konten -->
    <div class="absolute inset-0 bg-black/30 flex flex-col justify-center px-10 text-white z-10">
      <h2 class="text-xl md:text-2xl font-semibold mb-4 leading-snug">Temukan Produk Skincare Untuk Kulit Sehat Berseri</h2>
      <a href="pages/products/product.php"
   class="bg-white text-[#3a3a3a] text-sm font-semibold rounded-md px-6 py-2 w-fit hover:bg-[#f1f1f1] hover:scale-105 transition-all duration-300 shadow-md hover:shadow-lg">
   Lihat Produk
</a>

    </div>
  </div>
</section>



<!-- Jenis Kulit -->
<section class="max-w-7xl mx-auto mt-10 px-4">
  <h3 class="text-[#3a3a3a] font-playfair font-semibold text-lg mb-6 text-center">Jenis Kulit</h3>
  <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-xl mx-auto text-center text-xs text-[#3a3a3a]">
    <?php
    $kategori_kulit = [
      ['Kulit Kering', '00eabf49-c6eb-4410-ab40-523199ebc69f.jpg'],
      ['Kulit Berminyak', '0b16d1a4-05b8-4554-ec92-4d383ebb84af.jpg'],
      ['Kulit Sensitive', '2b2add8f-f438-4e46-25d3-57a37990bfb1.jpg'],
      ['Kulit Kombinasi', 'dc1b1ee7-d5de-4780-dfa6-6136c6e8bb52.jpg'],
    ];
    foreach ($kategori_kulit as $k) {
      echo "
      <div class='flex flex-col items-center space-y-2 transform hover:scale-105 hover:shadow-md transition-all duration-300 cursor-pointer p-3 rounded-md bg-white'>
        <img src='https://storage.googleapis.com/a1aa/image/{$k[1]}' alt='{$k[0]}'
             class='rounded-md shadow-md w-20 h-20 object-cover'>
        <span class='mt-2'>{$k[0]}</span>
      </div>";
    }
    ?>
  </div>
</section>


<!-- Produk Unggulan -->
<section class="max-w-7xl mx-auto mt-10 px-4">
  <h3 class="text-[#3a3a3a] font-playfair font-semibold text-lg mb-6 text-center">Produk Unggulan</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-sm text-[#3a3a3a]">
    <?php foreach ($produkUnggulan as $item): ?>
      <a href="pages/products/detail/detail-product.php?id_produk=<?= $item['id_produk'] ?>"
   class="bg-white shadow-md rounded-md overflow-hidden transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300">

        <img src="pages/admin/foto_produk/<?= htmlspecialchars($item['foto_produk']) ?>" alt="<?= htmlspecialchars($item['nama_produk']) ?>" class="w-full h-48 object-contain p-4 bg-white mx-auto">
        <div class="p-4">
          <h5 class="font-semibold text-base mb-1"><?= htmlspecialchars($item['nama_produk']) ?></h5>
          <p class="text-xs mb-1"><strong>Brand:</strong> <?= htmlspecialchars($item['brand_produk']) ?></p>
          <p class="text-xs text-[#e91e63]">❤️<?= number_format($item['rata_rating'], 1) ?> (<?= $item['jumlah_review'] ?> review)</p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<!-- Artikel Terbaru -->
<?php if ($article): ?>
<section class="max-w-7xl mx-auto mt-10 px-6 py-6 flex flex-col md:flex-row items-center bg-[#f5f0e9] gap-6 transition-all duration-500 hover:shadow-md">
  <div class="flex-1 text-[#3a3a3a] text-sm leading-relaxed transition duration-300 hover:scale-[1.01]">
    <h4 class="font-playfair font-semibold text-base mb-3"><?= htmlspecialchars($article["judul_artikel"]) ?></h4>
    <p><?= $preview ?> ....</p>
    <a href="pages/articles/detail-article.php?id=<?= $article["id_artikel"] ?>" class="mt-4 inline-block text-[#6e6a5a] font-semibold text-xs hover:underline hover:text-[#3a3a3a] transition-all">Learn More</a>
  </div>
  <div class="flex-1 flex justify-center md:justify-end">
    <img src="pages/admin/file_artikel/<?= $article['foto_artikel'] ?>" alt="Foto artikel"
         class="rounded-md object-cover w-full h-60 transition-transform duration-500 hover:scale-105">
  </div>
</section>

<?php endif; ?>

<?php include_once('components/footer.php'); ?>

<!-- Banner Slider Script -->
<script>
  const images = [
    'assets/slide1.jpg',
    'assets/slide2.jpg',
    'assets/slide3.jpg'
  ];

  let current = 0;
  const banner1 = document.getElementById('banner1');
  const banner2 = document.getElementById('banner2');
  banner1.style.backgroundImage = `url('${images[0]}')`;

  setInterval(() => {
    const next = (current + 1) % images.length;
    // Set gambar berikutnya di layer belakang
    banner2.style.backgroundImage = `url('${images[next]}')`;
    banner2.style.opacity = 1;

    setTimeout(() => {
      // Setelah transisi selesai, tukar posisi dan reset
      banner1.style.backgroundImage = banner2.style.backgroundImage;
      banner2.style.opacity = 0;
      current = next;
    }, 1000); // Waktu sama dengan duration CSS (1000ms)
  }, 4000); // Ganti tiap 4 detik
</script>


