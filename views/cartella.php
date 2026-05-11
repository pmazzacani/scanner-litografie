<?php
$title = $cert['metadata']['title'] ?? '—';
$wid = $cert['wid'] ?? '—';
$micro = $cert['microID'] ?? '—';
$tag = $cert['tag'] ?? '';
?>
<!doctype html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Cartella <?= htmlspecialchars((string)$wid) ?> — Archivio Modigliani</title>
<link rel="stylesheet" href="/assets/style.css">
</head>
<body class="cert-body">
<main class="cert-shell">
  <p class="eyebrow">Cartella Litografica</p>
  <h1 class="cert-number">N. <?= htmlspecialchars((string)$wid) ?> / 49</h1>
  <p class="cert-title"><?= htmlspecialchars((string)$title) ?></p>

  <dl class="cert-meta">
    <dt>Micro ID</dt><dd><?= htmlspecialchars((string)$micro) ?></dd>
    <dt>Tag</dt><dd><?= htmlspecialchars((string)$tag) ?></dd>
  </dl>

  <a class="back" href="/">← Scansiona un altro codice</a>
</main>
</body>
</html>
