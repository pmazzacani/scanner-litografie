<?php
$micro = $cert['microID'] ?? '—';
$root = $cert['root'] ?? '—';
$pageTitle = t('meta.raw', $micro);
require __DIR__ . '/_header.php';
?>
<main class="shell">
  <p class="eyebrow"><?= htmlspecialchars(t('raw.eyebrow', $root)) ?></p>
  <h1><?= htmlspecialchars(t('cert.microid')) ?> <?= htmlspecialchars((string)$micro) ?></h1>
  <pre class="raw"><?= htmlspecialchars(json_encode($cert, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?></pre>
  <a class="back" href="<?= htmlspecialchars(!empty($_GET['lang']) ? '/?lang=' . urlencode($lang) : '/') ?>"><?= htmlspecialchars(t('cert.back')) ?></a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
