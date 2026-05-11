<?php
$micro = $cert['microID'] ?? '—';
$root = $cert['root'] ?? '—';
$pageTitle = 'Certificato ' . $micro;
require __DIR__ . '/_header.php';
?>
<main class="shell">
  <p class="eyebrow">Tipo non riconosciuto — <?= htmlspecialchars((string)$root) ?></p>
  <h1>Micro ID <?= htmlspecialchars((string)$micro) ?></h1>
  <pre class="raw"><?= htmlspecialchars(json_encode($cert, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?></pre>
  <a class="back" href="/">← Verifica un altro codice</a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
