<?php include_once('../../components/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Find Your Glow App - Sign In</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <style>
    /* Reset & base */
    *, *::before, *::after {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Outfit', sans-serif;
      background-color: #f3f2eb;
      color: #47562e;
      line-height: 1.5;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    
    /* Root colors for reuse */
    :root {
      --green-dark: #47562e;
      --green-light: #f3f2eb;
      --accent: #47562e;
      --border: #8a8a78;
    }

    /* Header styles */
    header {
      background-color: var(--green-dark);
      color: var(--green-light);
      padding: 0.75rem 1.25rem;
      font-weight: 600;
      font-size: 0.875rem;
      user-select: none;
    }

    /* Header bottom navigation container */
    .nav-main {
      background-color: var(--green-light);
      color: var(--green-dark);
      display: flex;
      flex-direction: column;
      border-bottom: 1px solid #ccc8b8;
    }

    /* Top nav bar with logo, search, user, language */
    .nav-top {
      display: flex;
      align-items: center;
      padding: 0.5rem 1rem;
      justify-content: space-between;
      position: relative;
      flex-wrap: wrap;
      gap: 0.75rem;
      background: var(--green-light);
    }

    .nav-top .logo {
      flex-grow: 1;
      font-weight: 700;
      font-size: 1.5rem;
      font-family: 'Outfit', sans-serif;
      text-align: center;
      letter-spacing: 0.03em;
      color: var(--green-dark);
    }

    /* Search container and input */
    .search-container {
      display: flex;
      align-items: center;
      background: var(--green-light);
      border: 1px solid var(--border);
      border-radius: 8px;
      max-width: 280px;
      flex-grow: 1;
      min-width: 180px;
      padding: 0 0.75rem;
      gap: 0.5rem;
    }

    .search-container input[type="search"] {
      border: none;
      background: transparent;
      outline-offset: 2px;
      flex-grow: 1;
      font-size: 0.9rem;
      color: var(--green-dark);
      padding: 0.4rem 0;
    }

    .search-container input[type="search"]::placeholder {
      color: var(--border);
      font-style: italic;
    }

    .material-icons.search-icon {
      color: var(--border);
      user-select: none;
    }

    /* Right user-controls: register/login, icon buttons */
    .user-controls {
      display: flex;
      align-items: center;
      gap: 1rem;
      font-size: 0.9rem;
      font-weight: 600;
      white-space: nowrap;
    }

    .user-controls a {
      color: var(--green-dark);
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .user-controls a:hover,
    .user-controls a:focus {
      color: #374320;
    }

    .icon-button {
      cursor: pointer;
      color: var(--green-dark);
      font-size: 1.7rem;
      user-select: none;
      transition: color 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .icon-button:hover,
    .icon-button:focus {
      color: #374320;
      outline: none;
    }

    /* Bottom nav links for main site nav */
    nav.nav-links {
      display: flex;
      justify-content: center;
      gap: 2.5rem;
      font-size: 0.95rem;
      font-weight: 500;
      font-style: normal;
      padding: 0.75rem 1rem;
      font-family: 'Outfit', sans-serif;
      flex-wrap: wrap;
    }

    nav.nav-links a {
      color: var(--green-dark);
      text-decoration: none;
      letter-spacing: 0.1em;
      padding-bottom: 0.15rem;
      transition: color 0.3s ease, border-bottom-color 0.3s ease;
      border-bottom: 1px solid transparent;
    }
    nav.nav-links a:hover,
    nav.nav-links a:focus {
      color: #374320;
      border-bottom-color: #47562e;
      outline: none;
    }
    nav.nav-links a.italic {
      font-style: italic;
    }

    /* Main container for sign in and new account form */
    main {
      flex-grow: 1;
      max-width: 1200px;
      margin: 2rem auto 3rem;
      background: white;
      box-shadow: 0 6px 12px rgb(0 0 0 / 0.05);
      border-radius: 16px;
      display: flex;
      border: 1px solid #e5e4d5;
      min-height: 320px;
      overflow: hidden;
    }

    /* Sections inside main - Sign In and New Account */
    .sign-in,
    .new-account {
      flex: 1 1 50%;
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* Add a border line between */
    .sign-in {
      border-right: 1px solid #c7c6b3;
    }

    main h2 {
      font-weight: 700;
      font-size: 1.8rem;
      margin-bottom: 1.8rem;
    }

    /* Form fields */
    label {
      display: block;
      font-weight: 600;
      font-size: 0.95rem;
      margin-bottom: 0.45rem;
      letter-spacing: 0.06em;
      color: var(--green-dark);
    }

    input[type=email],
    input[type=password] {
      width: 100%;
      border: none;
      border-bottom: 1px solid var(--accent);
      padding: 0.5rem 0;
      font-size: 1rem;
      font-weight: 400;
      color: var(--green-dark);
      background: transparent;
      transition: border-color 0.3s ease;
      font-family: 'Outfit', sans-serif;
    }

    input[type=email]:focus,
    input[type=password]:focus {
      outline: none;
      border-bottom: 2px solid #6f7a32;
    }

    /* Buttons */
    button {
      margin-top: 2.5rem;
      background-color: var(--green-dark);
      color: var(--green-light);
      padding: 0.75rem 3rem;
      font-weight: 600;
      letter-spacing: 0.15em;
      font-size: 1.1rem;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      align-self: flex-start;
      font-family: 'Outfit', sans-serif;
      user-select: none;
    }
    button:hover,
    button:focus {
      background-color: #647034;
      box-shadow: 0 6px 14px rgb(86 88 20 / 0.45);
      outline: none;
    }
    
    /* Footer styles */
    footer {
      background-color: var(--green-dark);
      color: var(--green-light);
      padding: 1.25rem 1.75rem;
      font-size: 0.95rem;
      user-select: none;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
      gap: 1rem;
      border-top: 1.5px solid #55622f;
    }

    footer .author {
      font-weight: 600;
      font-style: normal;
      letter-spacing: 0.05em;
      max-width: 600px;
    }

    footer small {
      font-weight: 400;
      opacity: 0.75;
      flex-grow: 1;
      min-width: 240px;
    }

    footer img {
      width: 48px;
      height: 48px;
      opacity: 0.6;
      user-select: none;
    }

    /* Responsive layout */

    @media (max-width: 767px) {
      /* Mobile header top nav stacks */
      .nav-top {
        justify-content: center;
        gap: 0.5rem;
      }

      .nav-top .logo {
        font-size: 1.25rem;
        flex-grow: 0;
        text-align: center;
        order: 2;
        max-width: 100%;
      }

      .search-container {
        flex-grow: unset;
        max-width: none;
        width: 100%;
      }

      .user-controls {
        gap: 0.75rem;
        justify-content: center;
        order: 3;
        width: 100%;
        font-size: 0.85rem;
      }

      nav.nav-links {
        justify-content: center;
        gap: 1.25rem;
        font-size: 0.875rem;
        padding: 0.5rem;
      }

      nav.nav-links a {
        padding: 0 0;
        font-weight: 500;
      }

      main {
        flex-direction: column;
        margin: 1.25rem 1rem 3rem;
        min-height: auto;
      }

      .sign-in, .new-account {
        border: none;
        padding: 2rem 1.25rem;
      }
    }

    @media (min-width: 768px) {
      .nav-top {
        flex-wrap: nowrap;
      }
      .nav-top > *:not(.logo) {
        flex-grow: 0;
        flex-shrink: 0;
      }
      nav.nav-links {
        padding: 0.75rem 3rem;
      }
    }

    @media (min-width: 1440px) {
      main {
        max-width: 1400px;
      }
    }
  </style>
</head>
<body>
  
  <main>
    <section class="sign-in" aria-labelledby="signin-heading">
      <h2 id="signin-heading">Sign In</h2>
        <?php if(!empty($_GET['gagal'])){?>
        <?php if($_GET['gagal']=="userKosong"){?>
        <span class="text-danger">
       <p style="color: red;"> Maaf Username tidak boleh kosong</p>
        </span>
        <?php } else if($_GET['gagal']=="passKosong"){?>
       <p style="color: red;"> Maaf Password tidak boleh kosong</p>
        <?php } else {?>
        <p style="color: red;"> Maaf Username dan Password Anda Salah</p>
        <?php }?>
      <?php }?>
      <form method="POST" action="konfirmasilogin.php">
        <label for="email">Username</label>
        <input id="email" name="username" type="text" placeholder="your username" required autocomplete="username" />
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="••••••••" required autocomplete="current-password" />
        <button type="submit" name="login">Sign In</button>
      </form>
    </section>
    <section class="new-account" aria-labelledby="newaccount-heading">
      <h2 id="newaccount-heading">New Account</h2>
      <a href="/find-your-beauty/pages/register/create-account.php">
      <button type="button" aria-label="Create new account">Create Account</button>
      </a>
    </section>
  </main>

  <footer>
    <small>© 2025 Your Find Glow. All Rights Reserved</small>
    <div class="author" aria-label="Author credit">
      By NAT [NEVA AWALIA TIARA].
    </div>
    <img 
      src="https://placehold.co/48x48?text=Logo&font=montserrat&bg=47562e&fg=f3f2eb" 
      alt="Logo of Find Your Glow App with stylish floral design" 
      loading="lazy"
      width="48" height="48"
      onerror="this.style.display='none';"
    />
  </footer>
</body>
</html>    

<?php include_once('../../components/footer.php'); ?>