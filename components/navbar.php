<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<nav class="sticky top-[96px] z-40 bg-[#f5f0e9] max-w-7xl mx-auto flex justify-center space-x-8 text-xs text-[#3a3a3a] font-semibold py-3 border-b border-[#d6cfc3]">
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'product.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/products/product.php">Product</a>
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'reviews.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/reviews/reviews.php">Reviews</a>
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'recommendation.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/recommendation/recommendation.php">Recommendation</a>
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'discussion.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/forum/discussion.php">Forum</a>
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'article.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/articles/article.php">Article</a>
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'wishlist.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/wishlist/wishlist.php">Wishlist</a>
  <a class="hover:text-[#6e6a5a] <?= $current_page == 'profile.php' ? 'text-[#6e6a5a] underline underline-offset-4' : '' ?>" href="/find-your-beauty/pages/profile/profile.php">Profil</a>
</nav>
