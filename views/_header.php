<!doctype html>
<html lang="<?= htmlspecialchars(t('doc.lang')) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<title><?= htmlspecialchars($pageTitle ?? 'Modigliani Archives Legales') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/style.css?v=<?= @filemtime(__DIR__ . '/../assets/style.css') ?: '1' ?>">
<link rel="icon" type="image/svg+xml" href="/assets/logo.svg">
</head>
<body>
<header class="site-header">
  <a class="logo" href="/" aria-label="Modigliani Archives Legales">
    <img src="/assets/logo.svg" alt="Modigliani Archives Legales">
  </a>
  <nav class="lang-switcher" aria-label="Lingua">
    <?php foreach (SUPPORTED_LANGS as $code): ?>
      <a href="<?= htmlspecialchars(lang_url($code)) ?>" class="<?= $lang === $code ? 'active' : '' ?>" lang="<?= $code ?>"><?= strtoupper($code) ?></a>
    <?php endforeach; ?>
  </nav>
</header>
