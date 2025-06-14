  <?php 
  include_once('../../components/header.php'); 
  if (!isset($_SESSION['id_user']) || !isset($_SESSION['level'])) {
    header("Location: ../register/login.php");
    exit;
}

  require_once __DIR__ . '/../../function/function.php';

  $forum = query("SELECT * FROM forum");
  
  ?>

  </header>
  <main class="flex-grow px-4 py-6 bg-white w-full">
   <h2 class="italic-playfair text-[#4a5523] text-lg mb-6 border-b border-[#4a5523] w-fit pb-1">
    Discussion Forum
   </h2>
   <section aria-label="Discussion forum categories" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-full">
    <?php foreach($forum as $row) : ?>
    <article class="bg-[#f3f1e7] rounded-xl p-4 flex flex-col items-center space-y-3 shadow-sm">
     <img alt="Woman looking in mirror with skincare products on table, representing Skincare Newbies" class="w-24 h-24 rounded-3xl object-cover" height="100" src="../admin/image/forum.png" width="100"/>
     <p class="text-[#4a5523] font-semibold text-sm text-center italic">
      <?= $row["judul_forum"] ?>
     </p>
     <a  href="chat-forum.php?id=<?=$row["id_forum"] ?>"class="bg-[#4a5523] text-[#f3f1e7] text-xs font-semibold px-5 py-1 rounded-sm" type="button">
      + Join
     </a>
    </article>
    <?php endforeach; ?>
    
   </section>
  </main>

    <?php include_once('../../components/footer.php'); ?>