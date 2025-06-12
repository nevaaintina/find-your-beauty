<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Find Your Glow App - Cleanser</title>
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
</head>
<body>

<header>
  <div class="header-inner" role="banner" aria-label="Header navigation">
    <div class="logo" tabindex="0">Find Your Glow App</div>

    <div class="search-bar" role="search">
      <input 
        type="search" 
        aria-label="Search products" 
        placeholder="Search..." />
    </div>

    <div class="user-controls" aria-label="User controls">
      <button aria-label="Register or Login" title="Register / Login" tabindex="0">
        <span class="material-icons" aria-hidden="true">person_outline</span>
      </button>
      <button aria-label="Language selector" title="Select Language" tabindex="0">
        <span class="material-icons" aria-hidden="true">language</span>
      </button>
    </div>
  </div>
</header>

<nav class="primary-nav" role="navigation" aria-label="Primary site navigation">
  <div class="nav-inner">
    <div class="nav-item" tabindex="0">Product</div>
    <div class="nav-item" tabindex="0">Reviews</div>
    <div class="nav-item" tabindex="0">Recommendation</div>
    <div class="nav-item" tabindex="0">Forum</div>
    <div class="nav-item" tabindex="0" style="font-style: italic; color:#8f8e7d;">Article</div>
    <div class="nav-item" tabindex="0" style="font-style: normal; font-weight: 400; color:#a09879;">Wishlist</div>
    <div class="nav-item" tabindex="0" style="font-style: italic; font-weight: 400; color:#a09879;">Profil</div>
  </div>
</nav>

<main>
  <h2 class="section-title" aria-label="Section Title Cleanser" tabindex="0">CLEANSER</h2>

  <section aria-labelledby="micellarwater-label" class="product-row">
    <div class="product-row-label" id="micellarwater-label">Micelar Water</div>
    <div class="product-card">
      <img src="https://placehold.co/140x160/png?text=Garnier+Micellar+Water+Pink+Bottle" alt="Micellar Water Garnier pink bottle product" loading="lazy" />
    </div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/9c4fab4c-5b49-4ae2-b167-accf9b22c2c3.png" alt="Micellar Water Innisfree green bottle product" loading="lazy" />
    </div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/95da8cbb-99cd-4cd2-b7c5-35eb3b1e556d.png" alt="Simple Micellar Water clear bottle product" loading="lazy" />
    </div>
  </section>

  <section aria-labelledby="facialwash-label" class="product-row">
    <div class="product-row-label" id="facialwash-label">Facial Wash</div>
    <div class="product-card">
      <img src="https://placehold.co/140x160/png?text=Cetaphil+Facial+Wash+Blue+Bottle" alt="Cetaphil Facial Wash blue bottle product" loading="lazy" />
    </div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/65810c21-dbd7-4966-b086-8e243575b92c.png" alt="Clay Facial Wash white tube product" loading="lazy" />
    </div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6a835dbe-edf8-4e9f-b82f-9b0ee61daaf3.png" alt="Senka Perfect Whip blue tube product" loading="lazy" />
    </div>
  </section>

  <section aria-labelledby="cleansingoil-label" class="product-row">
    <div class="product-row-label" id="cleansingoil-label">Cleansing Oil</div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/aa0f5497-adb3-4940-be48-eeaf70d9734b.png" alt="Lanville Cleansing Oil pump bottle product" loading="lazy" />
    </div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b86f2334-d0d6-4d0a-bf31-7b196457091b.png" alt="Alpha Cleansing Oil purple pump bottle product" loading="lazy" />
    </div>
    <div class="product-card">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c68b5246-96dc-4a65-949d-a364fcae03cf.png" alt="MAKE UP Cleansing Oil clear pump bottle product" loading="lazy" />
    </div>
  </section>
</main>

<footer role="contentinfo">
  <p>
    © 2025 Your Find Glow. All Rights Reserved. <br />
    By <a href="#" tabindex="0">NAT | NEVA AWALIA TIARA</a>.
  </p>
</footer>

</body>
</html>
