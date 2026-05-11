<?php
$pageTitle = t('meta.scanner');
require __DIR__ . '/_header.php';
?>
<main class="shell">
  <p class="eyebrow"><?= htmlspecialchars(t('scanner.eyebrow')) ?></p>
  <h1><?= htmlspecialchars(t('scanner.h1')) ?></h1>

  <div class="intro">
    <p class="lead"><?= htmlspecialchars(t('scanner.lead')) ?></p>
    <p><?= htmlspecialchars(t('scanner.body')) ?></p>
  </div>

  <h2><?= htmlspecialchars(t('scanner.h2')) ?></h2>
  <div id="reader" class="reader"></div>
  <div id="status" class="status" hidden></div>

  <details class="manual">
    <summary><?= htmlspecialchars(t('scanner.manual')) ?></summary>
    <form method="get" action="/" class="manual-form">
      <input type="text" name="id" placeholder="es. AEF1CB88" required pattern="[0-9A-Fa-f]{8}" maxlength="8" autocomplete="off">
      <?php if (!empty($_GET['lang'])): ?>
        <input type="hidden" name="lang" value="<?= htmlspecialchars($lang) ?>">
      <?php endif; ?>
      <button type="submit"><?= htmlspecialchars(t('scanner.verify')) ?></button>
    </form>
  </details>
</main>

<script>
window.T = <?= json_encode([
    'not_recognized' => t('js.not_recognized'),
    'detected'       => t('js.detected'),
    'camera_fail'    => t('js.camera_fail'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
(function () {
  const statusEl = document.getElementById('status');
  function setStatus(msg, kind) {
    statusEl.hidden = false;
    statusEl.textContent = msg;
    statusEl.className = 'status ' + (kind || '');
  }

  function extractHex(text) {
    if (!text) return null;
    const m = String(text).trim().match(/([0-9A-Fa-f]{8})\s*$/);
    return m ? m[1].toUpperCase() : null;
  }

  let handled = false;
  const html5QrCode = new Html5Qrcode('reader');
  const config = { fps: 10, qrbox: { width: 240, height: 240 } };

  function onSuccess(decodedText) {
    if (handled) return;
    const hex = extractHex(decodedText);
    if (!hex) {
      setStatus(window.T.not_recognized + decodedText, 'warn');
      return;
    }
    handled = true;
    setStatus(window.T.detected.replace('%s', hex), 'ok');
    html5QrCode.stop().catch(() => {}).finally(() => {
      window.location.href = '/?id=' + encodeURIComponent(hex);
    });
  }

  html5QrCode.start({ facingMode: 'environment' }, config, onSuccess)
    .catch(err => { setStatus(window.T.camera_fail, 'warn'); });
})();
</script>
<?php require __DIR__ . '/_footer.php'; ?>
