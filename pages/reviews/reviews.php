  <?php 
  include_once('../../components/header.php'); 
  include_once('../../function/function.php');
  
$query = "SELECT review.*, user.username, user.foto, produk.nama_produk, produk.foto_produk FROM review
          JOIN user ON user.id_user = review.id_user
          JOIN produk ON produk.id_produk = review.id_produk

 ";
$result = query($query);

  ?>

   <!-- Thin horizontal lines below nav -->
   <div class="max-w-7xl mx-auto px-4 mt-1">
    <div class="border-t border-gray-300">
    </div>
    <div class="border-t border-gray-200 mt-0.5">
    </div>
   </div>
  </header>
  <!-- Banner image area -->
  <section class="bg-[#f3f0d7] max-w-7xl mx-auto px-4 py-6">
   <img alt="Illustration of a group of diverse people standing with their backs, arms around each other, surrounded by colorful star shapes" class="w-full max-w-[600px] mx-auto" height="150" src="https://storage.googleapis.com/a1aa/image/b2e014ab-1884-4ac6-895b-808add0cba0e.jpg" width="600"/>
  </section>
  <!-- Main content -->
  <main class="max-w-7xl mx-auto px-4 py-6 flex flex-col lg:flex-row gap-6">
   <!-- Left content: Trending Reviews -->
   <section class="flex-1">
    <h2 class="text-[15px] font-semibold italic font-serif mb-3 border-b border-gray-300 pb-1" style="font-family: 'Playfair Display', serif;">
     Trending Reviews
    </h2>
    <button class="bg-[#4f5730] text-white text-[11px] rounded-full px-5 py-1 mb-6 font-sans">
     Newest
    </button>
    <!-- Review cards -->
    <?php foreach ($result as $row) : ?>
    <article class="border border-gray-200 rounded-md p-4 mb-6 flex gap-4 max-w-[600px]">
     <img alt="Bottle of Cetaphil Gentle Skin Cleanser with blue cap on white background" class="w-[100px] h-[100px] object-contain rounded" height="100" src="../admin/foto_produk/<?= $row['foto_produk'] ?>" width="100"/>
     <div class="flex-1 text-[11px] font-sans text-gray-900">
      <div class="flex items-center gap-2 mb-1">
       <img alt="Profile picture of user @ameliaaandanii, female with light hair" class="w-7 h-7 rounded-full object-cover" 
      src="<?= !empty($row['foto']) ? '../admin/foto/' . $row['foto'] : '../admin/foto/default-user.png' ?>"
       height="30" width="30"/>
       <span class="font-semibold text-[12px]">
        <?= $row['username'] ?>
       </span>
      </div>
      <p class="text-[10px] text-gray-600 mb-1">
       normal, sensitive
      </p>
    <p class="text-[12px] mb-1 text-red-600">
    <?= str_repeat('❤️', $row['rating']) ?>
    </p>

      <p class="flex items-center gap-1 text-[11px] text-gray-700 mb-1">
       <i class="fas fa-check-circle text-[#4f5730]">
       </i>
       <em>
        Recommendation
       </em>
      </p>
      <p class="text-[11px]">
        <?= $row['komentar'] ?>
      </p>
     </div>
    </article>
      <?php endforeach; ?>
   </section>
   <!-- Right content: Top Members -->
   <aside class="w-full max-w-xs bg-white border border-gray-200 rounded-md p-4 text-[11px] font-sans text-gray-900">
    <h3 class="text-[13px] font-semibold italic font-serif mb-4" style="font-family: 'Playfair Display', serif;">
     Top Members
    </h3>
    <ul class="space-y-4">
     <li class="flex items-center justify-between gap-3">
      <div class="flex items-center gap-2">
       <img alt="Profile picture of top member @happydanisyaa, female with dark hair" class="w-7 h-7 rounded-full object-cover" height="30" src="https://storage.googleapis.com/a1aa/image/29b6a969-8591-4add-74d3-e4ed2f32ee67.jpg" width="30"/>
       <span>
        @happydanisyaa
       </span>
      </div>
      <button class="bg-[#4f5730] text-white text-[10px] rounded-full px-3 py-0.5">
       Follow
      </button>
     </li>
     <li class="flex items-center justify-between gap-3">
      <div class="flex items-center gap-2">
       <img alt="Profile picture of top member @prillylatuconsina_, female with dark hair" class="w-7 h-7 rounded-full object-cover" height="30" src="https://storage.googleapis.com/a1aa/image/b1c701ce-a95b-4282-2f02-b760e0cd2d2d.jpg" width="30"/>
       <span>
        @prillylatuconsina_
       </span>
      </div>
      <button class="bg-[#4f5730] text-white text-[10px] rounded-full px-3 py-0.5">
       Follow
      </button>
     </li>
     <li class="flex items-center justify-between gap-3">
      <div class="flex items-center gap-2">
       <img alt="Profile picture of top member @rasyahsyafaa, female with dark hair" class="w-7 h-7 rounded-full object-cover" height="30" src="https://storage.googleapis.com/a1aa/image/b3ef768a-739d-47e6-4bd5-28b712591c87.jpg" width="30"/>
       <span>
        @rasyahsyafaa
       </span>
      </div>
      <button class="bg-[#4f5730] text-white text-[10px] rounded-full px-3 py-0.5">
       Follow
      </button>
     </li>
    </ul>
   </aside>
  </main>


    <?php include_once('../../components/footer.php'); ?>
