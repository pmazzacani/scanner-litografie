<?php
$meta = $cert['metadata'] ?? [];
$title = $meta['title'] ?? '—';
$archive = $meta['archive_id'] ?? '';
$date = $meta['original_date'] ?? '—';
$dimensions = $meta['dimensions'] ?? '';
$wid = $cert['wid'] ?? '—';
$micro = $cert['microID'] ?? '—';
$tag = $cert['tag'] ?? '';
?>
<!doctype html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Opera <?= htmlspecialchars((string)$wid) ?> — <?= htmlspecialchars((string)$title) ?></title>
<link rel="stylesheet" href="/assets/style.css">
</head>
<body class="cert-body">
<main class="cert-shell">
  <p class="eyebrow">Opera</p>
  <h1 class="cert-title"><?= htmlspecialchars((string)$title) ?></h1>

  <dl class="cert-meta">
    <dt>Numero</dt><dd><?= htmlspecialchars((string)$wid) ?></dd>
    <dt>Data</dt><dd><?= htmlspecialchars((string)$date) ?></dd>
<?php if ($dimensions !== ''): ?>
    <dt>Dimensioni:</dt><dd><?= htmlspecialchars((string)$dimensions) ?></dd>
<?php endif; ?>
<?php if ($archive !== ''): ?>
    <dt>Catalogo ragionato:</dt><dd><?= htmlspecialchars((string)$archive) ?></dd>
<?php endif; ?>
    <dt>Tag</dt><dd><?= htmlspecialchars((string)$tag) ?></dd>
    <dt>Micro ID</dt><dd><?= htmlspecialchars((string)$micro) ?></dd>
  </dl>

  <p class="note">L'immagine sarà disponibile non appena caricata nell'archivio.</p>

  <a class="back" href="/">← Scansiona un altro codice</a>
</main>
</body>
</html>
