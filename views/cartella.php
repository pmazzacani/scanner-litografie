<?php
$title = $cert['metadata']['title'] ?? '—';
$wid = $cert['wid'] ?? '—';
$micro = $cert['microID'] ?? '—';
$tag = $cert['tag'] ?? '';
$pageTitle = t('meta.cartella', $wid);
require __DIR__ . '/_header.php';
?>
<main class="cert-shell">
  <div class="certified-banner"><?= htmlspecialchars(t('cert.banner')) ?></div>
  <p class="eyebrow"><?= htmlspecialchars(t('cert.cartella')) ?></p>
  <h1 class="cert-number">N. <?= htmlspecialchars((string)$wid) ?> <span style="color:var(--muted);font-size:0.5em;letter-spacing:0;"><?= htmlspecialchars(t('cert.of_49')) ?></span></h1>
  <p class="cert-title"><?= htmlspecialchars((string)$title) ?></p>

  <dl class="cert-meta">
    <dt><?= htmlspecialchars(t('cert.microid')) ?></dt><dd><?= htmlspecialchars((string)$micro) ?></dd>
<?php if ($tag !== ''): ?>
    <dt><?= htmlspecialchars(t('cert.ref')) ?></dt><dd><?= htmlspecialchars((string)$tag) ?></dd>
<?php endif; ?>
  </dl>

  <a class="back" href="<?= htmlspecialchars(!empty($_GET['lang']) ? '/?lang=' . urlencode($lang) : '/') ?>"><?= htmlspecialchars(t('cert.back')) ?></a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
