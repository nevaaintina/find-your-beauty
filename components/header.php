<?php 
require(__DIR__ . "/../function/function.php");
session_start();

$user = null;
if (isset($_SESSION["id_user"])) {
  $idUser = (int)$_SESSION["id_user"];
  $user = query("SELECT * FROM user WHERE id_user = '$idUser'")[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Find Your Beauty</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .font-playfair {
      font-family: 'Playfair Display', serif;
    }
  </style>
</head>
<body class="bg-[#f5f0e9] text-[#3a3a3a]">

<!-- Sticky Topbar + Header -->
<div class="sticky top-0 z-50 bg-[#f5f0e9]">

  <!-- Top Bar -->
  <div class="bg-[#4f5730] text-white text-sm flex items-center px-4 py-1">
    <div class="flex items-center space-x-2 w-full max-w-7xl mx-auto">
      <div class="flex items-center space-x-1">
        <i class="fas fa-search text-white"></i>
        <input class="bg-[#4f5730] placeholder-white text-white text-xs focus:outline-none" placeholder="Search" type="text"/>
      </div>
      <div class="flex-1"></div>
      <div class="flex items-center space-x-4 text-xs font-semibold">
        <?php if (isset($_SESSION['level']) && $_SESSION["level"] == "superadmin"): ?>
          <span class="flex items-center gap-2">
            <i class="fas fa-user-circle text-lg"></i>
            <a href="/find-your-beauty/pages/admin/profil.php">
              Admin <?= htmlspecialchars($user["username"]) ?>
            </a>
            <a href="#" onclick="konfirmasiLogout(event)" class="text-sm text-red-400 hover:underline ml-2">
              Logout
            </a>
          </span>
        <?php elseif (isset($_SESSION['id_user'])): ?>
          <span class="flex items-center gap-2">
            <i class="fas fa-user-circle text-lg"></i>
            <?= htmlspecialchars($user["username"]) ?>
            <a href="#" onclick="konfirmasiLogout(event)" class="text-sm text-red-400 hover:underline ml-2">
              Logout
            </a>
          </span>
        <?php else: ?>
          <a href="/find-your-beauty/pages/register/login.php" class="text-sm hover:underline">
            Register / Login
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="bg-[#f5f0e9] py-4 border-b border-[#d6cfc3]">
    <div class="max-w-7xl mx-auto flex justify-center">
      <a href="/find-your-beauty" class="group inline-block transition duration-300 ease-in-out">
        <h1 class="font-playfair text-2xl text-[#3a3a3a] font-semibold tracking-wide transform transition duration-300 group-hover:scale-105 group-hover:text-[#7a7a5c]">
          Find Your Beauty
        </h1>
      </a>
    </div>
  </header>
</div>

<!-- Script Logout Confirmation -->
<script>
function konfirmasiLogout(event) {
  event.preventDefault();
  if (confirm("Apakah Anda yakin ingin logout?")) {
    window.location.href = "/find-your-beauty/pages/register/logout.php";
  }
}
</script>
