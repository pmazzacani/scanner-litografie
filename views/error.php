<?php
$pageTitle = t('meta.error');
require __DIR__ . '/_header.php';
?>
<main class="shell">
  <p class="eyebrow"><?= htmlspecialchars(t('err.eyebrow')) ?></p>
  <h1><?= htmlspecialchars(t('err.h1')) ?></h1>
  <p class="lead" style="margin-top:18px;">
    <?php
    $msg = (string)($error ?? 'Errore sconosciuto');
    if ($msg === 'not_found') {
        echo htmlspecialchars(t('err.not_found'));
    } else {
        echo htmlspecialchars($msg);
    }
    ?>
  </p>
  <a class="back" href="<?= htmlspecialchars(!empty($_GET['lang']) ? '/?lang=' . urlencode($lang) : '/') ?>"><?= htmlspecialchars(t('err.retry')) ?></a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
