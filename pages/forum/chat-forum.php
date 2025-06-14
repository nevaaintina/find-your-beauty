<?php 
  require('../../components/header.php');
  require_once __DIR__ . '/../../function/function.php';

  if (isset($_GET["id"])) {
    $forumId = $_GET["id"];
    $userId = $_SESSION["id_user"];

    $query = "SELECT u.id_user, u.username, u.foto, f.judul_forum, k.tanggal_komentar, k.isi_komentar FROM 
    komentar_forum AS k
    JOIN user AS u ON u.id_user = k.id_user
    JOIN forum AS f ON f.id_forum = k.id_forum
    WHERE f.id_forum = '$forumId' ORDER BY k.id_komentar
    ";

    $result = query($query);
    
    $message = [];

    foreach ($result as $res) {
      $message[] = $res;
    }

    if (isset($_POST["send"])) {
      $chat = $_POST["chat"];
      $date = date("Y-m-d"); 
      $query = "INSERT INTO komentar_forum (id_forum, id_user, tanggal_komentar, isi_komentar) VALUES 
      ('$forumId','$userId','$date','$chat')";
      
      mysqli_query($koneksi, $query);
      header("Location: chat-forum.php?id=$forumId");
      exit;
    }
  }


?>
  <!-- Forum Chat -->
  <main class="flex-grow container mx-auto p-4">
    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col max-h-[720px] h-[calc(100vh-160px)]">
      <!-- Judul forum & tombol back -->
      <div class="flex items-center justify-between border-b pb-3 mb-4">
        <a href="/find-your-beauty/pages/forum/discussion.php" class="text-sm text-[#3b4a24] border border-[#3b4a24] rounded px-3 py-1 hover:bg-[#3b4a24] hover:text-white transition">← Back</a>
        <h2 class="text-lg font-semibold text-[#3b4a24] font-serif"><?= $result[0]["judul_forum"] ?></h2>
      </div>

      <!-- Chat messages -->
       <?php foreach ($message as $row)  : ?>
      <?php if($row["id_user"] == $userId) : ?>
        <div class="flex items-start gap-3 justify-end">
          <div class="text-right">
            <div class="text-sm font-semibold text-[#3b4a24]">You <span class="text-xs text-gray-400 ml-2"><?= $row["tanggal_komentar"] ?></span></div>
            <div class="bg-[#556b2f] text-[#f5f1e9] rounded-xl px-4 py-2 max-w-xs ml-auto"><?= $row["isi_komentar"] ?></div>
          </div>
          <img src="<?= !empty($row['foto']) ? '../admin/foto/' . $row['foto'] : '../admin/foto/default-user.png' ?>" alt="You" class="w-10 h-10 rounded-full border border-[#3b4a24]">
        </div>
        <?php else : ?>
      <div class="flex-1 overflow-y-auto space-y-4 pr-2">
        <!-- Message from other user -->
        <div class="flex items-start gap-3">
          <img src="<?= !empty($row['foto']) ? '../admin/foto/' . $row['foto'] : '../admin/foto/default-user.png' ?>" alt="Jane" class="w-10 h-10 rounded-full border border-[#3b4a24]">
          <div>
            <div class="text-sm font-semibold text-[#3b4a24]"><?= $row["username"] ?><span class="text-xs text-gray-400 ml-2"><?= $row["tanggal_komentar"] ?></span></div>
            <div class="bg-[#e6e6d4] text-[#3b4a24] rounded-xl px-4 py-2 max-w-xs"><?= $row["isi_komentar"] ?></div>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach ?>
        <!-- Message from current user -->



      <!-- Message input -->
        <form class="mt-4 flex gap-2" action="chat-forum.php?id=<?= htmlspecialchars($forumId) ?>" method="POST">
        <input type="text" name="chat" placeholder="Type your message..." class="flex-grow border border-[#e6e6d4] rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#556b2f]" />
        <button type="submit" name="send" class="bg-[#556b2f] text-[#f5f1e9] rounded-xl px-5 py-2 hover:bg-[#3b4a24]">Send</button>
      </form>
    </div>
  </main>

<?php 
  require('../../components/footer.php');
?>