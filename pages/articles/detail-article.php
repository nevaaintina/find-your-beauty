<?php include_once('../../components/header.php'); ?>

<div style="padding: 16px; margin-bottom: -16px;">
  <a href="article.php" style="display: inline-flex; align-items: center; color: var(--color-accent); text-decoration: none; font-weight: 600;">
    <span class="material-icons" style="font-size: 20px; margin-right: 6px;"></span>
    Kembali
  </a>
</div>

<!-- <!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Find Your Glow App</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
<style>
  /* Root & variables for spacing and colors */
  :root {
    --color-bg: #f9f7f1;
    --color-accent: #6a6f3f;
    --color-dark-accent: #414425;
    --color-text-primary: #3b2f2f;
    --color-text-secondary: #7a6c6c;
    --color-header-bg: #414425;
    --color-nav-bg: #e9e6d8;
    --color-footer-bg: #414425;
    --spacing-sm: 8px;
    --spacing-md: 16px;
    --spacing-lg: 32px;
    --border-radius: 16px;
    --max-width-large: 1440px;
    --max-width-desktop: 1200px;
    --font-family: 'Inter', sans-serif;
  }
  /* Reset & base */
  *, *::before, *::after {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: var(--font-family);
    color: var(--color-text-primary);
    background: var(--color-bg);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  a {
    color: var(--color-accent);
    text-decoration: none;
    transition: color 0.3s ease;
  }
  a:hover, a:focus {
    color: var(--color-dark-accent);
    outline: none;
  }
  /* Container max widths */
  .container {
    margin: 0 auto;
    padding-left: var(--spacing-md);
    padding-right: var(--spacing-md);
  }
  @media (min-width: 768px) {
    .container {
      max-width: var(--max-width-desktop);
      padding-left: var(--spacing-lg);
      padding-right: var(--spacing-lg);
    }
  }
  @media (min-width: 1440px) {
    .container {
      max-width: var(--max-width-large);
    }
  }
  /* Header */
  header {
    background: var(--color-header-bg);
    color: white;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4);
  }
  .header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--spacing-md) var(--spacing-md);
    max-width: var(--max-width-large);
    margin: 0 auto;
  }
  .header-title {
    font-weight: 700;
    font-size: 1.25rem;
    user-select: none;
  }
  /* Search */
  .search-container {
    position: relative;
    flex-grow: 1;
    max-width: 320px;
    margin-left: var(--spacing-md);
  }
  .search-input {
    width: 100%;
    padding: 6px 32px 6px 12px;
    border: none;
    border-radius: var(--border-radius);
    font-size: 1rem;
    font-family: var(--font-family);
  }
  .search-input:focus {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
  }
  .material-icons.search-icon {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-dark-accent);
    font-size: 20px;
    pointer-events: none;
  }
  /* User nav */
  .user-nav {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    margin-left: var(--spacing-md);
  }
  .user-nav button {
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .user-nav button:focus {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
  }
  /* Navigation bar */
  nav.primary-nav {
    background: var(--color-nav-bg);
    display: flex;
    justify-content: center;
    gap: var(--spacing-lg);
    padding: var(--spacing-sm) 0;
    font-weight: 600;
    font-size: 0.9rem;
    user-select: none;
  }
  nav.primary-nav a {
    color: var(--color-dark-accent);
    padding: 6px 12px;
    border-radius: var(--border-radius);
    white-space: nowrap;
    font-style: normal;
  }
  nav.primary-nav a:hover,
  nav.primary-nav a:focus {
    background-color: var(--color-accent);
    color: white;
    outline: none;
  }
  nav.primary-nav a.italic {
    font-style: italic;
  }
  /* Main content & title */
  main {
    max-width: var(--max-width-large);
    margin: var(--spacing-lg) auto;
    padding: 0 var(--spacing-md);
  }
  main h2.page-title {
    color: var(--color-dark-accent);
    font-weight: 600;
    font-size: 1.3rem;
    text-align: center;
    padding-bottom: var(--spacing-md);
    border-bottom: 2px solid var(--color-nav-bg);
    margin-bottom: var(--spacing-lg);
  }

  /* Article container */
  article.beauty-secrets {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--spacing-lg);
    max-width: var(--max-width-desktop);
    margin: 0 auto;
  }

  @media (min-width: 768px) {
    article.beauty-secrets {
      grid-template-columns: 2fr 1fr;
      gap: var(--spacing-lg);
    }
  }

  /* Article text */
  .article-content {
    background: white;
    padding: var(--spacing-lg);
    border-radius: var(--border-radius);
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    color: var(--color-text-primary);
  }

  .article-content h3 {
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: var(--spacing-md);
    color: var(--color-accent);
  }

  .article-content p {
    margin-bottom: var(--spacing-md);
    text-align: justify;
  }

  /* Article image */
  .article-image {
    width: 100%;
    margin-top: var(--spacing-md);
    border-radius: var(--border-radius);
    box-shadow: 0 6px 18px rgba(106,111,63,0.2);
    object-fit: cover;
  }

  /* Right sidebar - other articles */
  aside.sidebar {
    background: white;
    border-radius: var(--border-radius);
    padding: var(--spacing-md);
    box-shadow: 0 6px 10px rgba(0,0,0,0.05);
    font-size: 0.9rem;
  }
  aside.sidebar h4 {
    margin-top: 0;
    border-bottom: 2px solid var(--color-nav-bg);
    padding-bottom: var(--spacing-sm);
    font-weight: 600;
    color: var(--color-dark-accent);
  }
  aside.sidebar .article-item {
    display: flex;
    gap: var(--spacing-md);
    margin-top: var(--spacing-md);
    cursor: pointer;
  }
  aside.sidebar .article-item:hover,
  aside.sidebar .article-item:focus-within {
    background: var(--color-nav-bg);
    border-radius: var(--border-radius);
    outline: none;
  }
  aside.sidebar img {
    width: 80px;
    height: 50px;
    border-radius: var(--border-radius);
    object-fit: cover;
    flex-shrink: 0;
  }
  aside.sidebar .item-info {
    flex-grow: 1;
  }
  aside.sidebar .item-info a {
    font-weight: 600;
    color: var(--color-accent);
    display: block;
    line-height: 1.2;
    margin-bottom: 4px;
  }
  aside.sidebar .item-info a:hover,
  aside.sidebar .item-info a:focus {
    text-decoration: underline;
    outline: none;
  }
  aside.sidebar .item-date {
    font-size: 0.8rem;
    color: var(--color-text-secondary);
  }
  /* Footer */
  footer {
    background: var(--color-footer-bg);
    color: white;
    padding: var(--spacing-lg) var(--spacing-md);
    text-align: center;
    font-size: 0.875rem;
    user-select: none;
    letter-spacing: 1px;
  }
  footer .footer-content {
    max-width: var(--max-width-large);
    margin: 0 auto;
  }

