<?php
$title = $cert['metadata']['title'] ?? '—';
$wid = $cert['wid'] ?? '—';
$micro = $cert['microID'] ?? '—';
$tag = $cert['tag'] ?? '';
$pageTitle = 'Cartella ' . $wid . ' — Modigliani Archives Legales';
require __DIR__ . '/_header.php';
?>
<main class="cert-shell">
  <div class="certified-banner">Autenticità certificata</div>
  <p class="eyebrow">Cartella Litografica</p>
  <h1 class="cert-number">N. <?= htmlspecialchars((string)$wid) ?> <span style="color:var(--muted);font-size:0.5em;letter-spacing:0;">/ 49</span></h1>
  <p class="cert-title"><?= htmlspecialchars((string)$title) ?></p>

  <dl class="cert-meta">
    <dt>Micro ID</dt><dd><?= htmlspecialchars((string)$micro) ?></dd>
<?php if ($tag !== ''): ?>
    <dt>Riferimento</dt><dd><?= htmlspecialchars((string)$tag) ?></dd>
<?php endif; ?>
  </dl>

  <a class="back" href="/">← Verifica un altro codice</a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
