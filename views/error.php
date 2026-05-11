<!doctype html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Codice non trovato</title>
<link rel="stylesheet" href="/assets/style.css">
</head>
<body class="cert-body">
<main class="cert-shell">
  <p class="eyebrow">Errore</p>
  <h1>Certificato non disponibile</h1>
  <p><?= htmlspecialchars((string)($error ?? 'Errore sconosciuto')) ?></p>
  <a class="back" href="/">← Riprova</a>
</main>
</body>
</html>
