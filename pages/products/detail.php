  <?php 
  require('../../components/header.php');

  
  ?> 

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    /* CSS Reset */
    *, *::before, *::after {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Outfit', sans-serif;
      background-color: #f3f0e7;
      color: #484a38;
      line-height: 1.5;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    a {
      color: inherit;
      text-decoration: none;
    }
    a:hover, a:focus {
      text-decoration: underline;
    }

    /* Header */
    header {
      background-color: #4b503d;
      color: #f3f0e7;
      padding: 0.8rem 1rem;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 8px rgb(0 0 0 / 0.15);
    }

    .header-inner {
      max-width: 1440px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .logo {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.25rem;
      user-select: none;
    }

    /* Search Bar */
    .search-bar {
      flex: 1;
      margin: 0 1rem;
      max-width: 360px;
    }
    .search-bar input {
      width: 100%;
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      font-size: 0.9rem;
    }
    .search-bar input:focus {
      outline: 2px solid #bbb;
    }

    /* User Controls */
    .user-controls {
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .user-controls button {
      background: none;
      border: none;
      color: #f3f0e7;
      font-size: 1.25rem;
      cursor: pointer;
      display: flex;
      align-items: center;
    }
    .user-controls button:focus {
      outline: 2px solid #c3c3a5;
      outline-offset: 2px;
    }

    /* Navigation */
    nav.primary-nav {
      background: #edeadc;
      max-width: 1440px;
      margin: 1rem auto 2rem auto;
      padding: 0 1rem;
    }
    .nav-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
    }
    .nav-item {
      font-weight: 600;
      font-family: 'Outfit', sans-serif;
      font-style: italic;
      color: #595a4f;
      cursor: pointer;
      white-space: nowrap;
      line-height: 1;
      padding: 6px 8px;
      user-select: none;
      transition: color 0.3s ease;
    }
    .nav-item:hover,
    .nav-item:focus {
      color: #4b503d;
      outline: none;
    }

    /* Section Title Cleanser */
    main {
      flex: 1 0 auto;
      max-width: 1440px;
      margin: 0 auto 3rem auto;
      padding: 0 1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .section-title {
      background: #e6e2d6;
      padding: 12px 52px;
      border-radius: 28px;
      margin-bottom: 2rem;
      font-weight: 700;
      letter-spacing: 6px;
      font-family: 'Poppins', sans-serif;
      color: #484a38;
      user-select: none;
    }

    /* Product Grid Container */
    .product-grid {
      width: 100%;
      max-width: 1200px;
      display: grid;
      gap: 2rem 3rem;
    }
    @media(min-width: 768px) {
      .product-grid {
        grid-template-columns: 1fr 1fr 1fr;
      }
    }
    @media(max-width:767px){
      .product-grid {
        grid-template-columns: 1fr;
        gap: 2rem 2rem;
      }
    }

    /* Product Row with label on left and 3 product cards on right */
    .product-row {
      display: grid;
      grid-template-columns: 120px 1fr 1fr 1fr;
      align-items: center;
      gap: 1.2rem;
      padding: 0.5rem 0;
    }
    @media(max-width:767px){
      .product-row {
        grid-template-columns: 1fr;
        row-gap: 1.8rem;
        padding: 0;
        text-align: center;
      }
      .product-row-label {
        grid-column: 1/-1;
        margin-bottom: 0.5rem;
      }
    }

    /* Label for product row */
    .product-row-label {
      font-weight: 600;
      font-family: 'Outfit', sans-serif;
      font-style: normal;
      letter-spacing: 0.07rem;
      font-size: 1rem;
      color: #484a38;
      user-select: none;
      white-space: nowrap;
      padding-left: 8px;
      border-right: 1px solid #aaa995;
    }

    /* Individual product card */
    .product-card {
      background: white;
      border-radius: 16px;
      padding: 1rem;
      box-shadow: 0 1px 5px rgb(0 0 0 / 0.1);
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .product-card img {
      max-width: 140px;
      border-radius: 12px;
      max-height: 160px;
      object-fit: contain;
      user-select: none;
    }

    /* Footer */
    footer {
      background-color: #4b503d;
      color: #d6d6c2;
      padding: 1rem 1rem 2rem 1rem;
      text-align: center;
      font-family: 'Outfit', sans-serif;
      font-style: italic;
      font-weight: 400;
      font-size: 0.85rem;
      user-select: none;
    }
    footer a {
      color: #cfd9bf;
      font-weight: 600;
      letter-spacing: 0.12rem;
      text-decoration: none;
    }
    footer a:hover,
    footer a:focus {
      text-decoration: underline;
    }

    /* Utility to center small icons next to text */
    .icon-btn {
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
  </style>
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />


<?php 
require_once __DIR__ . '/../../function/function.php';

if (isset($_GET["category"])) {
  $category = $_GET["category"];

  $query = "SELECT * FROM produk WHERE kategori_produk = '$category' ORDER BY sub_kategori ASC, nama_produk ASC";
  $produk = query($query);

  $produk_by_sub = [];

foreach ($produk as $item) {
  $sub = $item['sub_kategori'] ?? 'Lainnya';
  $produk_by_sub[$sub][] = $item;
}

}



?>
<main>
  
  <h2 class="section-title" aria-label="Section Title <?= strtoupper($category) ?>" tabindex="0"><?= strtoupper($category) ?></h2>

  <?php foreach ($produk_by_sub as $sub => $items) : ?>
    <section aria-labelledby="<?= strtolower(str_replace(' ', '', $sub)) ?>-label" class="product-row">
      <div class="product-row-label" id="<?= strtolower(str_replace(' ', '', $sub)) ?>-label"><?= htmlspecialchars($sub) ?></div>

      <?php foreach ($items as $produk) : ?>
        <div class="product-card">
          <a href="detail/detail-product.php?produk=<?=$produk['id_produk']?>">
          <img src="../admin/foto_produk/<?= $produk['foto_produk'] ?>" alt="<?= $produk['nama_produk'] ?>" loading="lazy" />
          </a>
        </div>
      <?php endforeach; ?>
    </section>
  <?php endforeach; ?>
</main>

<?php 
  require('../../components/footer.php');
?>