<?php
// ---------- Data konten (silakan ganti) ----------
$profile = [
  'name' => 'MUH SIRAJ',
  'bio'  => 'Haii..',
  'avatar' => 'https://i.ibb.co.com/DD56BKyH/275206129-776484716646202-942416676443734588-n.jpg' // contoh: 'avatar.jpg'
];

$socials = [
  // label, url, ikon (linkedin|facebook|instagram|google|tiktok)
  ['LinkedIn',  'https://linkedin.com//in/sirajbahri',   'linkedin'],
  ['Facebook',  'https://facebook.com/muhsiraj.official',   'facebook'],
  ['Instagram', 'https://instagram.com/muh_siraj',  'instagram'],
  ['Google',    'https://google.com/',     'google'],
  ['TikTok',    'https://tiktok.com/muh_siraj',     'tiktok'],
];

$folders = [
  ['My Foto',          '01 September 2025', '#'],
  ['Kegiatan',  '12 Agustus 2025',   '#'],
  ['Doc',  '05 Juli 2025',      '#'],
];

$contact = [
  'email'    => 'me@siraj.my.id',
  'playlist' => '',
];
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>BioLink - <?php echo htmlspecialchars($profile['name']); ?></title>
<style>
  :root{
    --brand-blue:#173a6e;
    --ink:#0c1524;
    --muted:#5f6b82;
    --container:520px;
  }
  *{box-sizing:border-box}
  body{
    margin:0;
    font:16px/1.5 ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial;
    color:var(--ink);
    background:#fff;
    display:flex; justify-content:center;
  }
  .wrap{width:min(100%, var(--container)); padding:20px 16px 64px}

  /* ---------- HERO (kartu biru) ---------- */
  .hero{
    background:var(--brand-blue);
    color:#fff;
    border-radius:28px;
    padding:28px 20px 26px;
    text-align:center;
  }
  .avatar{
    width:116px; height:116px; border-radius:50%;
    background:#f6f7fb;
    margin:4px auto 10px; overflow:hidden; display:grid; place-items:center;
  }
  .avatar img{width:100%; height:100%; object-fit:cover; display:block}
  .hero h1{margin:6px 0 8px; font-weight:800; letter-spacing:.3px}
  .hero p{margin:0 auto; max-width:460px; opacity:.95}

  /* ---------- Sosial (tanpa animasi, hanya lingkaran) ---------- */
  .socials{
    margin:16px auto 6px;
    display:flex; gap:14px; justify-content:center; flex-wrap:wrap;
  }
  .sbtn{
    width:54px; height:54px; border-radius:50%;
    display:grid; place-items:center;
    background:#0b0b0e; color:#fff;
    border:0; text-decoration:none;
    transition:transform .15s ease, opacity .15s ease;
  }
  .sbtn:hover{transform:translateY(-1px); opacity:.95}
  .sbtn:active{transform:scale(.98)}
  .sbtn svg{width:24px; height:24px; fill:currentColor}

  /* ---------- Folders (scroll horizontal) ---------- */
  .sec-title{font-weight:800; font-size:28px; margin:22px 8px 12px}
  .folders{
    display:flex; gap:16px; overflow-x:auto; padding:6px 6px 14px;
    scroll-snap-type:x proximity; -webkit-overflow-scrolling:touch;
  }
  .folders::-webkit-scrollbar{height:10px}
  .folders::-webkit-scrollbar-thumb{background:#cbd9ff; border-radius:999px}
  .folder{
    flex:0 0 72%;
    min-width:300px; max-width:360px;
    background:#e8f1ff; border:2px solid #d6e4ff;
    border-radius:22px; padding:16px; scroll-snap-align:center;
    display:flex; align-items:center; gap:14px;
    color:inherit; text-decoration:none;
  }
  .folder .icon{
    width:70px; height:66px; border-radius:16px; display:grid; place-items:center;
    background:#fff; border:2px solid #cfe0ff;
  }
  .folder h4{font-size:26px; margin:2px 0 4px}
  .folder .date{color:#60708f; font-weight:600}
  .scroll-ind{width:230px; height:8px; background:#0b0b0e; border-radius:999px; margin:8px auto 6px; opacity:.85}

  /* ---------- Footer cards ---------- */
  .info-card{
    background:#dfe9ff; border:2px solid #c8dbff;
    border-radius:22px; padding:18px; display:flex; gap:16px; align-items:center; margin:16px 0;
  }
  .icn{
    width:86px; height:66px; border-radius:18px; display:grid; place-items:center; background:#fff; border:2px solid #cfe0ff;
  }
  .info-card h3{margin:0 0 2px}
  .foot-note{color:#5a6a86}
  a{text-decoration:none; color:inherit}
</style>
</head>
<body>
  <main class="wrap">
    <!-- HERO -->
    <section class="hero">
      <div class="avatar">
        <?php if(!empty($profile['avatar'])): ?>
          <img src="<?php echo htmlspecialchars($profile['avatar']); ?>" alt="Foto profil">
        <?php else: ?>
          <!-- Placeholder -->
          <svg viewBox="0 0 120 120" width="116" height="116" aria-hidden="true">
            <circle cx="60" cy="60" r="58" fill="#f4f6fb"/>
          </svg>
        <?php endif; ?>
      </div>
      <h1><?php echo htmlspecialchars($profile['name']); ?></h1>
      <p><?php echo htmlspecialchars($profile['bio']); ?></p>
    </section>

    <!-- SOSMED (di bawah container biru) -->
    <nav class="socials" aria-label="Tautan Sosial">
      <?php foreach($socials as [$label,$url,$icon]): ?>
        <a class="sbtn" href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener" aria-label="<?php echo htmlspecialchars($label); ?>">
          <?php
            // Ikon SVG sederhana
            if($icon==='linkedin'){
              echo '<svg viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V23h-4V8.5zM8 8.5h3.8v2h.06c.53-1 1.83-2.06 3.77-2.06C20 8.44 23 10.6 23 15.24V23h-4v-6.7c0-1.6-.03-3.67-2.24-3.67-2.24 0-2.58 1.75-2.58 3.55V23h-4V8.5z"/></svg>';
            } elseif($icon==='facebook'){
              echo '<svg viewBox="0 0 24 24"><path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07c0 5.02 3.66 9.18 8.44 9.93v-7.02H7.9v-2.9h2.54V9.41c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.9h-2.34V22c4.78-.75 8.44-4.91 8.44-9.93z"/></svg>';
            } elseif($icon==='instagram'){
              echo '<svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.58.01 4.85.07 1.17.05 1.95.24 2.6.5.7.27 1.29.63 1.87 1.22.58.58.94 1.17 1.22 1.87.26.65.45 1.43.5 2.6.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.24 1.95-.5 2.6a4.63 4.63 0 0 1-1.22 1.87 4.63 4.63 0 0 1-1.87 1.22c-.65.26-1.43.45-2.6.5-1.27.06-1.65.07-4.85.07s-3.53-.01-4.85-.07c-1.17-.05-1.95-.24-2.6-.5A4.63 4.63 0 0 1 2.99 20.9a4.63 4.63 0 0 1-1.22-1.87c-.26-.65-.45-1.43-.5-2.6C1.21 15.16 1.2 14.78 1.2 11.58s.01-3.53.07-4.77c.05-1.17.24-1.95.5-2.6.27-.7.63-1.29 1.22-1.87.58-.58 1.17-.94 1.87-1.22.65-.26 1.43-.45 2.6-.5C8.42 2.21 8.8 2.2 12 2.2zm0 2.2c-3.16 0-3.53.01-4.77.07-.97.05-1.5.21-1.85.35-.47.18-.8.39-1.15.74-.35.35-.56.67-.74 1.15-.14.35-.3.88-.35 1.85-.06 1.24-.07 1.61-.07 4.77s.01 3.53.07 4.77c.05.97.21 1.5.35 1.85.18.47.39.8.74 1.15.35.35.67.56 1.15.74.35.14.88.3 1.85.35 1.24.06 1.61.07 4.77.07s3.53-.01 4.77-.07c.97-.05 1.5-.21 1.85-.35.47-.18.8-.39 1.15-.74.35-.35.56-.67.74-1.15.14-.35.3-.88.35-1.85.06-1.24.07-1.61.07-4.77s-.01-3.53-.07-4.77c-.05-.97-.21-1.5-.35-1.85a2.77 2.77 0 0 0-.74-1.15 2.77 2.77 0 0 0-1.15-.74c-.35-.14-.88-.3-1.85-.35-1.24-.06-1.61-.07-4.77-.07zm0 3.2a5.4 5.4 0 1 1 0 10.8 5.4 5.4 0 0 1 0-10.8zm7-1.3a1.3 1.3 0 1 1 0 2.6 1.3 1.3 0 0 1 0-2.6z"/></svg>';
            } elseif($icon==='google'){
              echo '<svg viewBox="0 0 24 24"><path d="M21.35 11.1H12v2.9h5.35c-.23 1.48-1.64 4.33-5.35 4.33A5.38 5.38 0 0 1 6.62 13a5.38 5.38 0 0 1 5.38-5.33c1.23 0 2.35.44 3.23 1.16l1.98-1.98A8.59 8.59 0 0 0 12 3.6C7.36 3.6 3.6 7.36 3.6 12s3.76 8.4 8.4 8.4c4.85 0 8.07-3.4 8.07-8.2 0-.55-.06-1.06-.17-1.5z"/></svg>';
            } else { // tiktok
              echo '<svg viewBox="0 0 24 24"><path d="M21 8.1a7.2 7.2 0 0 1-4.8-1.74v7.78a5.96 5.96 0 1 1-4.9-5.88v2.77a3.14 3.14 0 1 0 2.1 2.95V1.8h2.1a5.1 5.1 0 0 0 5.1 5.1h.4v1.2a9.1 9.1 0 0 1-.02 0Z"/></svg>';
            }
          ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <!-- FOLDERS -->
    <h2 class="sec-title">Folders</h2>
    <div class="folders" aria-label="Daftar folder (geser ke samping)">
      <?php foreach($folders as [$title,$date,$url]): ?>
        <a class="folder" href="<?php echo htmlspecialchars($url); ?>">
          <div class="icon" aria-hidden="true">
            <svg width="54" height="44" viewBox="0 0 64 48">
              <path d="M6 10h18l4 6h30v22a6 6 0 0 1-6 6H12a6 6 0 0 1-6-6V10z" fill="#d7e6ff" stroke="#6d84a6" stroke-width="2"/>
              <path d="M4 18a6 6 0 0 1 6-6h15l4 6h25a6 6 0 0 1 6 6v12a6 6 0 0 1-6 6H10a6 6 0 0 1-6-6V18z" fill="#cfe0ff" stroke="#6d84a6" stroke-width="2"/>
            </svg>
          </div>
          <div>
            <h4><?php echo htmlspecialchars($title); ?></h4>
            <div class="date"><?php echo htmlspecialchars($date); ?></div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
    <div class="scroll-ind" aria-hidden="true"></div>

    <!-- FOOTER CARDS -->
    <section class="info-card">
      <div class="icn" aria-hidden="true">
        <svg width="60" height="40" viewBox="0 0 60 40">
          <rect x="4" y="6" width="52" height="28" rx="6" fill="#f6f9ff" stroke="#92a7c9" stroke-width="2"/>
          <path d="M6 8l24 16L54 8" fill="none" stroke="#92a7c9" stroke-width="2.5"/>
        </svg>
      </div>
      <div>
        <h3>eMail</h3>
        <div class="foot-note"><?php echo htmlspecialchars($contact['email']); ?></div>
      </div>
    </section>

    <section class="info-card">
      <div class="icn" aria-hidden="true">
        <svg width="60" height="44" viewBox="0 0 60 44">
          <path d="M10 28a20 20 0 0 1 40 0" fill="none" stroke="#92a7c9" stroke-width="3"/>
          <rect x="6" y="24" width="12" height="16" rx="6" fill="#f6f9ff" stroke="#92a7c9" stroke-width="2"/>
          <rect x="42" y="24" width="12" height="16" rx="6" fill="#f6f9ff" stroke="#92a7c9" stroke-width="2"/>
        </svg>
      </div>
      <div>
        <h3>Playlist</h3>
        <div class="foot-note"><?php echo htmlspecialchars($contact['playlist']); ?></div>
      </div>
    </section>
  </main>
</body>
</html>
