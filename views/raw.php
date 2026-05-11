<?php
$micro = $cert['microID'] ?? '—';
$root = $cert['root'] ?? '—';
?>
<!doctype html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Certificato <?= htmlspecialchars((string)$micro) ?></title>
<link rel="stylesheet" href="/assets/style.css">
</head>
<body class="cert-body">
<main class="cert-shell">
  <p class="eyebrow">Tipo non riconosciuto: <?= htmlspecialchars((string)$root) ?></p>
  <h1>Micro ID <?= htmlspecialchars((string)$micro) ?></h1>
  <pre class="raw"><?= htmlspecialchars(json_encode($cert, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?></pre>
  <a class="back" href="/">← Scansiona un altro codice</a>
</main>
</body>
</html>
