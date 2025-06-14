<?php 
  require('../../components/header.php');
?>
  <!-- Forum Chat -->
  <main class="flex-grow container mx-auto p-4">
    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col max-h-[720px] h-[calc(100vh-160px)]">
      <!-- Judul forum & tombol back -->
      <div class="flex items-center justify-between border-b pb-3 mb-4">
        <button class="text-sm text-[#3b4a24] border border-[#3b4a24] rounded px-3 py-1 hover:bg-[#3b4a24] hover:text-white transition">← Back</button>
        <h2 class="text-lg font-semibold text-[#3b4a24] font-serif">Forum: Skincare Tips for Oily Skin</h2>
      </div>

      <!-- Chat messages -->
      <div class="flex-1 overflow-y-auto space-y-4 pr-2">
        <!-- Message from other user -->
        <div class="flex items-start gap-3">
          <img src="https://via.placeholder.com/40" alt="Jane" class="w-10 h-10 rounded-full border border-[#3b4a24]">
          <div>
            <div class="text-sm font-semibold text-[#3b4a24]">Jane Doe <span class="text-xs text-gray-400 ml-2">10:12 AM</span></div>
            <div class="bg-[#e6e6d4] text-[#3b4a24] rounded-xl px-4 py-2 max-w-xs">Hi there! How are you today?</div>
          </div>
        </div>

        <!-- Message from current user -->
        <div class="flex items-start gap-3 justify-end">
          <div class="text-right">
            <div class="text-sm font-semibold text-[#3b4a24]">You <span class="text-xs text-gray-400 ml-2">10:13 AM</span></div>
            <div class="bg-[#556b2f] text-[#f5f1e9] rounded-xl px-4 py-2 max-w-xs ml-auto">Hi Jane! I'm great, thanks for asking. How about you?</div>
          </div>
          <img src="https://via.placeholder.com/40" alt="You" class="w-10 h-10 rounded-full border border-[#3b4a24]">
        </div>

        <!-- Message from other user -->
        <div class="flex items-start gap-3">
          <img src="https://via.placeholder.com/40" alt="Jane" class="w-10 h-10 rounded-full border border-[#3b4a24]">
          <div>
            <div class="text-sm font-semibold text-[#3b4a24]">Jane Doe <span class="text-xs text-gray-400 ml-2">10:15 AM</span></div>
            <div class="bg-[#e6e6d4] text-[#3b4a24] rounded-xl px-4 py-2 max-w-xs">Doing well, just wanted to share some skincare tips.</div>
          </div>
        </div>
      </div>

      <!-- Message input -->
      <form class="mt-4 flex gap-2">
        <input type="text" placeholder="Type your message..." class="flex-grow border border-[#e6e6d4] rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#556b2f]" />
        <button type="submit" class="bg-[#556b2f] text-[#f5f1e9] rounded-xl px-5 py-2 hover:bg-[#3b4a24]">Send</button>
      </form>
    </div>
  </main>

<?php 
  require('../../components/footer.php');
?>