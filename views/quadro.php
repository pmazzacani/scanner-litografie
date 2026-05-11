<?php
$meta = $cert['metadata'] ?? [];
$title = $meta['title'] ?? '—';
$archive = $meta['archive_id'] ?? '';
$date = $meta['original_date'] ?? '—';
$dimensions = $meta['dimensions'] ?? '';
$wid = $cert['wid'] ?? '—';
$micro = $cert['microID'] ?? '—';
$tag = $cert['tag'] ?? '';
$pageTitle = t('meta.quadro', $title);
require __DIR__ . '/_header.php';
?>
<main class="cert-shell">
  <div class="certified-banner"><?= htmlspecialchars(t('cert.banner')) ?></div>
  <p class="eyebrow"><?= htmlspecialchars(t('cert.opera_n', $wid)) ?></p>
  <h1 class="cert-title" style="margin-top:8px;"><?= htmlspecialchars((string)$title) ?></h1>

  <dl class="cert-meta">
<?php if ($date !== '' && $date !== '—'): ?>
    <dt><?= htmlspecialchars(t('cert.data')) ?></dt><dd><?= htmlspecialchars((string)$date) ?></dd>
<?php endif; ?>
<?php if ($dimensions !== ''): ?>
    <dt><?= htmlspecialchars(t('cert.dimensions')) ?></dt><dd><?= htmlspecialchars((string)$dimensions) ?></dd>
<?php endif; ?>
<?php if ($archive !== ''): ?>
    <dt><?= htmlspecialchars(t('cert.catalogue')) ?></dt><dd><?= htmlspecialchars((string)$archive) ?></dd>
<?php endif; ?>
    <dt><?= htmlspecialchars(t('cert.microid')) ?></dt><dd><?= htmlspecialchars((string)$micro) ?></dd>
<?php if ($tag !== ''): ?>
    <dt><?= htmlspecialchars(t('cert.ref')) ?></dt><dd><?= htmlspecialchars((string)$tag) ?></dd>
<?php endif; ?>
  </dl>

  <p class="note"><?= htmlspecialchars(t('cert.image_pending')) ?></p>

  <a class="back" href="<?= htmlspecialchars(!empty($_GET['lang']) ? '/?lang=' . urlencode($lang) : '/') ?>"><?= htmlspecialchars(t('cert.back')) ?></a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
