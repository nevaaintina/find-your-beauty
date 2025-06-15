  <?php require('../../components/header.php'); ?> 

  <!-- Main content -->
  <main class="flex-grow max-w-4xl mx-auto px-4 py-6">
   <section class="bg-[#e9e6e1] text-center px-6 py-8 mb-8">
    <h2 class="text-xs tracking-widest font-semibold mb-3">
     SKINCARE
    </h2>
    <p class="text-xs font-semibold max-w-xl mx-auto leading-tight">
     Find the best skincare products starting from product names, brands,
        prices &amp; complete packaging for beauty enthusiasts. Create your own
        review on Find Your Glow.
    </p>
   </section>
  <section class="mb-10">
  <h3 class="text-center font-semibold mb-1">
    Browse Reviews
  </h3>
  <p class="text-center text-xs mb-6">
    Choose category to find product review and share your thoughts.
  </p>
  <div class="max-w-3xl mx-auto border border-[#c6c6b1] rounded px-6 py-4 grid grid-cols-2 sm:grid-cols-4 gap-y-4 text-[10px] text-[#9a9a8a] font-light">

    <!-- Cleanser -->
    <div>
      <a href="detail.php?category=Cleanser" class="block font-semibold tracking-widest mb-1 text-[#3a3a2e] hover:text-white hover:bg-[#9a9a8a] transition rounded px-2 py-1 cursor-pointer">
        Cleanser
      </a>
      <ul class="space-y-1">
        <li>Micellar Water</li>
        <li>Facial Wash</li>
        <li>Cleansing Oil</li>
      </ul>
    </div>

    <!-- Treatment -->
    <div>
      <a href="detail.php?category=Treatment" class="block font-semibold tracking-widest mb-1 text-[#3a3a2e] hover:text-white hover:bg-[#9a9a8a] transition rounded px-2 py-1 cursor-pointer">
        Treatment
      </a>
      <ul class="space-y-1">
        <li>Serum</li>
        <li>Peeling</li>
        <li>Eye Treatment</li>
      </ul>
    </div>

    <!-- Mask -->
    <div>
      <a href="detail.php?category=Mask" class="block font-semibold tracking-widest mb-1 text-[#3a3a2e] hover:text-white hover:bg-[#9a9a8a] transition rounded px-2 py-1 cursor-pointer">
        Mask
      </a>
      <ul class="space-y-1">
        <li>Sleeping Mask</li>
        <li>Mask Sheet</li>
      </ul>
    </div>

    <!-- Moisturizer -->
    <div>
      <a href="detail.php?category=Moisturizer" class="block font-semibold tracking-widest mb-1 text-[#3a3a2e] hover:text-white hover:bg-[#9a9a8a] transition rounded px-2 py-1 cursor-pointer">
        Moisturizer
      </a>
      <ul class="space-y-1">
        <li>Sun Protection</li>
        <li>Gel</li>
        <li>Cream</li>
      </ul>
    </div>

  </div>
</section>

   <section class="mb-10 max-w-3xl mx-auto text-center text-xs text-[#3a3a2e] font-light">
    <h3 class="font-semibold mb-1">
     Browse Articles
    </h3>
    <p class="mb-6">
     Read articles to answer your questions about SkinCare
    </p>
    <p class="mb-6">
     Sorry, there is no related articles at the moment. Please check back later.
    </p>
    <div class="text-[#4a4f2a] font-semibold text-xs cursor-pointer inline-flex items-center justify-center">
     See More
     <i class="fas fa-chevron-right ml-1 text-[10px]">
     </i>
    </div>
   </section>
  </main>

    <?php include_once('../../components/footer.php'); ?> 

 