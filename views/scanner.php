<?php
$pageTitle = 'Scanner Litografie Modigliani';
?>
<!doctype html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<title><?= htmlspecialchars($pageTitle) ?></title>
<link rel="stylesheet" href="/assets/style.css">
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
</head>
<body class="scanner-body">
<main class="scanner-shell">
  <header class="scanner-header">
    <h1>Archivio Modigliani</h1>
    <p class="subtitle">Inquadra il QR code della cartella o dell'opera</p>
  </header>

  <div id="reader" class="reader"></div>

  <div id="status" class="status" hidden></div>

  <details class="manual">
    <summary>Inserisci codice manualmente</summary>
    <form method="get" action="/" class="manual-form">
      <input type="text" name="id" placeholder="es. AEF1CB88" required pattern="[0-9A-Fa-f]{8}" maxlength="8" autocomplete="off">
      <button type="submit">Cerca</button>
    </form>
  </details>
</main>

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
      setStatus('QR letto ma formato non riconosciuto: ' + decodedText, 'warn');
      return;
    }
    handled = true;
    setStatus('Codice rilevato: ' + hex + ' — caricamento...', 'ok');
    html5QrCode.stop().catch(() => {}).finally(() => {
      window.location.href = '/?id=' + encodeURIComponent(hex);
    });
  }

  html5QrCode.start({ facingMode: 'environment' }, config, onSuccess)
    .catch(err => {
      setStatus('Impossibile aprire la fotocamera. Concedi i permessi o usa l\'inserimento manuale. (' + err + ')', 'warn');
    });
})();
</script>
</body>
</html>
