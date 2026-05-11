<?php
$pageTitle = 'Scanner di Autenticità — Modigliani Archives Legales';
require __DIR__ . '/_header.php';
?>
<main class="shell">
  <p class="eyebrow">Sistema di Verifica</p>
  <h1>Scanner di Autenticità</h1>

  <div class="intro">
    <p class="lead">Questo strumento verifica l'autenticità delle litografie e delle cartelle litografiche custodite presso il Modigliani Archives Legales.</p>
    <p>Inquadrando il codice QR apposto sull'opera o sulla cartella, il sistema interroga il registro ufficiale di certificazione e mostra i dati anagrafici dell'oggetto: numero d'archivio, dimensioni, riferimento al catalogo ragionato e identificativo crittografico univoco. La presenza del certificato attesta l'esistenza e l'originalità dell'opera nell'archivio.</p>
  </div>

  <h2>Inquadra il codice</h2>
  <div id="reader" class="reader"></div>
  <div id="status" class="status" hidden></div>

  <details class="manual">
    <summary>Inserimento manuale</summary>
    <form method="get" action="/" class="manual-form">
      <input type="text" name="id" placeholder="es. AEF1CB88" required pattern="[0-9A-Fa-f]{8}" maxlength="8" autocomplete="off">
      <button type="submit">Verifica</button>
    </form>
  </details>
</main>

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
      setStatus('Codice letto, ma formato non riconosciuto: ' + decodedText, 'warn');
      return;
    }
    handled = true;
    setStatus('Codice rilevato: ' + hex + ' — verifica in corso…', 'ok');
    html5QrCode.stop().catch(() => {}).finally(() => {
      window.location.href = '/?id=' + encodeURIComponent(hex);
    });
  }

  html5QrCode.start({ facingMode: 'environment' }, config, onSuccess)
    .catch(err => {
      setStatus('Impossibile accedere alla fotocamera. Concedere i permessi o utilizzare l\'inserimento manuale.', 'warn');
    });
})();
</script>
<?php require __DIR__ . '/_footer.php'; ?>
