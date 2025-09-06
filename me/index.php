<?php
// Detik hitung mundur (boleh override via ?s=)
$seconds = isset($_GET['s']) ? (int)$_GET['s'] : 5;
if ($seconds < 1)  $seconds = 1;
if ($seconds > 30) $seconds = 30;

// Jangan di-cache (biar countdown fresh)
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Mengarahkan ke beranda…</title>
<!-- Fallback tanpa JS -->
<meta http-equiv="refresh" content="<?= $seconds ?>;url=/" />
<style>
  :root{
    --brand:#173a6e;
    --ink:#0c1524;
  }
  *{box-sizing:border-box}
  body{
    margin:0; min-height:100svh; display:grid; place-items:center;
    font:16px/1.5 ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
    color:var(--ink); background:#f6f8ff;
  }
  .card{
    width:min(92vw,520px);
    background:#fff; border-radius:24px; padding:28px 22px; text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
  }
  h1{margin:0 0 6px; font-size:22px}
  p{margin:6px 0 16px; color:#475569}
  .ring{
    --p:0; /* 0..100 */
    width:140px; height:140px; margin:8px auto 10px; border-radius:50%;
    background:
      conic-gradient(var(--brand) calc(var(--p)*1%), #e9eefc 0);
    display:grid; place-items:center;
    box-shadow:inset 0 0 0 10px #e9eefc;
  }
  .num{font-size:38px; font-weight:800; color:var(--brand)}
  .btn{
    display:inline-block; margin-top:8px; padding:10px 16px; border-radius:12px;
    background:var(--brand); color:#fff; text-decoration:none; font-weight:700;
  }
  .tip{font-size:13px; color:#64748b; margin-top:4px}
</style>
</head>
<body>
  <main class="card" role="main" aria-live="polite">
    <h1>Menuju beranda siraj.my.id</h1>
    <div class="ring" id="ring"><div class="num" id="num"><?= $seconds ?></div></div>
    <p>Otomatis masuk dalam <b><span id="left"><?= $seconds ?></span> detik</b>.</p>
    <a class="btn" href="/" id="skip">Masuk sekarang</a>
    <div class="tip">Bisa atur durasi: <code>/me?s=7</code></div>
  </main>

<script>
const total = <?= $seconds ?>;
let left = total;
const $num = document.getElementById('num');
const $left = document.getElementById('left');
const $ring = document.getElementById('ring');

function draw(pct){
  $ring.style.setProperty('--p', pct);
}

function tick(){
  left--;
  if(left <= 0){
    // ganti halaman tanpa menambah history (agar tombol Back tidak kembali ke /me)
    location.replace('/');
    return;
  }
  $num.textContent = left;
  $left.textContent = left;
  const pct = Math.round(((total-left)/total)*100);
  draw(pct);
}
draw(0);
setInterval(tick, 1000);
</script>

<noscript>
  <p style="text-align:center;margin-top:8px;">Jika tidak otomatis, klik <a href="/">di sini</a>.</p>
</noscript>
</body>
</html>
