<?php
$pageTitle = 'Codice non trovato — Modigliani Archives Legales';
require __DIR__ . '/_header.php';
?>
<main class="shell">
  <p class="eyebrow">Verifica non riuscita</p>
  <h1>Certificato non disponibile</h1>
  <p class="lead" style="margin-top:18px;">
    <?php
    $msg = (string)($error ?? 'Errore sconosciuto');
    if ($msg === 'not_found') {
        echo "Nessun certificato corrisponde al codice inserito. Verifica di aver inquadrato correttamente il QR code o di aver digitato l'identificativo corretto.";
    } else {
        echo htmlspecialchars($msg);
    }
    ?>
  </p>
  <a class="back" href="/">← Riprova</a>
</main>
<?php require __DIR__ . '/_footer.php'; ?>
