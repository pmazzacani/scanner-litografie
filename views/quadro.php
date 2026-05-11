<?php
$meta = $cert['metadata'] ?? [];
$title = $meta['title'] ?? '—';
$archive = $meta['archive_id'] ?? '';
$date = $meta['original_date'] ?? '—';
$dimensions = $meta['dimensions'] ?? '';
$wid = $cert['wid'] ?? '—';
$micro = $cert['microID'] ?? '—';
$tag = $cert['tag'] ?? '';
$pageTitle = $title . ' — Modigliani Archives Legales';
require __DIR__ . '/_header.php';
?>
<main class="cert-shell">
  <div class="certified-banner">Autenticità certificata</div>
  <p class="eyebrow">Opera N. <?= htmlspecialchars((string)$wid) ?></p>
  <h1 class="cert-title" style="margin-top:8px;"><?= htmlspecialchars((string)$title) ?></h1>

  <dl class="cert-meta">
<?php if ($date !== '' && $date !== '—'): ?>
    <dt>Data</dt><dd><?= htmlspecialchars((string)$date) ?></dd>
<?php endif; ?>
<?php if ($dimensions !== ''): ?>
    <dt>Dimensioni</dt><dd><?= htmlspecialchars((string)$dimensions) ?></dd>
<?php endif; ?>
<?php if ($archive !== ''): ?>
    <dt>Catalogo ragionato</dt><dd><?= htmlspecialchars((string)$archive) ?></dd>
<?php endif; ?>
    <dt>Micro ID</dt><dd><?= htmlspecialchars((string)$micro) ?></dd>
<?php if ($tag !== ''): ?>
    <dt>Riferimento</dt><dd><?= htmlspecialchars((string)$tag) ?></dd>
<?php endif; ?>
  </dl>

  <p class="note">L'immagine dell'opera sarà disponibile non appena caricata nell'archivio.</p>

  <a class="back" href="/">← Verifica un altro codice</a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