</style>
</head>
<body>

<main role="main" class="container" tabindex="-1">

<?php 
  require_once __DIR__ . '/../../function/function.php';

  if (isset($_GET["id"])) {
    $articleId = $_GET["id"];

    $query = "SELECT * FROM artikel WHERE id_artikel = '$articleId'";
    $artikel = query($query)[0];


    $otherArticle = query("SELECT * FROM artikel WHERE id_artikel != '$articleId'");
  }

?>

  <article class="beauty-secrets" aria-label="Beauty Secrets Article">
    <section class="article-content">
      <h3><?= $artikel["judul_artikel"] ?></h3>
      <h5>By <?= $artikel["penulis"] . "  -   " . $artikel["tanggal_terbit"]?></h5>
            <img
              src="../admin/file_artikel/<?= $artikel['foto_artikel'] ?>"
              alt="Healthy skincare meal with balanced nutrition on plates arranged artfully on a wooden table"
              class="article-image"
              loading="lazy"
            />
      <p>
        <?= $artikel["konten"] ?>
      </p>

    </section>

    <aside class="sidebar" aria-label="Related articles sidebar">
      <h4>the other thing</h4>
      <?php foreach($otherArticle as $articleRow) :  ?>
      <article class="article-item" tabindex="0">
        <img src="../admin/file_artikel/<?= $articleRow['foto_artikel'] ?>" alt="Portrait of Chealsea Idan smiling during interview" loading="lazy" />
        <div class="item-info">
          <a href="detail-article.php?id=<?=$articleRow["id_artikel"]?>" tabindex="-1"><?= $articleRow["judul_artikel"] ?></a>
          <time class="item-date" datetime="2025-05-10"><?= $articleRow["tanggal_terbit"] ?></time>
        </div>
      </article>
        <?php endforeach; ?>
    </aside>
  </article>
</main>


</body>
</html>

<?php include_once('../../components/footer.php'); ?>