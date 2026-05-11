<?php
declare(strict_types=1);

require __DIR__ . '/lib/env.php';
require __DIR__ . '/lib/c3rt.php';

load_env(__DIR__ . '/.env');

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$rawId = $_GET['id'] ?? '';
$microId = $rawId !== '' ? extract_micro_id($rawId) : null;

if ($microId === null) {
    require __DIR__ . '/views/scanner.php';
    exit;
}

$res = fetch_certificate($microId);

if (!$res['ok']) {
    http_response_code($res['error'] === 'not_found' ? 404 : 502);
    $error = $res['error'];
    $debug = $res['raw'] ?? null;
    require __DIR__ . '/views/error.php';
    exit;
}

$cert = $res['cert'];
$type = cert_type($cert);

if ($type === 'cartella') {
    require __DIR__ . '/views/cartella.php';
} elseif ($type === 'quadro') {
    require __DIR__ . '/views/quadro.php';
} else {
    require __DIR__ . '/views/raw.php';
}
