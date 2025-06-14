<?php include_once('../../components/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Find Your Glow App - Create Account</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<style>
  /* Reset & box-sizing */
  *, *::before, *::after {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: #fff;
    color: #4a5533; /* olive green */
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  /* Color variables for easy tweaks */
  :root {
    --olive-green: #4a5533;
    --light-olive: #ebe9df;
    --dark-olive: #3d461f;
  }

  /* HEADER */
  header {
    background-color: var(--dark-olive);
    color: white;
    padding: 0.6rem 1rem;
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    font-size: 1.1rem;
  }

  /* NAVBAR */
  nav {
    background-color: var(--light-olive);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.35rem 1rem;
    font-weight: 500;
    font-size: 0.85rem;
    color: var(--olive-green);
    border-bottom: 1px solid #bbbba8;
    flex-wrap: wrap;
  }

  /* Left side: Search */
  .nav-left {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    min-width: 180px;
  }
  .search-input {
    font-family: inherit;
    font-size: 0.9rem;
    border: none;
    border-bottom: 1px solid var(--olive-green);
    background: transparent;
    outline: none;
    padding: 0.25rem 0.3rem;
    width: 100%;
  }
  .search-wrapper {
    position: relative;
    display: flex;
    align-items: center;
  }
  .search-icon {
    position: absolute;
    right: 3px;
    cursor: pointer;
    color: var(--olive-green);
    font-size: 1.3rem;
  }

  /* Center: Logo */
  .nav-center {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 1.4rem;
    user-select: none;
    flex-grow: 1;
    text-align: center;
    color: var(--olive-green);
  }

  /* Right side: Links & Icons */
  .nav-right {
    display: flex;
    align-items: center;
    gap: 1.1rem;
    font-size: 0.85rem;
  }
  .nav-right a {
    color: var(--olive-green);
    text-decoration: none;
    font-weight: 600;
    white-space: nowrap;
  }
  .icon-button {
    cursor: pointer;
    color: var(--olive-green);
    font-size: 1.3rem;
    vertical-align: middle;
    user-select:none;
  }

  /* Navigation links below */
  .nav-links {
    display: flex;
    gap: 1.8rem;
    padding-left: 1rem;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    letter-spacing: 0.08em;
  }
  .nav-links a {
    color: var(--olive-green);
    text-decoration: none;
    font-size: 0.9rem;
    text-transform: none;
    font-style: normal;
    font-weight: 500;
  }
  /* Italic and spaced out for last 3 links */
  .nav-links a.article,
  .nav-links a.wishlist,
  .nav-links a.profil {
    font-style: italic;
    letter-spacing: 0.15em;
  }

  /* CONTENT: Register Form */
  main {
    flex-grow: 1;
    padding: 3rem 1rem 5rem;
    max-width: 700px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  main h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.9rem;
    color: var(--olive-green);
    margin-bottom: 2.5rem;
    font-weight: 600;
  }
  form {
    width: 100%;
  }
  label {
    font-weight: 600;
    font-size: 0.9rem;
    display: block;
    margin-bottom: 0.5rem;
  }
  input[type="text"],
  input[type="password"],
  input[type="email"] {
    width: 100%;
    border: none;
    border-bottom: 1.5px solid var(--olive-green);
    padding: 0.35rem 0;
    font-size: 1rem;
    color: var(--olive-green);
    font-family: inherit;
    outline-offset: 0.15em;
    margin-bottom: 2.3rem;
    background: transparent;
  }
  input::placeholder {
    color: var(--olive-green);
    opacity: 0.7;
    font-weight: 400;
  }
  input:focus {
    border-bottom-color: var(--dark-olive);
  }

  button[type="submit"] {
    display: block;
    width: 100%;
    padding: 0.85rem 0;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    letter-spacing: 0.12em;
    background-color: var(--olive-green);
    color: white;
    border: none;
    border-radius: 0;
    cursor: pointer;
    user-select:none;
    transition: background-color 0.3s ease;
  }
  button:hover,
  button:focus {
    background-color: var(--dark-olive);
  }

  /* FOOTER */
  footer {
    background-color: var(--dark-olive);
    color: white;
    text-align: center;
    font-size: 0.85rem;
    padding: 1.2rem 1rem 2rem;
    font-family: 'Roboto', sans-serif;
    position: relative;
    user-select:none;
  }
  footer .footer-content {
    max-width: 700px;
    margin: 0 auto;
    border-top: 1px solid #5c6a32;
    padding-top: 1.3rem;
  }
  footer .footer-credit {
    margin-top: 0.35rem;
    font-style: normal;
    font-weight: 500;
  }
  footer .footer-credit strong {
    font-weight: 700;
  }
  footer .footer-copyright {
    margin-top: 0.3rem;
    opacity: 0.7;
  }

  /* footer illustration (simple line art) */
  .footer-logo {
    position: absolute;
    right: 1rem;
    top: 0.75rem;
    width: 52px;
    height: 52px;
    stroke: #98a87a;
    fill: none;
    user-select:none;
  }

  /* RESPONSIVE */

  /* Mobile: 320px - 767px */
  @media (max-width: 767px) {
    nav {
      font-size: 0.8rem;
      padding: 0.3rem 1rem;
    }
    .nav-left {
      min-width: 140px;
    }
    .nav-center {
      font-size: 1.2rem;
      flex-grow: 1;
    }
    .nav-links {
      font-size: 0.75rem;
      gap: 1rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 0.4rem;
      padding-left: 0;
    }
    main {
      padding: 2rem 1rem 4rem;
      max-width: 100%;
    }
    button[type="submit"] {
      font-size: 0.95rem;
      padding: 0.7rem 0;
      letter-spacing: 0.16em;
    }
    footer {
      font-size: 0.8rem;
      padding: 1rem 0.7rem 1.5rem;
    }
  }

  /* Desktop: 768px - 1439px */
  @media (min-width: 768px) and (max-width: 1439px) {
    nav {
      font-size: 0.9rem;
    }
    .nav-left {
      min-width: 180px;
    }
    .nav-center {
      font-size: 1.4rem;
    }
    .nav-links {
      gap: 1.8rem;
      font-size: 0.9rem;
    }
    main {
      padding: 3rem 1rem 5rem;
      max-width: 700px;
    }
    footer {
      font-size: 0.85rem;
      padding: 1.2rem 1rem 2rem;
    }
  }

  /* Large Desktop: 1440px+ */
  @media (min-width: 1440px) {
    main {
      max-width: 900px;
    }
  }
</style>
</head>
<body>

<?php 
require '../../function/function.php';

if (isset($_POST["submit"])) {
  if (register($_POST) > 0) {
    echo "<script>
    document.location.href = 'login.php'
    </script>";
  }
}


?>



<main>
  <h1>Create Account</h1>
  <form action="" method="POST" aria-label="Create Account Form" autocomplete="off">
    <label for="name">Name</label>
    <input 
      id="name" 
      name="name" 
      type="text" 
      placeholder="name" 
      required 
      autocomplete="off" 
      autocorrect="off" 
      autocapitalize="none"
    />
    <label for="username">Username</label>
    <input 
      id="username" 
      name="username" 
      type="text" 
      placeholder="Username" 
      required 
      autocomplete="off" 
      autocorrect="off" 
      autocapitalize="none"
    />
    <label for="email">Email</label>
    <input 
      id="email" 
      name="email" 
      type="email" 
      placeholder="Email" 
      required 
      autocomplete="email" 
      autocorrect="off" 
      autocapitalize="none"
    />
    <label for="password">Password</label>
    <input 
      id="password" 
      name="password" 
      type="password" 
      placeholder="Password" 
      required 
      autocomplete="new-password"
      autocorrect="off" 
      autocapitalize="none"
    />
    <label for="confirm_password">Confirm Password</label>
    <input 
      id="password" 
      name="confirm_password" 
      type="password" 
      placeholder="Confirm Password" 
      required 
      autocomplete="new-password"
      autocorrect="off" 
      autocapitalize="none"
    />
    <button type="submit" name="submit" aria-label="Register">REGISTER</button>
  </form>
</main>

<footer>
  <div class="footer-content" role="contentinfo">
    <div class="footer-credit">By <strong>NAT [ NEVA AWALIA TIARA ]</strong>.</div>
    <div class="footer-copyright">© 2025 Your Find Glow. All Rights Reserved</div>
  </div>

  <!-- Simple line art illustration for footer on right -->
  <svg 
    class="footer-logo" 
    xmlns="http://www.w3.org/2000/svg" 
    aria-hidden="true" 
    focusable="false" 
    viewBox="0 0 64 64"
  >
    <path d="M32 58s6-14 6-25c0-12-6-18-6-18s-6 6-6 18c0 11 6 25 6 25z" stroke="#98a87a" stroke-width="1.7" stroke-linejoin="round" fill="none" />
    <path d="M32 8c-2 0-4 2-4 8s4 8 4 8 4-2 4-8-2-8-4-8z" stroke="#98a87a" stroke-width="1.7" stroke-linejoin="round" fill="none"/>
  </svg>
</footer>
</body>
</html>

<?php include_once('../../components/footer.php'); ?>