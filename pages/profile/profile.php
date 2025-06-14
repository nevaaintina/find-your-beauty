<?php 
  require('../../components/header.php');
 require_once __DIR__ . '/../../function/function.php';
  if (!isset($_SESSION['id_user']) || !isset($_SESSION['level'])) {
     echo "<script>
    alert('Silakan login terlebih dahulu!');
    window.location.href = '/find-your-beauty/pages/register/login.php';
    </script>";
    exit;
} else {
  $idUser = $_SESSION["id_user"];
  $user = query("SELECT * FROM user WHERE id_user = '$idUser'")[0];
}
?>
  <!-- Main content area -->
  <main class="flex-grow flex flex-col sm:flex-row max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 bg-[#f9f7f0]">
   <!-- Sidebar -->
   <aside class="bg-[#4a5523] w-full sm:w-48 text-[#f9f7f0] py-8 px-6 flex flex-col space-y-8">
    <button class="flex items-center space-x-3 text-sm font-normal" type="button">
     <i class="fas fa-user text-lg">
     </i>
     <span>
      My Profil
     </span>
    </button>
    <button class="flex items-center space-x-3 text-sm font-normal" type="button">
     <i class="fas fa-edit text-lg">
     </i>
     <span>
      Edit Profil
     </span>
    </button>
    <button class="flex items-center space-x-3 text-sm font-normal" type="button">
     <i class="fas fa-edit text-lg">
     </i>
     <span>
      Wishlist
     </span>
    </button>
   </aside>
   <!-- Profile main content -->
   <section class="flex-grow py-8 px-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-6 sm:space-y-0">
     <div class="flex items-center space-x-6">
  <img 
    alt="Portrait of user" 
    class="rounded-full w-16 h-16 object-cover" 
    height="64" 
    width="64"
src="<?= !empty($row['foto']) ? '../admin/foto/' . $row['foto'] : '../admin/foto/default-user.png' ?>"



  />
      <div>
       <p class="text-sm font-normal">
        <?=$user["nama"]?>
       </p>
       <span class="inline-block bg-[#f9f7f0] text-xs text-[#4a5523] px-3 py-1 rounded-full font-normal mt-1">
        @<?=$user["username"]?>
       </span>
      </div>
     </div>
     <button class="bg-[#4a5523] text-[#f9f7f0] rounded-full px-6 py-2 text-sm font-normal whitespace-nowrap" type="button">
      Edit Profil
     </button>
    </div>
    <div class="mt-8 flex flex-wrap justify-between max-w-3xl text-xs font-normal text-[#4a5523]">
     <div class="flex flex-col items-center px-4">
      <span>
       Followers
      </span>
      <span class="mt-1">
       0
      </span>
     </div>
     <div class="border-l border-[#4a5523] h-6">
     </div>
     <div class="flex flex-col items-center px-4">
      <span>
       Following
      </span>
      <span class="mt-1">
       7
      </span>
     </div>
     <div class="border-l border-[#4a5523] h-6">
     </div>
     <div class="flex flex-col items-center px-4">
      <span>
       Post
      </span>
      <span class="mt-1">
       0
      </span>
     </div>
     <div class="border-l border-[#4a5523] h-6">
     </div>
     <div class="flex flex-col items-center px-4">
      <span>
       Reviews
      </span>
      <span class="mt-1">
       0
      </span>
     </div>
     <div class="border-l border-[#4a5523] h-6">
     </div>
     <div class="flex flex-col items-center px-4">
      <span>
       Like
      </span>
      <span class="mt-1">
       0
      </span>
     </div>
    </div>
    <nav class="mt-8 max-w-3xl border-b border-[#4a5523] text-xs font-normal flex space-x-8">
     <a class="pb-1 border-b border-[#4a5523]" href="#">
      Posts
     </a>
     <a class="pb-1" href="#">
      Reviews
     </a>
     <a class="pb-1" href="#">
      Topics
     </a>
     <a class="pb-1" href="#">
      Talks
     </a>
    </nav>
   </section>
  </main>
  <!-- Empty white space below main content -->
  <div class="bg-[#f9f7f0] h-16">
  </div>
<?php 
  // require('../../components/footer.php');

?>